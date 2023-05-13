
  
  <div class="site-wrap">
  <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo BASE_URL ?>/index/homepage">Home</a> <span class="mx-2 mb-0 ">/ Checkout</span>
        <span class="mx-2 mb-0"></span> 
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

        </div>
        </div>
      </div>
    </div>  
    <?php
    
    if(isset($_SESSION['addtocart'])){
     
      ?>

      <div class="container">
        <!-- <div class="row mb-5">
          <div class="col-md-12">
            <div class="border p-4 rounded" role="alert">
              Returning customer? <a href="#">Click here</a> to login
            </div>
          </div>
        </div> -->
        <div class="row">
          <div class="col-md-6 mb-4 mb-md-0">
            <h2 class="h3 mb-3 text-info">Billing Details</h2>
           
            <form name="formoder" action="<?php echo BASE_URL ?>/checkout/checkout" method="POST" autocomplete="off">
            <?php 
                foreach($customer as $key => $info){
              ?>
            <div class="p-3 p-lg-5 border">
            
          

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_companyname" class="text-black">Company Name </label>
                  <input type="text" class="form-control" id="c_companyname" name="name"  value="<?php echo $info['customers_name'] ?>">
                </div>
              </div>
              <input type="hidden" name="customers_id"class="form-control" id="c_fname" name="name" value="<?php echo $info['customers_id']?>">
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="address" value="<?php echo $info['address'] ?>">
                </div>
              </div>


             

              <div class="form-group row mb-5">
                <div class="col-md-12">
                  <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control text-dark" id="c_email_address" name="email" value="<?php echo $info['email'] ?>">
                </div>
                <div class="col-md-12">
                  <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="phone" value="<?php echo $info['phone'] ?>">
                </div>
                <div class="col-md-12">
                  <label for="c_phone" class="text-black">Payment methods<span class="text-danger">*</span></label>
                  <select class="form-control" Name="method_payment" id="exampleFormControlSelect1">
                      <option value="Online">Online payment</option>
                      <option value="Cash">Cash payment</option>
                     
                    </select>                
                  </div>
              </div>

              <div class="form-group">
                <label for="c_order_notes" class="text-black">Order Notes</label>
                <textarea name="note" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
              </div>
            </div>
            <input type="submit"  class=" btn-primary text-center m-2 b-1"  class="bg-danger"  name="formoder" value="Checkout">
            <?php }?>
            </form>
        
             </div>
              <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class=" mb-3 text-info">Your Order</h3>
                <div class=" p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th style="font-size: 25px;">Product</th>
                      <th style="font-size: 25px;">Total</th>
                    </thead>
                 
                    <tbody>
                    <?php 
              
                   $total =0;
               foreach($_SESSION['addtocart'] as $key =>$value){
                $subtotal = $value['quanlity_product']*$value['price_product'];
                //sau moi lan lap cong moi thu thanh tien lai
                $total+=$subtotal;
              ?>
                      <tr>
                        <td style="font-size: 25px;"><?php echo $value['title_product'] ?><strong class="mx-2"></strong>X <?php echo $value['quanlity_product'] ?> <?php echo $value['size_product'] ?></td>
                        <td style="font-size: 20px;"><?php echo number_format($value['price_product'],0,',','.').'VNĐ' ?></td>
                      </tr>
                    
                      <tr>
                        <td class="text-dark font-weight-bold" style="font-size: 25px;"><strong>Cart Subtotal</strong>$</td>
                        <td style="font-size: 23px;"><?php echo number_format($subtotal,0,',','.').'VNĐ' ?></td>

                      </tr>
                      <?php }?> 
                      <tr>
                        <td class="text-info font-weight-bold" style="font-size: 30px;"><strong>Order Total</strong></td>
                        <td class="text-info font-weight-bold" style="font-size: 25;"><strong><?php echo number_format($total,0,',','.').'VNĐ' ?></strong></td>
                      </tr>
                    
                    </tbody>
                 
                  </table>
                  <div class="form-group">
                 
                  </div>
                  
                </div>
              </div>
            </div>

          </div>
         
        </div> 
       
      </div>
    
        <?php }?>
  </div>
