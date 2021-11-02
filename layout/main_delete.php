<?php admin_only() ?>
<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-12 offset-lg-4 offset-md-2">
		<div class="card">
			<div class="card-header">
				Warning!
			</div>
			<div class="card-body">
				<h5 class="card-title text-center">
					Удалить?
				</h5>
				<p class="card-text text-center">
					Вы уверены?
				</p>
				<div class="container">
					<div class="row justify-content-around">
						<div class="col-3">
							<form action="" method="post">
								<button name="user_delete" value="<?php echo $_GET['id'] ?>" 
									class="btn btn-outline-success" title="Удалить">
									<i class="fa fa-check" aria-hidden="true"></i>
								</button>
							</form>
						</div><div class="col-3">
							<a href="?main_page=users" class="btn btn-outline-danger">
								<i class="fa fa-times" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
