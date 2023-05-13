
<?php 
 use Gregwar\Captcha\CaptchaBuilder;
 use Gregwar\Captcha\PhraseBuilder;
 use Carbon\Carbon;
use Carbon\CarbonInterval;
          $Revenue =0;
          $Total_quantity =0;
          $Total_order=0;
          $date_order="7";
          foreach($ordermua as $key => $val){ 
            $Total_order+=1;
            $now=Carbon::now('asia/ho_chi_minh')->toDateString();
            $subdays_order=Carbon::now('asia/ho_chi_minh')->subdays(7)->toDateString();
            if(isset($_POST['thoigianmua'])){
              if( $_POST['thoigianmua']=='7ngay'){
                $date_order='7';
             }
            if( $_POST['thoigianmua']=='28ngay'){
            $date_order='28';
            }
          if( $_POST['thoigianmua']=='90ngay'){
            $date_order='90';
            }
           if( $_POST['thoigianmua']=='365ngay'){
          $date_order='365';
         }
          $subdays_order=Carbon::now('asia/ho_chi_minh')->subdays($date_order)->toDateString();
            }
          }
          $date='7';
      foreach($order as $key => $value){    
        $Revenue += $value['sales'];
        $Total_quantity += $value['quanlity'];
        $now=Carbon::now('asia/ho_chi_minh')->toDateString();
        $subdays=Carbon::now('asia/ho_chi_minh')->subdays(7)->toDateString();
        if(isset($_POST['thoigian'])){
          if( $_POST['thoigian']=='7ngay'){
            $date='7';
         }
        if( $_POST['thoigian']=='28ngay'){
        $date='28';
        }
      if( $_POST['thoigian']=='90ngay'){
        $date='90';
        }
       if( $_POST['thoigian']=='365ngay'){
      $date='365';
     }
      $subdays=Carbon::now('asia/ho_chi_minh')->subdays($date)->toDateString();
        }
       
      }?>
                <h1 class="h3">Dashboard</h1>
             
                <div class="row my-4">
                    <div class="col-12 col-md-6 col-lg-3  ">
                        <div class="card">
                            
                        <h5 class="card-header">
                            <form action="<?php echo BASE_URL ?>/login/dashboard"    method="POST">
                            Purchases
                                      <select class="select-date_purchatr " name="thoigianmua">
                                      <option selected value="<?php echo $date_order;?>ngay"><?php echo $date_order;?> days</option>
                                      <option value="7ngay">7 days</option>
                                      <option value="28ngay">28 days</option>
                                      <option value="90ngay">90 days</option>
                                      <option value="365ngay">365 days</option>
                                      <!-- <input value="Submit" type="submit"> -->
                                      </select>  
                                      <button type="submit" style="width: 30px; height: 30px;" class="btn btn-sm btn-primary mb-2"> <span class="fa-stack  "><i class="fa fa-search fa-sm fa-stack-1x mr-4 pr-4 pb-4 fa-inverse" ></i></span></button>
                                  </form>
                            </h5>
                            <div class="card-body">
                              <h4 class="card-title">Total: <?php echo $Total_order ?></h4>
                              <h5 class="card-text"> <?php echo $now ?> , <?php echo $subdays_order ?></h5>
                              <!-- <h5 class="card-text text-success">18.2% increase since last month</h5> -->
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6  mb-lg-0 col-lg-3">
  
                        <div class="card">
                          
                            <h5 class="card-header">
                            <form action="<?php echo BASE_URL ?>/login/dashboard"    method="POST">
                            Revenue
                                      <select class="select-date  " name="thoigian">
                                      <option selected value="<?php echo $date;?>ngay"><?php echo $date;?> days</option>
                                      <option value="7ngay">7 days</option>
                                      <option value="28ngay">28 days</option>
                                      <option value="90ngay">90 days</option>
                                      <option value="365ngay">365 days</option>
                                      <!-- <input value="Submit" type="submit"> -->
                                      </select>  
                                      <button type="submit" style="width: 30px; height: 30px;" class="btn btn-sm btn-primary mb-2"> <span class="fa-stack  "><i class="fa fa-search fa-sm fa-stack-1x mr-4 pr-4 pb-4 fa-inverse" ></i></span></button>
                                  </form>
                            </h5>
                            
                            <div class="card-body">
                              
                              <h4 class="card-title">Total: <?php echo number_format($Revenue,0,',','.').' VNĐ'  ?></h4>
                              <h6 class="card-text"> <?php echo $now ?> , <?php echo $subdays ?></h3>
                              <h5 class="card-text text-success">Total quantity: <?php echo $Total_quantity ?></h5>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6  mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Store</h5>
                            <div class="card-body">
                              <?php  $hethang =0; foreach ($product as $key => $producthethang) {  
                                 $hethang ++;
                              }?>
                                <?php  $saphethang =0; foreach ($sanphamsaphet as $key => $sanphamhethang) {  
                                 $saphethang ++;
                              }?>
                               <?php  $tonkho =0; foreach ($sanphamtonkho as $key => $TONKHO) {  
                                 $tonkho ++;
                              }?>
                               <?php  $product =0; foreach ($list_product as $key => $product1) {  
                                 $product ++;
                              }?>
                              
                              <h4 class="card-title">Total products: <?php echo $product?></h4>
                             <h5 class="card-text" ><a class="text-dark" style="font-size:20px" href="<?php echo BASE_URL?>/product/inventory_management">Size is out of stock: <?php echo $hethang ?> </a> </h5>
                             <h5 class="card-text" ><a  class="text-dark"  style="font-size:20px" href="<?php echo BASE_URL?>/product/inventory_management">Size is almost out of stock: <?php echo $hethang ?> </a> </h5>
                             <h5 class="card-text" ><a class="text-dark"  style="font-size:20px" href="<?php echo BASE_URL?>/product/inventory_management">Products in stock: <?php echo $tonkho ?> </a> </h5>

                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6  mb-lg-0 col-lg-3">
                        <div class="card">
                        <?php  $block =0; $user =0; $acount = 0;  foreach ($customers as $val => $user1) {
                                 $acount++;
                                  if($user1['level']==-1){
                                    $block++;
                                  }
                                  if($user1['level']==0){
                                    $user++;
                                  }

                              }?>
                            <h5 class="card-header">Account</h5>
                            <div class="card-body">
                              <h4 class="card-title">Total Account: <?php echo $acount ?></h4>
                              <h5 class="card-text">Total account is locked: <?php echo $block ?></h5>
                              <h5 class="card-text">Total Users: <?php echo $user?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Latest transactions</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead style="font-size: 20px;text-align: center;">
                                          <tr >
                                            <th scope="col">Order_id</th>
                                            <th scope="col" >Date</th>
                                            <th scope="col" >Customer</th>
                                            <th scope="col">Total</th>
                                            <th scope="col" >BankTranNo</th>
                                            <th scope="col" >Bank Code</th>
                                            <th scope="col" >View</th>
                                          </tr>
                                        </thead>
                                        <?php foreach ( $transactions as $key => $val ) {?>
                                        <tbody>
                                          <tr style="font-size: 18px; text-align: center;" >
                                            <th scope="row"><?php echo $val['order_code'] ?></th>
                                            <td ><?php echo $val['vnp_PayDate'] ?></td>
                                            <td ><?php echo $val['email'] ?></td>
                                            <td><?php echo $val['total_order'] ?></td>
                                            <td ><?php echo $val['vnp_BankTranNo'] ?></td>
                                            <td ><?php echo $val['bank_code'] ?></td>
                                            <td><a href="<?php echo BASE_URL ?>/order/order_details/<?php echo $val['order_code']?>" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
                                         
                                        </tbody>
                                      <?php } ?>
                                      </table>
                                </div>
                                <form   action="<?php echo BASE_URL ?>/login/dashboard"    method="POST">
                                <input type="hidden" name="transactionsviewall"></input>
                                <button type="submit"  class="btn btn-block btn-light">View all</button>
                                </form>
                            </div>
                        </div>
                    </div>
                  
              <div class="row p-4">
                    <div class="">
                    <div class="col-12 ">
                        <div class="card">
                            <h5 class="card-header" id="text-date">Order statistics by:</h5>
                            <div class="card-body" style="font-size: 20px;">
                            <form action="<?php echo BASE_URL ?>/login/dashboard"    method="POST">
                                      <select class="select-date " name="thoigian">
                                    
                                      <option value="7ngay">7 days</option>
                                      <option value="28ngay">28 days</option>
                                      <option value="90ngay">90 days</option>
                                      <option value="365ngay">365 days</option>
                                      <!-- <input value="Submit" type="submit"> -->
                                      </select>  
                                      <button type="submit" class="btn btn-sm btn-primary"> <span class="fa-stack "><i class="fa fa-search fa-inverse"></i></span></button>
                                  </form>
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                  
   