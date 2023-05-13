
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
                        <li class="breadcrumb-item active" aria-current="page">Add Products</li>
                    </ol>
                </nav>
<h3 style="text-align: center; font-size: 38px;margin: 30px 0;">Add product</h3>
<div class="container" style="margin-left: 200px;">

<div class="row-7 justify-content-md-center">
<div class="col col-lg-2"></div>
<div class="col-sm-7 ">
<form action="<?php echo BASE_URL ?>/product/insert_product" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <h2 >Product Name</h2>
    <input type="text" class="form-control" name="product_title"  placeholder="Product Name">

  </div>
  <div class="form-group">
    <h2 class="heading" >Product Image</h2>
    <input type="file" class="form-control" name="product_image"  placeholder="Product Image">
  </div>
  <div class="form-group">
    <h2 >Price</h2>
    <input type="text" class="form-control" name="product_price"  placeholder="Price">

  </div>
  <div class="form-group">
    <h2 >Category</h2>
    <select class="form-control" name="category_product_id">
          <?php
          foreach ($category as $key => $cate){
          ?>
          <option value="<?php echo $cate['category_product_id']?>"><?php echo $cate['category_product_title'] ?></option>
          <?php
            }
          ?>
    </select>
  </div>
  
  <div class="form-group">
    <h2 >Product description</h2>
    <textarea type="text" class="form-control" name="product_desc" placeholder="Product description"> </textarea>
  </div>
  <h2 >Size</h2>
  
  <div class="form-group row" style="padding: 2px;" Max>
  <div class="form-check col-sm-4 " style="font-size: 20px; ">
    <span class="input-group-text bg-secondary  text-white" id="inputGroup-sizing-sm">M</span>

  <input class="form-check-input" name="sizeM" type="hidden" value="M" id="flexCheckIndeterminate">
  <label class="form-check-label" for="flexCheckIndeterminate">
    <input type="text" class="form-control" name="qtyM"  placeholder="Quantity">
  </label>
  </div>
  <div class="form-check col-sm-4" style="font-size: 20px" >
  <span class="input-group-text bg-secondary  text-white " id="inputGroup-sizing-sm">S</span>

    <input class="form-check-input"  name="sizeS" type="hidden" value="S" id="flexCheckIndeterminate">
    <label class="form-check-label" for="flexCheckIndeterminate">
    <input type="text" class="form-control" name="qtyS"  placeholder="Quantity">
  </label>
  </div>
  <div class="form-check col-sm-4" style="font-size: 20px">
  <span class="input-group-text bg-secondary  text-white " id="inputGroup-sizing-sm">L</span>

    <input class="form-check-input" name="sizeL" type="hidden" value="L" id="flexCheckIndeterminate">
    <label class="form-check-label" for="flexCheckIndeterminate">
    <input type="text" class="form-control" name="qtyL"  placeholder="Quantity">

  </label>
  </div>

  </div>


 
  <button type="submit" class="btn btn-primary">Add</button>
</form>
</div>
<div class="col col-lg-2"></div>
</div>
</div>




