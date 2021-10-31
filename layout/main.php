<?php if (!isset($_GET['main_page'])){
	$_GET['main_page'] = 'orders';
} ?>

<div class="container wrapper-top">
	<div class="row row justify-content-end">
		<?php if ($current_user->ID==1): ?>
			<div class="col-10">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a
						<?php if ($_GET['main_page']=='orders'	or $_GET['main_page']==''): ?>
							class="nav-link active"
						<?php else: ?>
							class="nav-link"
						<?php endif ?>
						href="?main_page=orders">
						<i class="fa fa-money" aria-hidden="true"></i>
						Заказы
					</a>
				</li>
				<li class="nav-item">
					<a 
					<?php if ($_GET['main_page']=='users'): ?>
						class="nav-link active"
					<?php else: ?>
						class="nav-link"
					<?php endif ?>
					href="?main_page=users">
					<i class="fa fa-user-o" aria-hidden="true"></i>
					Пользователи
				</a>
			</li>
		</ul>
	</div>
<?php endif ?>

<div class="col-2">
	<form action="" method="post">
		<button class="btn btn-outline-dark" title="Выход" 
		name="log_out" value="true">
		<i class="fa fa-sign-out" aria-hidden="true"></i>
	</button>
</form>
</div>
</div>
</div>

<div class="wrapper-top">
	<div class="container">
		<div class="row">
			<?php include_once 'main_'.$_GET['main_page'].'.php'; ?>
		</div>
	</div>
</div>

