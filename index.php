<?php get_header();?>

<?php if (is_user_logged_in()): ?>
	<?php include_once 'layout/main.php';?>
<?php else: ?>
	<?php include_once 'layout/login.php';?>
<?php endif ?>

<?php get_footer(); ?>