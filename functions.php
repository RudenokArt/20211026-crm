<?php 

if (isset($_POST['login_form_send'])) { user_login();}

if (isset($_POST['log_out'])) {
	wp_logout();
	echo '<script>document.location.href="index.php";</script>';
}

if (isset($_POST['new_user_add'])) {
	new_user_add();
}

if (isset($_POST['user_delete'])) {
	user_delete();
}

// ===== FUNCTIONS =====

function user_delete () {
	require_once ABSPATH . 'wp-admin/includes/user.php'; 
	wp_delete_user($_POST['user_delete']);
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

