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
                        <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                    </ol>
                </nav>
<h3 style="text-align: center; font-size: 38px;margin: 30px 0;">Add Category</h3>
<div class="container" style="margin-left: 200px;">
<div class="row-7 justify-content-md-center">
<div class="col col-lg-"></div>
<div class="col-sm-7 ">
<form action="<?php echo BASE_URL ?>/product/insert_category" method="post">
  <div class="form-group">
    <h2 >Category name</h2>
    <input type="text" class="form-control" name="category_product_title"  placeholder="Category name">

  </div>
  <div class="form-group">
    <h2 >Category description</h2>
    <input type="text" class="form-control" name="category_product_desc" placeholder="Category description">
  </div>
  <div class="form-group">
    <h2  >Category Image</h2>
    <input type="file" class="form-control" name="category_product_images"  placeholder="Product Image">

  </div>
  <div class="form-check">

  </div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>
</div>
<div class="col col-lg-2"></div>
</div>
</div>