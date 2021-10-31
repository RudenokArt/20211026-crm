	<?php admin_only() ?>
	<div class="col-lg-4 col-md-6 col-sm-12 offset-lg-4 offset-md-2">
		<p class="h3">
			Новый пользователь:
		</p>
		<form action="" method="post">
			<div class="mb-3">
				<select class="form-select form-control" name="user_role" >
					<option value="editor">
						<?php echo $users_roles['editor'] ?>
					</option>
					<option value="author">
						<?php echo $users_roles['author'] ?>
					</option>
				</select>
			</div>
			<div class="mb-3">
				<label for="exampleInputLogin" class="form-label">
					Логин
				</label>
				<input type="text" name="user_login" 
				class="form-control" id="exampleInputLogin">
			</div>
			<div class="mb-3">
				<label for="exampleInputName" class="form-label">
					ФИО
				</label>
				<input type="text" name="user_name" 
				class="form-control" id="exampleInputName">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Email</label>
				<input type="email" class="form-control" name="user_email"
				id="exampleInputEmail1" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Пароль</label>
				<input type="text" name="user_password" 
				class="form-control" id="exampleInputPassword1">
			</div>
			<button name="new_user_add" value="true" 
			class="btn btn-outline-success" title="Добавить">
			<i class="fa fa-check" aria-hidden="true"></i>
		</button>
		<a href="?main_page=users" class="btn btn-outline-danger">
			<i class="fa fa-times" aria-hidden="true"></i>
		</a>
	</form>
</div>

