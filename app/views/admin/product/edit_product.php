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
                        <li class="breadcrumb-item active" aria-current="page" >Add Products</li>
                    </ol>
                </nav>
<h3 style="text-align: center; font-size: 38px;margin: 30px 0;">Add product</h3>
<div class=" col-md-6" style="margin-left: 200px;">
<?php
        foreach($productbyid as $key => $pro){
    ?>
<form action="<?php echo BASE_URL ?>/product/update_product?id=<?php echo $pro['product_id']?>&size=<?php echo $pro['size']?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label >Product Name</label>
    <input type="text" value="<?php echo $pro['product_title']?>" class="form-control" name="product_title"  placeholder="Product Name">

  </div>
  <div class="form-group">
    <label >Product image</label>
    <input type="file"  class="form-control" name="product_image"  placeholder="Product image">
          <p><img   height="100" width="100" src="<?php echo BASE_URL ?>/public/upload/product/<?php  echo $pro['product_image'] ?>" ></p>
  </div>
  <div class="form-group">
    <label >price</label>
    <input type="text" value="<?php echo $pro['product_price']?>" class="form-control" name="product_price"  placeholder="price">

  </div>
  

  <div class="form-group">
    <label >Product description</label>
    <textarea type="text" class="form-control" name="product_desc" placeholder="Product description"><?php echo $pro['product_desc']?> </textarea>
  </div>
  <h2 >Size</h2>
  
  <div class="form-group row" style="padding: 2px;" Max>
  <div class="form-check col-sm-4 " style="font-size: 20px; ">
    <span class="input-group-text bg-secondary  text-white" id="inputGroup-sizing-sm"><?php echo $pro['size']?></span>
  <input class="form-check-input" name="size" type="hidden"  value="<?php echo $pro['size']?>" id="flexCheckIndeterminate">
  <label class="form-check-label" for="flexCheckIndeterminate">
    <input type="text" value="<?php echo $pro['qty']?>" class="form-control" name="qty"  placeholder="Quantity">
  </label>
  </div>
  
  

  </div>
  <div class="form-group">
    <label >Category</label>
    <select class="form-control" name="category_product_id">
          <?php
          foreach ($category as $key => $cate){
          ?>
          <option <?php if($pro['category_product_id']==$cate['category_product_id']){ echo 'selected';}?> value="<?php echo $cate['category_product_id']?>"><?php echo $cate['category_product_title'] ?></option>
          <?php
            }
          ?>
    </select>
     

  </div>
  <div class="form-check">
    <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
  <?php 
        }
  ?>
</div>