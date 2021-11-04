<?php 

if (isset($_POST['login_form_send'])) { user_login();}

if (isset($_POST['log_out'])) {
	wp_logout();
	echo '<script>document.location.href="index.php";</script>';
}

if (isset($_POST['new_user_add'])) {
	new_user_add();
}

if (isset($_POST['users_delete'])) {
	user_delete();
}

if (isset($_POST['user_update'])) {
	user_update();
}

if (isset($_POST['order_add'])) {
	order_add();
}

if (isset($_POST['orders_delete'])) {
	order_delete();
}

if (isset($_POST['order_update'])) {
	order_update ();
}



// ===== FUNCTIONS =====

function order_update () {
	$new_post_data = [
		'ID' => $_POST['order_update'],
		'post_title'    => $_POST['company_adress'],
		'post_status'   => 'publish',
		'post_content' => $_POST['comment'],
		'meta_input'  => [ 
			'order_date'=>$_POST['order_date'],
			'customer_phone'=>$_POST['customer_phone'],
			'customer_adress'=>$_POST['customer_adress'],
			'order_status'=>$_POST['order_status'],
		],
	];
	wp_update_post( wp_slash($new_post_data) );
	if ($_FILES['upload_file']['size']>0) {
		unlink($_SERVER['DOCUMENT_ROOT'].$_POST['unliking_file']);
	}
	user_file_upload ($_POST['order_update']);
	$message = 'Изменения внесены в базу данных!';
	include_once 'layout/result_message.php';
	post_resset('?main_page=orders');
}

function post_data ($order_id) {
	$arr = [];
	$arr['data'] = get_post($order_id);
	$arr['meta'] = get_post_meta($order_id);
	return $arr;
}

function order_delete () {
	wp_delete_post($_POST['orders_delete']);
	unlink($_SERVER['DOCUMENT_ROOT'].post_data(
		$_POST['orders_delete'])['meta']['file'][0]);
	$message = 'Заказ удален из базы дынных!';
	include_once 'layout/result_message.php';
	post_resset('?main_page=orders');
}

function order_fields ($order) {
	$arr = [];
	foreach (get_post_meta($order) as $key => $value) {
		$arr[$key] = $value[0];
	}
	return $arr;
}

function orders_list () {
	return get_posts();
}

function order_add () {
	// создание поста
	$post_data = [
		'post_title'    => $_POST['company_adress'],
		'post_content'  => $_POST['comment'],
		'post_status'   => 'publish',
		'post_author'   => get_current_user_id(),
		'meta_input'    => [ 
			'order_date'=>$_POST['order_date'],
			'customer_phone'=>$_POST['customer_phone'],
			'customer_adress'=>$_POST['customer_adress'],
			'order_status'=>$_POST['order_status'],
		],
	];
	$post_id = wp_insert_post( wp_slash($post_data) );
	user_file_upload ($post_id);
	$message = 'Заказ добавлен в базу!';
	include_once 'layout/result_message.php';
	post_resset('?main_page=orders');
}

function user_file_upload ($post_id) {
	if ($_FILES['upload_file']['size']>0) {
	// загрузка файла
	$file = $_FILES['upload_file']['tmp_name'];
	$name = $_FILES['upload_file']['name'];
	$link = '/wp-content/uploads/order_'.$post_id.'_'.$name;
	move_uploaded_file($file, $_SERVER['DOCUMENT_ROOT'].$link);
	// метаполе ссылка на файл
	$new_post_data = [
		'ID' => $post_id,
		'meta_input' => [
			'file' => $link,
		],
	];
		wp_update_post( wp_slash($new_post_data) );
	}
}

function user_update () {
	if ($_POST['user_password']=='') {
		$message = 'Не указан пароль!';
	} else {
		wp_update_user( [
			'ID' => $_POST['user_update'],
			'user_pass'=>$_POST['user_password'],
			'user_email' => $_POST['user_email'],
			'display_name' => $_POST['user_name'],
			'first_name' => $_POST['user_name'],
			'role'  => $_POST['user_role'], 
		] );
		wp_set_password($_POST['user_password'], $_POST['user_update']);
		$message = 'Изменения внесены в базу данных';
	}
	include_once 'layout/result_message.php';
	post_resset('?main_page=users');
}

function user_delete () {
	require_once ABSPATH . 'wp-admin/includes/user.php'; 
	wp_delete_user($_POST['users_delete']);
	$message = 'Профиль пользователя удален из базы дынных!';
	include_once 'layout/result_message.php';
	post_resset('?main_page=users');
}

function new_user_add () {
	$user_id = wp_create_user( 
		$_POST['user_login'], 
		$_POST['user_password'],
		$_POST['user_email']
	);
	if (!isset($user_id->errors)) {
		$user_id = wp_update_user( [
			'ID' => $user_id,
			'first_name' => $_POST['user_name'],
			'role' => $_POST['user_role'],
		] );
	}
	$message = '';
	if (!isset($user_id->errors)) {
		$message = 'Профиль пользователя успешно добавлен в базу данных!';
	} else {
		foreach ($user_id->errors as $key => $value) {
			$message = $message.'<br>'.$value[0];
		}
	}
	include_once 'layout/result_message.php';
	post_resset('?main_page=users');
}

function user_login () {
	$user = wp_authenticate($_POST['user_login'],$_POST['user_password']);
	if (isset($user->data->ID)) {
		wp_set_auth_cookie($user->data->ID);
		$message = 'Авторизация прошла успешно!';
	} else {
		$message = 'Неправильный логин или пароль!';
	}
	include_once 'layout/result_message.php';
	post_resset();
}

function post_resset ($page='') {	?>
	<script>
		setTimeout(function () {
			document.location.href="index.php?<?php echo $page; ?>";
		}, 2000);
	</script>
	<div style="display:none;">
	<?php }


	function admin_only () {?>
		<?php if ($current_user->ID==1): ?>
			<?php $message = 'Этот раздел доступен только для администратора!' ?>
			<?php include_once 'layout/result_message.php'; ?>
			<?php exit(); ?>
		<?php endif ?>
	<?php }


