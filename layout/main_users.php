<?php admin_only() ?>
<div class="container">
	<div class="row">
		<div class="col">
			<a href="?main_page=user_add">
				<button class="btn btn-outline-info">
					<i class="fa fa-plus-circle" aria-hidden="true"></i>
					Добавить пользователя
				</button>
			</a>
		</div>
	</div>
	<hr>
	<?php foreach (get_users() as $key => $value): ?>
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-6">
				<?php echo get_user_meta($value->data->ID,'first_name',true); ?>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<?php echo $value->data->user_login; ?>
			</div>
			<div  class="col-lg-3 col-md-4 col-sm-6">
				<?php echo $users_roles[$value->roles[0]]; ?>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<a href="?main_page=user_update&id=<?php echo $value->data->ID;?>">
					<button class="btn btn-outline-info" title="редактировать">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</button></a>
					<?php if ($value->data->ID !=1): ?>
						<a 
						href="?main_page=delete&entity=users&id=<?php echo $value->data->ID;?>">
							<button  class="btn btn-outline-danger" title="удалить">
								<i class="fa fa-trash-o" aria-hidden="true"></i>
							</button>
						</a>
					<?php endif ?>
				</div>
			</div>
			<hr>
		<?php endforeach ?>
	</div>
