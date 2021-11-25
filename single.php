<?php get_header(); ?>
<?php include_once 'variables.php'; 
$current_order = post_data(get_post()->ID);
?>

<div class="container pt-5">
  <div class="row">
    <div class="col-12">
      <table class="order_print">
        <tr>
          <th>
            Заказ(<?php echo $order_status[$current_order['meta']['order_status'][0]];?>):
          </th>
          <th>
            <?php echo $current_order['meta']['order_date'][0]; ?>
          </th>
          <th>
            <?php echo $adress_arr[$current_order['data']->post_title]; ?>
          </th>
        </tr>
        <tr>
          <th>Контакты заказчика:</th>
          <th>
            <?php echo $current_order['meta']['customer_adress'][0]; ?>
          </th>
          <th>
            <?php echo $current_order['meta']['customer_phone'][0]; ?>
          </th>
        </tr>
        <tr>
          <td colspan="3">
            <?php echo $current_order['data']->post_content; ?>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>


<?php get_footer() ?>