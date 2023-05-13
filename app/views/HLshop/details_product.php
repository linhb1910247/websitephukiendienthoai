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
  
foreach ($detail_product as $key => $value){
    $product_name = $value['product_title'];
    $product_image = $value['product_image'];
    $product_price = $value['product_price'];
    $product_desc = $value['product_desc'];
    // $product_quanlity = $value['product_quanlity'];
    $name_category_product = $value['category_product_title'];
    $product_id=$value['product_id'];
    
}
if(Session::get('customer')){
  $user_id=Session::get('customers_id');
  $avatar_session=Session::get('avatar');
}
?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo BASE_URL ?>/index/homepage">Home</a> <span class="mx-2 mb-0 ">/</span>
           <a href="<?php echo BASE_URL ?>/index/homepage">Shop</a> <span class="mx-2 mb-0">/</span> 
           <span class="text-secondary"><?php echo $name_category_product  ?>/</span>
           <span class="text-danger"><?php echo $product_name ?></span>

          </div>
          </div>
      </div>
    </div>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

           <form action="<?php echo BASE_URL ?>/cart/addtocart" method="POST" >
                         <input type="hidden" name="id_product" value="<?php echo $value['product_id'] ?>" >
                        <input type="hidden" name="title_product" value="<?php echo $value['product_title'] ?>" >
                        <input type="hidden" name="image_product" value="<?php echo $value['product_image'] ?>">
                        <input type="hidden" name="price_product" value="<?php echo $value['product_price'] ?>">
                        <input type="hidden" name="quanlity_product" value="1">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="item-entry">
              <a href="#" class="product-item md-height bg-gray d-block">
                <img src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $product_image ?>" alt="Image" class="img-fluid">
              </a>
              
            </div>

          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $product_name ?></h2>
            <h4><?php echo $product_desc ?></h4>
            <?php  foreach ( $detail_product as $k => $ord) {?>
           
            <?php if($ord['size'] =='M' && $ord['qty'] !=0){ ?>
               <div class="form-check form-check-inline">
              <input class="form-check-input" name="size" type="checkbox" id="inlineCheckbox1" value="M" >

              <label class="form-check-label" for="inlineCheckbox1">M</label>
            </div>

            <?php } }?> 
            <?php  foreach ( $detail_product as $k => $ord) { 
            if($ord['size'] =='L' && $ord['qty'] !=0){ ?>
              <div class="form-check form-check-inline">
              <input class="form-check-input" name="size"  type="checkbox" id="inlineCheckbox2" value="L" >
              <label class="form-check-label" for="inlineCheckbox2">L</label>
            </div>
          
            <?php }} ?> 
            <?php  foreach ( $detail_product as $k => $ord)  {
            if($ord['size'] =='S' && $ord['qty'] !=0){ ?>
                  <div class="form-check form-check-inline">
              <input class="form-check-input" name="size"  type="checkbox" id="inlineCheckbox2" value="S">
              <label class="form-check-label" for="inlineCheckbox2">S</label>

            </div>
           <?php } }?>
              
        
            <p><strong class="text-primary h4"><?php echo number_format($product_price,0,',','.').'VNĐ'?></strong></p>
           
                <input type="submit" class=" btn-sm btn-primary"  class="bg-danger"  name="addcart" value="Addtocart">
            </div>
           
          </div>
         

        </div>
      </div>
      </form>
     
      <style type="text/css">
        body{background: #eee}.date{font-size: 11px}.comment-text{font-size: 18px}.fs-12{font-size: 12px}.shadow-none{box-shadow: none}.name{color: #007bff}.cursor:hover{color: blue}.cursor{cursor: pointer}.textarea{resize: none}
        </style>
      <div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-12">
            <div class="d-flex flex-column comment-section">
            <?php foreach ($comment as $key => $cmt){

                ?>
              
                <div class="bg-white p-2">
                    <div class="d-flex flex-row user-info"><img class="rounded-circle" src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $cmt['avatar']?>" width="60" height="60" alt>
                        <div class=" flex-column justify-content-start ml-2"><span style="font-size: 22px" class="d-block font-weight-bold name"><?php echo $cmt['customers_name']?></span><span class="date text-black-50"><?php echo $cmt['comment_date']?></span></div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text"><?php echo $cmt['content_comment']?></p>
                    </div>
              
                <?php } ?>
                <h4>Your comment</h4>
                <form action="<?php echo BASE_URL ?>/product/comment" method="POST" >
                <div class="bg-light p-2">
                    <div class="d-flex flex-row align-items-start">
                      
                      <img class="rounded-circle" src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $avatar_session?>" width="40">
                      <textarea name="content" class="form-control ml-1 shadow-none textarea"></textarea></div>
                    <div class="mt-2 text-right">
                    <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                   <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                      <button class="btn btn-primary btn-sm shadow-none" type="submit">Post comment</button>
                      <button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="submit">Cancel</button></div>
                      
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
