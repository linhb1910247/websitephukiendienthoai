<?php
   if(!empty($_GET['msg'])){
    $msg= unserialize(urldecode($_GET['msg']));
   foreach( $msg as $key => $value ){
    echo '  <div class="">
    <h3>Thông báo</h>
    <div class="alert alert-success">
      <h4>'.$value.'</h4> 
    </div> ';
    }

}
  
?>

<nav aria-label="breadcrumb" style="font-size: 30px;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>/login/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" >Serach</li>
                    </ol>
                </nav>
<h3 style="text-align: center; font-size: 38px;margin: 30px 0;">List Orders</h3>     
<div class="input-group p-2">
  <div class="form-outline">
  <form action="<?php echo BASE_URL ?>/index/search_order?quanli=timkiem" method="POST">
            <input name="tukhoa" type="text" class="form-control" placeholder="Search keyword">

          </form>  
  </div>
   
</div>
        <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead style="font-size: 26px;text-align: center;">
                                          <tr >
                                            <th scope="col">Code</th>
                                            <th scope="col" >Name</th>
                                            <th scope="col" >Email</th>
                                            <th scope="col">Address</th>
                                            <th scope="col" >Phone</th>
                                            <th scope="col" >Payment</th>
                                            <th scope="col" >Date</th>
                                            <th scope="col" >Transaction</th>
                                            <th scope="col" >Status</th>
                                            <th scope="col" >Managers</th>
                                            <th scope="col" >Cancellation</th>
                                          </tr>
                                        </thead>
                                        <?php foreach ($search_list as $key => $ord){?>
                                        <tbody style="font-size: 20px; text-align: center;">
                                          <tr >
                                          <th scope="row"><?php echo $ord['order_code'] ?></th>

                                    
                                          <td ><?php echo $ord['name'] ?></td>
                                          <td ><?php echo $ord['email'] ?></td>
                                          <td ><?php echo $ord['address'] ?></td> 
                                          <td  ><?php echo $ord['phone'] ?></td>
                                          <td class="text-primary" ><?php echo $ord['payment_methods'] ?></td>
                                          <td ><?php echo $ord['order_date'] ?></td>
                          <td ><?php if($ord['transaction']== 1){echo 'Paid';} 
                       else  {echo 'Unpaid';} ?></td>
                        <td ><?php if($ord['order_status']== 0){echo 'New order';} 
                              else if($ord['order_status']==2){echo 'Cancelled';} else if($ord['order_status']==4){echo 'Deliver';} ?></td>
                              
                              <td  ><a class="btn btn-secondary"  href="<?php echo BASE_URL ?>/order/order_details/<?php echo $ord['order_code']?> "><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg></a>
                             <a class="btn btn-danger" href="<?php echo BASE_URL ?>/order/order_delete/<?php echo $ord['order_code']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                                                                </a></td>
                              <td class="text-center ">
                             <?php
                              if($ord['cancel']==1){
                                ?>
                                <a  href="<?php echo BASE_URL?>/order/cancelorder_confirm/<?php echo $ord['order_code'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/></svg></a>
                              <?php
                              }else if($ord['cancel']==2) {
                                ?>
                               <P></P>
                                <?php
                              }
                            ?>
                              </td>
                                        </tr>       
                                        </tbody>
                                      <?php } ?>
                                      </table>
                                </div>
                              
                            </div>
                        </div>
                    </div>
 
   
   
        </div>