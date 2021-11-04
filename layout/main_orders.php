
<div class="row justify-content-center">
	<div class="col">
		<a href="?main_page=order_add">
			<button class="btn btn-outline-info">
				<i class="fa fa-plus-circle" aria-hidden="true"></i>
				Добавить заказ
			</button>
		</a>
	</div>
</div>
<br>


<?php foreach (orders_list() as $key => $value): ?>
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
