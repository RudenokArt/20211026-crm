<?php get_header(); ?>
<?php include_once 'variables.php'; 
$current_order = post_data(get_post()->ID);
?>

<div class="container pt-5">
  <div class="row">
    <div class="col-12">
      <table class="order_print">
        <tr>
          <th>Заказ: </th>
          <td><?php echo  get_post()->ID ?></td>
        </tr>
        <tr>
          <th>Офис:</th>
          <td><?php echo $adress_arr[$current_order['data']->post_title]; ?></td>
        </tr>
        <tr>
          <th>Дата: </th>
          <td><?php echo $current_order['meta']['order_date'][0]; ?></td>
        </tr>
        <tr>
          <th>Статус: </th>
          <td><?php echo $order_status[$current_order['meta']['order_status'][0]];?></td>
        </tr>
        <tr>
          <th>Адрес заказчика: </th>
          <td><?php echo $current_order['meta']['customer_adress'][0]; ?></td>
        </tr>
        <tr>
          <th>Телефон заказчика</th>
          <td><?php echo $current_order['meta']['customer_phone'][0]; ?></td>
        </tr>
        <tr>
          <th>Комментарий:</th>
          <td><?php echo $current_order['data']->post_content; ?></td>
        </tr>
      </table>
    </div>
  </div>
</div>


<?php get_footer() ?>