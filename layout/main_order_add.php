
<div class="row justify-content-center">
	<div class="col-lg-4 col-md-6 col-sm-12">
		<p class="h3">Новый заказ</p><br>
		<form action="" method="post" enctype="multipart/form-data">
			<p>
				<select class="form-select" name="company_adress">
					<?php foreach ($adress_arr as $key => $value): ?>
						<option value="<?php echo $key; ?>">
							<?php echo $value; ?>
						</option>
					<?php endforeach ?>
				</select>
			</p>
			<p>
				<span class="row">
					<span class="col-6">
						<input type="text" placeholder="Дата" required  
						class="form-control" name="order_date">
					</span>
					<span class="col-6">
						<input type="text" placeholder="Телефон" required
						class="form-control" name="customer_phone">
					</span>
				</span>
			</p>
			<p>
				<input type="text" placeholder="Адрес" required
				class="form-control" name="customer_adress">
			</p>
			<p>
				<input type="file" class="form-control" name="upload_file">
			</p>
			<p>
				<select class="form-select" name="order_status">
					<?php foreach ($order_status as $key => $value): ?>
						<option value="<?php echo $key; ?>">
							<?php echo $value; ?>
						</option>
					<?php endforeach ?>
				</select>
			</p>
			<p>
				<textarea name="comment" placeholder="Коментарий"
				class="form-control"></textarea>
			</p>
			<p>
				<button name="order_add" value="true" 
				title="Создать" class="btn btn-outline-success">
				<i class="fa fa-check" aria-hidden="true"></i>
			</button>
			<a href="?main_page=orders" title="Отмена" class="btn btn-outline-danger">
				<i class="fa fa-times" aria-hidden="true"></i>
			</a>
		</p>
	</form>	
</div>
</div>