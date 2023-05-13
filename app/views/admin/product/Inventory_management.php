<div class="col-12 col-xl-12 mb-4 mb-lg-0">
<?php
  if(!empty($_GET['msg'])){
    $msg= unserialize(urldecode($_GET['msg']));
   foreach( $msg as $key => $value ){
    echo '  <div class="">
    <h3>Notification</h>
    <div class="alert alert-success">
      <h4>'.$value.'</h4> 
    </div> ';
    }

}
  
   
?>

                        <div class="card">
                            <h5 class="card-header">Out of stock</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead style="font-size: 26px;text-align: center;">
                                          <tr >
                                            <th scope="col">Id</th>
                                            <th scope="col" >Name</th>
                                            <th scope="col" >Image</th>
                                            <th scope="col">Pice</th>
                                            <th scope="col" >Size</th>
                                            <th scope="col" >Quantity</th>
                                            <th scope="col" >Status</th>
                                            <th scope="col" >Manager</th>
                                          </tr>
                                        </thead>
                                        <?php foreach ( $product as $key => $val ) {?>
                                        <tbody>
                                          <tr style="font-size: 20px; text-align: center;" >
                                            <th scope="row"><?php echo $val['product_id'] ?></th>
                                            <td ><?php echo $val['product_title'] ?></td>
                                            <td  class="text-center"><img   height="60" width="60" src="<?php echo BASE_URL ?>/public/upload/product/<?php  echo $val['product_image'] ?>" ></td>
                                            <td ><?php echo $val['product_price'] ?></td>
                                          
                                            <td ><?php echo $val['size'] ?></td>
                                            <td ><?php echo $val['qty'] ?></td>
                                            <td><span class=" text-danger p-1">Out of stock</span></td>
                                            </td> 
                                           <td  class="text-center" ><a class="btn btn-danger m-1"href="<?php echo BASE_URL ?>/product/delete_product_details/<?php echo $val['size']?>"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></a> 
                                       <a class="btn btn-info" href="<?php echo BASE_URL ?>/product/edit_product?id=<?php echo $val['product_id']?>&size=<?php echo $val['size']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></a></td>
                                          </tr>
                                         
                                        </tbody>
                                      <?php } ?>
                                      </table>
                                <!-- </div>
                                <form   action="<?php echo BASE_URL ?>/login/dashboard"    method="POST">
                                <input type="hidden" name="transactionsviewall"></input>
                                <button type="submit"  class="btn btn-block btn-light">View all</button>
                                </form>
                            </div> -->
                        </div>
                    </div>
                        </div>
</div>
<div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Products Are Out of Stock</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead style="font-size: 26px;text-align: center;">
                                          <tr >
                                            <th scope="col">Id</th>
                                            <th scope="col" >Name</th>
                                            <th scope="col" >Image</th>
                                            <th scope="col">Pice</th>
                                            <th scope="col" >Size</th>
                                            <th scope="col" >Quantity</th>
                                            <th scope="col" >Status</th>
                                            <th scope="col" >Manager</th>
                                          </tr>
                                        </thead>
                                        <?php foreach ( $sanphamsaphet as $key => $pro ) {?>
                                        <tbody>
                                          <tr style="font-size: 20px; text-align: center;" >
                                            <th scope="row"><?php echo $pro['product_id'] ?></th>
                                            <td ><?php echo $pro['product_title'] ?></td>
                                            <td  class="text-center"><img   height="60" width="60" src="<?php echo BASE_URL ?>/public/upload/product/<?php  echo $pro['product_image'] ?>" ></td>
                                            <td ><?php echo $pro['product_price'] ?></td>
                                          
                                            <td ><?php echo $pro['size'] ?></td>
                                            <td ><?php echo $pro['qty'] ?></td>
                                            <td><span class=" text-info p-1">Products Are Out of Stock</span></td>
                                            </td> 
                                           <td  class="text-center" ><a class="btn btn-danger m-1"href="<?php echo BASE_URL ?>/product/delete_product_details/<?php echo $pro['size']?>"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></a> 
                                       <a class="btn btn-info" href="<?php echo BASE_URL ?>/product/edit_product?id=<?php echo $pro['product_id']?>&size=<?php echo $pro['size']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></a></td>
                                          </tr>
                                         
                                        </tbody>
                                      <?php } ?>
                                      </table>
                                <!-- </div>
                                <form   action="<?php echo BASE_URL ?>/login/dashboard"    method="POST">
                                <input type="hidden" name="transactionsviewall"></input>
                                <button type="submit"  class="btn btn-block btn-light">View all</button>
                                </form>
                            </div> -->
                        </div>
                    </div>
                        </div>
</div>
<div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Products in stock</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead style="font-size: 26px;text-align: center;">
                                          <tr >
                                            <th scope="col">Id</th>
                                            <th scope="col" >Order Code</th>
                                            <th scope="col" >Name</th>
                                        
                                            <th scope="col" >Image</th>
                                            <th scope="col">Pice</th>
                                            <th scope="col" >Size</th>
                                            <th scope="col" >Quantity</th>
                                            <th scope="col" >Status</th>
                                            <th scope="col" >Manager</th>
                                          </tr>
                                        </thead>
                                        <?php foreach ($sanphamtonkho as $key => $tonkho) {?>
                                        <tbody>
                                          <tr style="font-size: 20px; text-align: center;" >
                                          <th scope="row"><?php echo $tonkho['order_code'] ?></th>
                                            <th scope="row"><?php echo $tonkho['product_id'] ?></th>
                                            <td ><?php echo $tonkho['product_title'] ?></td>
                                            <td  class="text-center"><img   height="60" width="60" src="<?php echo BASE_URL ?>/public/upload/product/<?php  echo $tonkho['product_image'] ?>" ></td>
                                            <td ><?php echo $tonkho['product_price'] ?></td>
                                          
                                            <td ><?php echo $tonkho['size_product'] ?></td>
                                            <td ><?php echo $pro['qty'] ?></td>
                                           
                                            <td style="text-align: center;"><?php if($tonkho['order_status']== 4){echo 'Deliver';} 
                                             else if($tonkho['order_status']== 5)  {echo 'Not to receive';} ?></td>
                                            </td> 
                                           <td  class="text-center" >
                                       <a class="btn btn-info" href="<?php echo BASE_URL ?>/order/cancelorder/<?php echo $tonkho['order_code']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></a></td>
                                          </tr>
                                         
                                        </tbody>
                                      <?php } ?>
                                      </table>
                                <!-- </div>
                                <form   action="<?php echo BASE_URL ?>/login/dashboard"    method="POST">
                                <input type="hidden" name="transactionsviewall"></input>
                                <button type="submit"  class="btn btn-block btn-light">View all</button>
                                </form>
                            </div> -->
                        </div>
                    </div>
                        </div>
</div>