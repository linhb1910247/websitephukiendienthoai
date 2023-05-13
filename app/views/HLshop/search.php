<div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
        
          <div class="col-md-12 mb-0"><a href="<?php echo BASE_URL ?>/index/homepage">Home</a> <span class="mx-2 mb-0">/</span> 

          <strong class="text-black">Search / 
            <?php     if(isset($_POST['tukhoa'])){
                $tukhoa=$_POST["tukhoa"];
                
            }else{
                $tukhoa='';
            } 
            echo $tukhoa;
            ?>
            </strong>
         </div>
        </div>
      </div>
    </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

        <div class="container">

        <div class="row clearfix">
        <?php 
                     foreach ($search_list as $key =>$product){
     
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