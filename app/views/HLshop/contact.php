
    <div class="site-blocks-cover inner-page" style="background-image: url('<?php echo BASE_URL ?>/public/images/about_1.png'); background-repeat: no-repeat; background-size: cover; background-position: center" data-aos="fade">
      <div class="container">
        <div class="row">
        
        </div>
      </div>
    </div>

    <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong></div>
        </div>
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

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Contact Information</h2>
          </div>
          <div class="col-md-8">

            <form action="<?php echo BASE_URL?>/contact/insert_contact" method="post">
            <?php 
                foreach($customer as $key => $info){
              ?>
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="name" value="<?php echo $info['customers_name']?> ">
                  </div>
                </div>
                <input type="hidden" name="customers_id"class="form-control" id="c_fname" name="name" value="<?php echo $info['customers_id']?>">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email" name="email" value="<?php echo $info['email']?>" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Phone <span class="text-danger">*</span></label>
                    <input type="phone" class="form-control" id="c_email" name="phone" value="<?php echo $info['phone']?>" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Subject </label>
                    <input  type="text" class="form-control" id="c_subject" name="subject" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">Message </label>
                    <textarea require name="message" id="c_message" cols="30" rows="7" class="form-control" required></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-3">
                  <input type="submit" name="contact" class="btn btn-info btn-lg btn-block" value="Submit">
                  </div>
                </div>
              </div>
              <?php } ?>
            </form>
          </div>
          <div class="col-md-4 ml-auto">
            <div class="p-4 border mb-3">
              <span class="d-block text-info h6 text-uppercase">Can Tho</span>
              <h5 class="mb-0">21, Nguyen Van Linh, Can Tho</h5>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-info h6 text-uppercase">Ha Noi</span>
              <h5 class="mb-0">58 To Huu - Thanh Xuan - Ha Noi</h5>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-info h6 text-uppercase">Ho Chi Minh</span>
              <h5 class="mb-0">21, Hung Loi, Ninh Kieu, Ho Chi Minh</h5>
            </div>

          </div>
        </div>
      </div>

