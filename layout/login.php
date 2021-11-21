<?php if (isset($_GET['login_page']) && $_GET['login_page'] == 'password_recovery'): ?>
	<div class="container">
		<div class="row justify-content-center pt-5">
			<div class="col-lg-4 col-md-6 col-sm-12 pt-5">
				<div class="pt-2">
					<p class="h3">
						Восстановление пароля
					</p>
					<p>
						На почтовый ящик (email), указанный, при регистрации будет выслан
						временный пароль. 
					</p>
					<p class="h4">
						Укажите ваш email:
					</p>
				</div>
				<form action="" method="post">
					<div class="input-group mb-3">
						<input name="password_recovery" type="email" class="form-control">
						<button 
						class="btn btn-outline-success" 
						title="Отправить" 
						id="button-addon2">
						<i class="fa fa-check" aria-hidden="true"></i>
					</button>
				</div>
			</form>
			<div class="pt-2">
				<a href="?login_page=login" title="Отмена" class="btn btn-outline-danger">
					<i class="fa fa-times" aria-hidden="true"></i>
				</a>
			</div>
		</div>
	</div>
</div>
<?php else: ?>
	<div class="container">
		<div class="row justify-content-center  pt-5">
			<div class="col-lg-4 col-md-6 col-sm-12 align-self-center pt-5">
				<form method="post" action="">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">
							Login
						</label>
						<input type="text" name="user_login" class="form-control" 
						id="exampleInputEmail1" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Password</label>
						<input type="password" name="user_password" 
						class="form-control" id="exampleInputPassword1">
					</div>
					<div class="row">
						<div class="col">
							<button name="login_form_send" value="true" 
							type="submit" class="btn btn-outline-primary" title="login">
							<i class="fa fa-sign-in" aria-hidden="true"></i>
						</button>
					</div>
					<div class="col">
						<a href="?login_page=password_recovery">
							Забыли пароль?
						</a>
					</div>
				</div>			
			</form>
		</div>
	</div>
</div>
<?php endif ?>
