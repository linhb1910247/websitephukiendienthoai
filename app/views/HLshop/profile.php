
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo BASE_URL?>/index/homepage">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>
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

   
    ?>  
    <div class="row">
   
      <div class="col-lg-4">
              <?php 
                    foreach($customer as $key => $info){
              ?>
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $info['avatar']?>" alt="avatar" 
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $info['customers_name']?></h5>
            <a href="<?php echo BASE_URL?>/customer/edit_profile" > <h5 class="my-3">Edit profile <span class="icon-edit  "></span></h5></a>
          </div>
        </div>    
        <?php } ?> 
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
              <?php 
                foreach($customer as $key => $info){
              ?>
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">Name:</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0"><?php echo $info['customers_name']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">Email:</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0"><?php echo $info['email']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">Password:</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0">*********</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">Phone:</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0"><?php echo $info['phone']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">Address:</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0"><?php echo $info['address']?></p>
              </div>
            </div>
          </div>
          <?php } ?> 
        </div>
      </div>     
    </div>   
  </div>
</section>
