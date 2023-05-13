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
<nav aria-label="breadcrumb" style="font-size: 30px;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>/login/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" >List Products</li>
                    </ol>
                </nav>
<h3 style="text-align: center; font-size: 38px;margin: 30px 0;">List Products</h3>
<div class="input-group p-2">
  <div class="form-outline">
  <form action="<?php echo BASE_URL ?>/index/search_product?quanli=timkiem" method="POST">
            <input name="tukhoa" type="text" class="form-control" placeholder="Search keyword">

          </form>  
  </div>
   
</div>
<table class="table table-striped ">
  
<thead>
      <form action="<?php echo BASE_URL?>/product/list_product" method="post">
      <tr style="text-align: center; font-size: 22px;">
        <th>ID</th>
        <th  class="" >Name
          <button type="submit" name="sort" style="font-size: 8px; border:none; width:1px; height: 1px;" class=""><i class="fa-solid fa-arrow-down"></i>
      </button>
      <button type="submit" name="sortup" style="font-size: 8px; border:none;width:1px; height: 1px;" class="">
        <i class="fa-solid fa-arrow-up"></i>
      </button>
      </th>
        <th  class="text-center">Image</th>
        <th  class="text-center">Category</th>
        <th  class="">Price
        <button type="submit" name="pricedown" style="font-size: 8px; border:none; width:1px; height: 1px;" class=""><i class="fa-solid fa-arrow-down"></i>
      </button>
      <button type="submit" name="priceup" style="font-size: 8px; border:none;width:1px; height: 1px;" class="">
        <i class="fa-solid fa-arrow-up"></i>
      </button></th>
        <th  class="text-center">Size</th>
        <th  class="">Quantity<button type="submit" name="quantitydown" style="font-size: 8px; border:none; width:1px; height: 1px;" class=""><i class="fa-solid fa-arrow-down"></i>
      </button>
      <button type="submit" name="quantityup" style="font-size: 8px; border:none;width:1px; height: 1px;" class="">
        <i class="fa-solid fa-arrow-up"></i>
      </button></th>
        <th  class="text-center">Status</th>
        <th  class="text-center">Active</th>
      
        <!-- <th>Mô tá</th> -->
        <th  class="text-center">Manager</th>
      </tr>
      </form>
    </thead>
    <tbody>
    <?php
    $i=0;
        foreach ($product as $key => $pro){
            $i++;
  ?>
      <tr style="text-align: center; font-size: 22px;">
        <td><?php echo $i ?></td>
        <td  class="text-center"><?php echo $pro['product_title'] ?></td>
        <td  class="text-center"><img   height="60" width="60" src="<?php echo BASE_URL ?>/public/upload/product/<?php  echo $pro['product_image'] ?>" ></td>
        <td  class="text-center"><?php echo $pro['category_product_title'] ?></td>
        <td  class="text-center"><?php echo number_format($pro['product_price'],0,',','.').'VNĐ' ?></td>
        <td  class="text-center"><?php echo $pro['size'] ?></td>
        <td  class="text-center"><?php echo $pro['qty'] ?></td>
        <td>
          <?php if($pro['qty']== 0){ ?>
              <span class=" text-danger p-1">out of stock</span>
          <?php }
         else if($pro['qty']<=2){?> 
         <span class="   text-info">Product Are Out of Stock</span>
          <?php }else{ ?>
            <span class="text-info"></span>
        <?php }?>
        </td> 
        <td>
          <?php if($pro['status']== 0){ ?>
              <span class=" text-danger p-1">products stopped selling</span>
          <?php }
         else if($pro['status']==1){?> 
         <span class="text-info">products on sale</span>
          <?php } ?>
        </td> 
        <td>
          <?php if($pro['status']== 0){ ?>
            <a class="btn btn-info m-1"href="<?php echo BASE_URL ?>/product/turnon/<?php echo $pro['product_id']?>"> Turn on </a> 

          <?php }
         else if($pro['status']==1){?> 
                     <a class="btn btn-danger m-1"  href="<?php echo BASE_URL ?>/product/turnoff/<?php echo $pro['product_id']?>">Turn off</a> 

          <?php } ?>
        </td> 
        <td  class="text-center" ><a class="btn btn-danger btn-sm mb-1"href="<?php echo BASE_URL ?>/product/delete_product/<?php echo $pro['product_id']?>"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
</a> 
         <a class="btn btn-info btn-sm" href="<?php echo BASE_URL ?>/product/edit_product?id=<?php echo $pro['product_id']?>&size=<?php echo $pro['size']?>"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
</a></td>
      </tr>
      <?php
        }
         ?>
    </tbody>
  </table>