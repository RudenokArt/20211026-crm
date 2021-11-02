
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
	<div class="row">
		<div class="col-lg-3 col-md-6 col-sm-12">
			<?php echo get_user_by('ID',$value->post_author)->data->display_name;?>
			<br>
			<?php echo $adress_arr[$value->post_title]; ?>
		</div>
		<?php $order_meta_fields = order_fields($value->ID) ?>
		<div class="col-lg-3 col-md-6 col-sm-12">
			<?php echo  $order_meta_fields['order_date'] ?>
			<br>
			<?php echo  $order_status[$order_meta_fields['order_status']] ?>
			<br>
			<?php if ($order_meta_fields['file']): ?>
				<a href="<?php echo  $order_meta_fields['file'] ?>" download>
					<i class="fa fa-cloud-download" aria-hidden="true"></i>
				</a>
			<?php endif ?>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-12">
			<?php echo  $order_meta_fields['customer_phone'] ?>
			<br>
			<?php echo  $order_meta_fields['customer_adress'] ?>
		</div>
		<div class="col-lg-3 col-md-12 col-sm-12">
			<?php echo $value->post_content; ?>
		</div>
	</div>
	<hr>
<?php endforeach ?>
