<?php $current_order = post_data($_GET['id']); ?>
<div class="row justify-content-center">
	<div class="col-lg-4 col-md-6 col-sm-12">
		<p class="h3">Редактирование заказа</p><br>
		<form action="" method="post" enctype="multipart/form-data">
			<p>
				<select class="form-select" name="company_adress">
					<?php foreach ($adress_arr as $key => $value): ?>
						<option 
						<?php if ($key == $current_order['data']->post_title): ?>
							selected
						<?php endif ?>
						value="<?php echo $key; ?>">
						<?php echo $value; ?>
					</option>
				<?php endforeach ?>
			</select>
		</p>
		<p>
			<span class="row">
				<span class="col-6">
					<input type="text" placeholder="Дата" required 
					value="<?php echo $current_order['meta']['order_date'][0]; ?>" 
					class="form-control" name="order_date">
				</span>
				<span class="col-6">
					<input type="text" placeholder="Телефон" required 
					value="<?php echo $current_order['meta']['customer_phone'][0];?>"
					class="form-control" name="customer_phone">
				</span>
			</span>
		</p>
		<p>
			<input type="text" placeholder="Адрес" required
			value="<?php echo $current_order['meta']['customer_adress'][0];?>"
			class="form-control" name="customer_adress">
		</p>
		<p>
			<input value="<?php echo $current_order['meta']['file'][0];?>" 
			type="hidden" name="unliking_file">
			<?php if (isset($current_order['meta']['file'][0])): ?>
				<a href="<?php echo $current_order['meta']['file'][0];?>" download>
					<i class="fa fa-paperclip" aria-hidden="true"></i>
					<?php echo array_pop(explode('/', $current_order['meta']['file'][0]));?>
				</a>
			<?php endif ?>
		</p>
		<p>
			<input type="file" class="form-control" name="upload_file">
		</p>
		<p>
			<select class="form-select" name="order_status">
				<?php foreach ($order_status as $key => $value): ?>
					<option 
					<?php if ($key == $current_order['meta']['order_status'][0]): ?>
						selected
					<?php endif ?>
					value="<?php echo $key; ?>">
					<?php echo $value; ?>
				</option>
			<?php endforeach ?>
		</select>
	</p>
	<p>
		<textarea name="comment" placeholder="Коментарий" class="form-control"><?php echo $current_order['data']->post_content;?></textarea>
	</p>
	<p>
		<button name="order_update" value="<?php echo $current_order['data']->ID;?>" 
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

<pre>	<?php print_r(post_data($_GET['id'])); ?> </pre>

