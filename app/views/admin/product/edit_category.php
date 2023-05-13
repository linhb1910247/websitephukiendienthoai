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
                        <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>/product/list_category">List Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page" >Edit Category</li>
                    </ol>
                </nav>
<h3 style="text-align: center; font-size: 38px;margin: 30px 0;">Update Category</h3>
<div class="mx-auto" >
    <?php
        foreach($categorybyid as $key => $cate){
    ?>
<form action="<?php echo BASE_URL ?>/product/update_category/<?php echo $cate['category_product_id']?>" method="post">
  <div class="form-group">
    <label >Category name</label>
    <input type="text" value="<?php echo $cate['category_product_title'] ?>" class="form-control" name="category_product_title"  placeholder="Category name">

  </div>
  <div class="form-group">
    <label >Category description</label>
    <textarea class="form-control" placeholder="Category description" name="category_product_desc"  style="resize: none;" rows="5"><?php echo $cate['category_product_desc'] ?> </textarea>
  </div>
  <div class="form-group">
  <label >Category Image</label >
    <input type="file" class="form-control" name="category_product_images" value="<?php echo $cate['category_product_images'] ?>" placeholder="Product Image">

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