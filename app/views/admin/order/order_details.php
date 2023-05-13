<nav aria-label="breadcrumb" style="font-size: 30px;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>/login/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" >Orders details</li>
                    </ol>
                </nav>
<h3 style="text-align: center; font-size: 40px;margin: 30px 0;"> Orders details</h3>

<table class="table table-striped">
  <thead >
      <tr>
        <th style="text-align: center; font-size: 32px;">ID</th>
        <th style="text-align: center; font-size: 32px;">Product name</th>
        <th style="text-align: center; font-size: 32px;">Images</th>
        <th style="text-align: center; font-size: 32px;">Quantity</th>
        <th style="text-align: center; font-size: 32px;">Size</th>

        <th style="text-align: center; font-size: 32px;">Price</th>
        <th style="text-align: center; font-size: 32px;">Total product</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
    $total=0;
        foreach ($order_details as $key => $ord){
            $total +=$ord['order_product_quanlity']*$ord['product_price'];
            $i++;
    ?>

      <tr class="col 6">
        <td style="text-align: center; font-size: 25px;"><?php echo $i ?></td>
        <td style="text-align: center; font-size: 25px;"><?php echo $ord['product_title'] ?></td>
        <td style="text-align: center; font-size: 25px;"><img width='60'height='60' src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $ord['product_image'] ?>"></td>
        <td style="text-align: center; font-size: 25px;"><?php echo $ord['order_product_quanlity'] ?></td>
        <td style="text-align: center; font-size: 25px;"><?php echo $ord['size_product'] ?></td>

        <td style="text-align: center; font-size: 25px;"><?php echo number_format($ord['product_price'],0,',','.').'VNĐ' ?></td>
        <td style="text-align: center; font-size: 25px;"><?php echo number_format(($ord['order_product_quanlity']*$ord['product_price']),0,',','.').'VNĐ' ?></td>
      </tr>
      <?php
        }
         ?>
         <form method="post" action="<?php echo BASE_URL?>/order/order_confirm/<?php echo $ord['order_code'] ?>">
         <tr colspan="6">
            <td> <input type="submit" name="update_order" value="Process" class="btn btn-primary"></td>
            <td class="text-info" colspan="6"  align="right"> Total:  <?php echo number_format($total,0,',','.').'VNĐ' ?></td>
         </tr>
         </form>
    </tbody>
</table>