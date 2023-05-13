
      <div class="container">
        <div class="row">
        
        </div>
      </div>
    </div>
   
    <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a  href="<?php echo BASE_URL ?>/index/homepage/<?php echo BASE_URL ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Order</strong></div>
        </div>
      </div>
    </div>
    <div>
  <?php
 if(!empty($_GET['msg'])){
  $msg= unserialize(urldecode($_GET['msg']));
 foreach( $msg as $key => $value ){
  echo '  <div class="container">
  <h3>Notification</h>
  <div class="alert alert-success">
    <h4>'.$value.'</h4> 
  </div> ';
  }

}

    ?>
</div>
<div class="container responsive ">
<h1 class="m-2" style="text-align: center;"> Orders Your</h1>

<table class="table table-striped">
  <thead >
      <tr style="font-size: 22px;">
        <th class="text-center"><Span>ID</Span></th>
        <th class="text-center"><Span>Order code</Span></th>
        <th class="text-center"><Span>Order date</Span></th>
        <th class="text-center"><Span>Managger</Span></th>
        <th class="text-center"><Span>Transaction</Span></th>
        <th class="text-center"><Span>Status</Span></th>
        <th class="text-center"><Span>Payment methods</Span></th>
       
        <th class="text-center"><Span>Resquest </Span></th>
        
      </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
    $total=0;
        foreach ($order_details as $key => $ord){
          
            $i++;
    ?>

      <tr class="col 6" style="font-size: 20px;">
        <td class="text-center"><?php echo $i ?></td>
        <td class="text-center"><?php echo $ord['order_code'] ?></td>
        <td class="text-center"><?php echo $ord['order_date'] ?></td>
        <td class="text-center"><a href="<?php echo BASE_URL ?>/order/customer_orderdetails/<?php echo $ord['order_code'] ?>">Details</a></td>
        <td style="text-align: center;"><?php if($ord['transaction']== 1){echo 'Paid';} 
        else {echo 'Unpaid';} ?></td>
       <td style="text-align: center;"><?php if($ord['order_status']== 0){echo 'New order';} 
         if($ord['order_status']==2){echo 'Cancelled';}else if($ord['order_status']==4){echo 'Delivery';} ?></td>
                <td class="text-center"><?php echo $ord['payment_methods'] ?></td>

        <td class="text-center">
            <?php if($ord['order_status']==0 ){?>
              <form method="post" action="<?php echo BASE_URL?>/order/canncel_order">
              <input type="hidden" name="code" value="<?php echo $ord['order_code']?>">
              <input type="hidden" name="customers_id" value="<?php echo $ord['customers_id']?>">
              <input type="hidden" value="1" name="cancel" >
              <button type="submit" class="btn btn-danger btn-sm" >Cancel Order</button>
            </form>
            <?php }else if($ord['cancel']==2 || $ord['order_status']==4){ ?>
              <p></p>
            <?php }else{ ?>

                <p>Wait process...</p>
              <?php } ?>      
           
        </td>
        <td>
       
             
             
         </td>
      </tr>
      <?php
        }
         ?>
         
       
         </form>
       
    </tbody>
</table>
</div>