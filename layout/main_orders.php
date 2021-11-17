<?php set_quantity_per_page(); ?>
<?php $page_data = orders_list() ?>

<div class="row justify-content-center">
	<div class="col-lg-4 col-md-6 col-sm-12 pt-2">
		<a href="?main_page=order_add" class="btn btn-outline-info">
			<i class="fa fa-plus-circle" aria-hidden="true"></i>
			Добавить заказ
		</a>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-12 pt-2">
		<a href="?main_page=orders_filter" class="btn btn-outline-info">
			<i class="fa fa-filter" aria-hidden="true"></i>
			Фильтр
		</a>
		<?php if (isset($_POST['orders_filter'])): ?>
			<a href="?main_page=orders" class="btn btn-outline-info">
				<i class="fa fa-times" aria-hidden="true"></i>
				Сброс
			</a>
		<?php endif ?>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-12 pt-2">
		<form action="" method="post">
			<?php include 'main_orders_pagination_filter.php'; ?>
			<div class="input-group mb-3 pagination_manager">
				<span class="input-group-text">Выводить по:</span>
				<input type="text" class="form-control"
				value="<?php echo get_quantity_per_page();?>" 
				name="pagination_manager" 
				aria-label="Recipient's username" 
				aria-describedby="button-addon2">
				<button class="btn btn btn-outline-info" id="button-addon2">
					<i class="fa fa-check" aria-hidden="true"></i>
				</button>
			</div>
		</form>
	</div>
</div>
<br>

<?php echo $page_data['number_of_pages'] ?>
<div>
	<ul class="pagination">
		<?php for ($i=1; $i<=$page_data['number_of_pages']; $i++): ?>
			<li class="page-item <?php if ($i==$_POST['page_number']): ?>
				active
			<?php endif ?>">
				<form action="" method="post">
					<?php include 'main_orders_pagination_filter.php'; ?>
					<button class="page-link" name="page_number" value="<?php echo $i; ?>">
						<?php echo $i; ?>
					</button>
				</form>
			</li>
		<?php endfor; ?>
		<li class="page-item disabled">
			<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
		</li>
		<li class="page-item"><a class="page-link" href="#">1</a></li>
		<li class="page-item active" aria-current="page">
			<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
		</li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item">
			<a class="page-link" href="#">Next</a>
		</li>
	</ul>
</div>


<?php foreach ($page_data['page'] as $key => $value): ?>
	<?php $order_meta_fields = order_fields($value->ID) ?>
	<div class="row">
		<div class="col-lg-3 col-md-6 col-sm-12">
			<?php echo get_user_by('ID',$value->post_author)->data->display_name;?>
			<br>
			<?php echo $adress_arr[$value->post_title]; ?>
			<?php echo  $order_meta_fields['order_date'] ?>
		</div>
		<div class="col-lg-2 col-md-6 col-sm-12">
			<?php echo  $order_status[$order_meta_fields['order_status']] ?>
			<?php if ($order_meta_fields['file']): ?>
				<a href="<?php echo  $order_meta_fields['file'] ?>" download>
					<i class="fa fa-cloud-download" aria-hidden="true"></i>
				</a>
			<?php endif ?>
			<br>
			<?php echo  $order_meta_fields['customer_phone'] ?>
			<br>
			<?php echo  $order_meta_fields['customer_adress'] ?>
		</div>
		<div class="col-lg-5 col-md-6 col-sm-12">
			<?php echo $value->post_content; ?>
		</div>
		<div  class="col-lg-2 col-md-6 col-sm-12">
			<a href="?main_page=order_update&id=<?php echo $value->ID;?>"
				class="btn btn-outline-info">
				<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
			</a>
			<a href="?main_page=delete&entity=orders&id=<?php echo $value->ID;?>"
				class="btn btn-outline-danger">
				<i class="fa fa-trash-o" aria-hidden="true"></i>
			</a>
		</div>
	</div>
	<hr>
<?php endforeach ?>



