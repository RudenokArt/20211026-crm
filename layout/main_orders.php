<?php set_quantity_per_page(); ?>
<?php $page_data = orders_list() ?>
<?php if (isset($_POST['page_number'])) {
	$current_page = $_POST['page_number'];
} else { $current_page = 1;}?>

<div class="row justify-content-center">
	<div class="col-lg-4 col-md-6 col-sm-12 pt-2">
		<a href="?main_page=order_add" class="btn btn-outline-info">
			<i class="fa fa-plus-circle" aria-hidden="true"></i>
			Добавить заказ
		</a>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-12 pt-2">
		<a href="?main_page=orders_filter" class="btn btn-outline-info" title="Поиск">
			<i class="fa fa-search" aria-hidden="true"></i>
		</a>
		<?php if (isset($_POST['orders_filter']) and $_POST['orders_filter']=='true'): ?>
			<a href="?main_page=orders" class="btn btn-outline-info" title="Сброс">
				<i class="fa fa-times" aria-hidden="true"></i>
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
<div>
	<ul class="pagination">
		<?php if ($_POST['page_number'] > 1): ?>
			<li class="page-item">
				<form action="" method="post">
					<?php include 'main_orders_pagination_filter.php'; ?>
					<button class="page-link" name="page_number" 
					value="<?php echo $current_page-1; ?>">
					<i class="fa fa-chevron-left" aria-hidden="true"></i>
				</button>
			</form>
		</li>
	<?php endif ?>
	<?php for ($i=first_page($current_page); 
		$i<=last_page($current_page, $page_data['number_of_pages']); 
		$i++): ?>
		<li class="page-item 
		<?php if ($i==$current_page): ?>
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
	<?php if ($current_page < $page_data['number_of_pages']): ?>
		<li class="page-item">
			<form action="" method="post">
				<?php include 'main_orders_pagination_filter.php'; ?>
				<button class="page-link" name="page_number" 
				value="<?php echo $current_page+1; ?>">
				<i class="fa fa-chevron-right" aria-hidden="true"></i>
			</button>
		</form>
	</li>
<?php endif ?>
</ul>
</div>


<?php foreach ($page_data['page'] as $key => $value): ?>
	<?php $order_meta_fields = order_fields($value->ID) ?>
	<div class="row p-2 border" 
  style="background-color: <?php echo $order_colors[$order_meta_fields['order_status']]; ?>;">
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
      <a href="<?php echo get_permalink($value->ID); ?>" 
        class="btn btn-outline-success" target="_blank">
        <i class="fa fa-print" aria-hidden="true"></i>
      </a>
		</div>
	</div>
<?php endforeach ?>



