<?php 

if (isset($_POST['login_form_send'])) { user_login();}
if (isset($_POST['log_out'])) {
	wp_logout();
	echo '<script>document.location.href="index.php";</script>';
}


function user_login () {
	$user = wp_authenticate($_POST['user_login'],$_POST['user_password']);
	if (isset($user->data->ID)) {
		wp_set_auth_cookie($user->data->ID);
		$message = 'Авторизация прошла успешно!';
	} else {
		$message = 'Неправильный логин или пароль!';
	}
	include_once 'layout/login_message.php';
	post_resset();
}

function post_resset () {	?>
	<script>
		setTimeout(function () {
			document.location.href="index.php";
		}, 2000);
	</script>
	<div style="display:none;">
<?php }



?>