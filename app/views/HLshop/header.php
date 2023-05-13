<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HLshop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/css/aos.css">

    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/css/style.css">
  </head>
  <body>
  
  <div class="site-wrap">    

    <div class="site-navbar bg-white py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="<?php echo BASE_URL ?>/index/search?quanli=timkiem" method="POST">
            <input name="tukhoa" type="text" class="form-control" placeholder="Search keyword and hit enter...">
        
          </form>  
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <div >
              <a href="<?php echo BASE_URL ?>/index/homepage" ><img src="<?php echo BASE_URL ?>/public/images/logo2.ico" width="200" ></a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="<?php echo BASE_URL ?>/index/homepage">Home</a></li>
                <li class="dropdown "><a  class="dropdown-toggle" data-toggle="dropdown" >Product<span></span></a>
                <ul class="dropdown-menu" >
                    <a  href="<?php echo BASE_URL ?>/sanpham/tatca">All Product</a>
                <?php 
                    foreach ($category as $key => $cate){      
                    ?>
                    <li > 
                    <a  href="<?php echo BASE_URL ?>/sanpham/danhmuc/<?php echo $cate['category_product_id'] ?> "><?php echo $cate['category_product_title'] ?></a>
                      
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                </li>
               <li>
                
                <?php
             if(Session::get('customer')){
              $id=Session::get('customers_id');
             ?>
                
                <li><a href="<?php echo BASE_URL ?>/order/customer_order/<?php echo $id ?>">Order</a></li>
             <?php 
            }else{
              ?>
                 <li><?php echo '' ?></li>         
               <?php
            }
            ?>
                
                <li><a href="<?php echo BASE_URL ?>/contact/contact">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons btn" style="font-size: 26px;">
            <a href="<?php echo BASE_URL?>/index/search" value="timkiem" class="icons-btn m-2 d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="<?php echo BASE_URL ?>/cart/cart" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
            </a>
                <a  class="icons-btn  d-inline-block" href="<?php echo BASE_URL ?>/customer/customer_signup"><span class=" m-2 icon-sign-in"></span> </a>
                <?php
             if(!Session::get('customer')){
             ?>
                  <a href="<?php echo BASE_URL ?>/customer/customer_signin" class="icons-btn m-2  d-inline-block"><span class="icon-user"></span></a>
                  
             <?php 
            }else{
              ?>
                  <div class="icons btn btn-sm" style="width: 50px; height: 60px">
               <?php 
                   $name=  Session::get('customers_name');
              ?>
            <div class="dropdown">
                <button style="font-size: 12px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                      <?php echo $name ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                 
                  <li><a class="dropdown-item" href="<?php echo BASE_URL ?>/customer/profile">Profile</a></li>
                  <li><a class="dropdown-item" href="<?php echo BASE_URL ?>/customer/logout">Sign out</a></li>
                </ul>
              </div>
           
        </div>

            <?php
            }
            ?>
            
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>