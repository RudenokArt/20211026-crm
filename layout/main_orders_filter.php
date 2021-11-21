
<form action="?main_page=orders" method="post">
	<div class="row justify-content-center pb-2">
		<div class="col-lg-4 col-md-6 col-sm-12">
			<p class="h3">
				Поиск заказов:
			</p>
			<select class="form-select" name="company_adress">
				<option value="">Пункт (не выбран)</option>
				<?php foreach ($adress_arr as $key => $value): ?>
					<option value="<?php echo $key; ?>">
						<?php echo $value; ?>
					</option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
	<div class="row justify-content-center">
		<div  class="col-lg-2 col-md-3 col-sm-6 pb-2">
			<input type="text" placeholder="Дата c" 
			class="form-control drop_calendar" name="order_date_for">
		</div>
		<div  class="col-lg-2 col-md-3 col-sm-6 pb-2">
			<input type="text" placeholder="Дата по" 
			class="form-control drop_calendar" name="order_date_to">
		</div>
	</div>
	<div class="row justify-content-center pb-2">
		<div  class="col-lg-4 col-md-6 col-sm-12">
			<select class="form-select" name="order_status">
				<option value="">Статус (не выбран)</option>
				<?php foreach ($order_status as $key => $value): ?>
					<option value="<?php echo $key; ?>">
						<?php echo $value; ?>
					</option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
	<div class="row justify-content-center pb-2">
		<div class="col-lg-4 col-md-6 col-sm-12">
			<input type="text" class="form-control" 
			name="customer_phone_filter" placeholder="Телефон...">
		</div>
	</div>
	<div class="row justify-content-center pb-2">
		<div class="col-lg-4 col-md-6 col-sm-12">
			<input type="text" class="form-control" 
			name="customer_adress" placeholder="Адрес...">
		</div>
	</div>
	<div class="row justify-content-center pb-2">
		<div class="col-lg-4 col-md-6 col-sm-12">
			<input type="text" class="form-control" 
			name="order_comment" placeholder="Комментарий содержит...">
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-lg-4 col-md-6 col-sm-4 col-sx-12">
			<button  class="btn btn-outline-success" name="orders_filter" value="true">
				<i class="fa fa-check" aria-hidden="true"></i>
			</button>
			<a href="?main_page=orders" class="btn btn-outline-danger" title="Отмена">
				<i class="fa fa-times" aria-hidden="true"></i>
			</a>
		</div>
	</div>
</form>


