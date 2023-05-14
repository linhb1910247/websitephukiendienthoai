 
      <div class="container">
    



        <div class="title-section mb-5">
          <h2 class="text-uppercase"><span class="d-block">Category</span></h2>
        </div>
        
<!-- <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-border-width" viewBox="0 0 16 16">
  <path d="M0 3.5A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-2zm0 5A.5.5 0 0 1 .5 8h15a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1zm0 4a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
</svg></button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
  </div>
</div> -->

        <div class="row align-items-stretch">
        <?php 
                    foreach ($category as $key => $cate){      
                    ?>    
                    
          <div class="col-lg-2">
            
            <a class="product_category" href="<?php echo BASE_URL ?>/sanpham/danhmuc/<?php echo $cate['category_product_id'] ?> "><?php echo $cate['category_product_title'] ?></a>
            <img     class="mb-1 mx-3" width="180" height="200" src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $cate['category_product_images'] ?>" alt="Product" class="img-fluid">
         
          </div>
         
          <?php
                    }
                    ?>
        </div>
      </div>
      <div class="container">
     
      <div class="row">
         
          <div class="title-section mb-5 col-12">
            <h2 class="text-uppercase">Popular Products</h2>
          </div>
        </div>
        <div class="row clearfix">
        <?php 
                     foreach ($list_product as $key =>$product){
     
               ?>
            <div class="col-lg-3 col-md-4 col-sm-12">
          
                        <input type="hidden" name="quanlity_product" value="1"> 
                <div class="card product_item">
               
                    <div class="body">
                   <div class="cp_img">
                        <?php if($product['status']==0){
                              echo '<span class="btn-info  btn-sm">Stopped Selling</span>';
                            ?>
                            <img  class="mb-1 mx-3" width="180" height="200"  src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $product['product_image'] ?>" alt="Product" class="img-fluid">
                        <?php 
                               }else { ?>
                            <img  class="mb-1 mx-3" width="180" height="200"  src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $product['product_image'] ?>" alt="Product" class="img-fluid">
                            <div class="hover">
                            <a href="javascript:void(0);"  class="  btn-primary waves-effect ">
                            <a  class=" btn-primary btn-sm waves-effect" href="<?php echo BASE_URL ?>/sanpham/chitietsanpham/<?php echo $product['product_id'] ?>" ><span  class="icon-shopping-cart"></span> Details</a>
                            </a>
                             </div>
                           
                           <?php } ?> 
                        </div>
                        <div class="product_details">
                            <h4><?php echo $product ['product_title']?></h4>
                            <ul class="product_price list-unstyled">
                                <!-- <li class="old_price">$16.00</li> -->
                                <li style="font-size: 19px; " class="new_price text-danger"><?php echo number_format($product ['product_price'],0,',','.'). ' VNĐ' ?></li>
                            </ul>
                            <div>
                            </div>
                        </div>
                          
                    </div>
                    
                </div>
            <!-- </form> -->
            </div>
                    <?php
                     }
                     ?>
        </div>
      
      </div>
   


     

    <!-- <div class="site-blocks-cover inner-page py-5" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto order-md-2 align-self-start">
            <div class="site-block-cover-content">
            <h2 class="sub-title">#New Summer Collection 2022</h2>
            <h1>New Shoes</h1>
            <p><a href="#" class="btn btn-black rounded-0">Buy Now</a></p>
            </div>
          </div>
          <div class="col-md-6 order-1 align-self-end">
            <img src="images/model_6.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div> -->

