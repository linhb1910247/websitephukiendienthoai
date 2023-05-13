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
    <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo BASE_URL?> /index/homepage">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Signup</strong></div>
        </div>
      </div>
    </div>
      <div class="container">
        <div class="row">
          
          <div class="col-md-8">

          <form autocomplete="off" action="<?php echo BASE_URL ?>/customer/customer_login" method="post">
              <div class="p-3 p-lg-5 border">
               
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Username <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email" name="username" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Password <span class="text-danger">*</span> </label>
                    <input type="password" class="form-control" id="c_subject" name="password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <?php   
                        use Gregwar\Captcha\CaptchaBuilder;
                        use Gregwar\Captcha\PhraseBuilder;
                        $builder = new CaptchaBuilder();
                        $builder->build(); ?> 
                         <?php $_SESSION['phrase'] = $builder->getPhrase(); ?>
                      <label for="c_subject" class="text-black">Captcha <span class="text-danger">*</span> </label>
                      
                      <img src="<?= $builder->inline() ?>" alt="Captcha">
                     <input type="text" class="form-control" id="c_subject" name="captcha">
                    
                  </div>
                </div>
                <a style="font-size: 15px;" href="<?php echo BASE_URL?>/customer/forgotpassword">Forgot Password?</a>
                <div class="form-group row">
              
                  <div class="col-lg-3">
                    <input type="submit" class="btn btn-info btn-lg btn-block" value="Signup">
                  </div>
                  <div class="col-lg-3">
             

                    <a href="<?php echo BASE_URL ?>/customer/customer_signup" class="btn btn-info btn-lg btn-block" value="Sigin">Sinup</a>
                  </div>
                </div>
              </div>

               
            </form>
          </div>
          <div class="col-md-4 ml-auto">
            <div class="p-4 border mb-3">
              <span class="d-block text-info h6 text-uppercase">Can Tho</span>
              <h5 class="mb-0">21, Hung Loi, Ninh Kieu, Can Tho</h5>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-info h6 text-uppercase">Ha Noi</span>
              <h5 class="mb-0">21, Hung Loi, Ninh Kieu, Ha Noi</h5>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-info h6 text-uppercase">Ho Chi Minh</span>
              <h5 class="mb-0">21, Hung Loi, Ninh Kieu, Ho Chi Minh</h5>
            </div>

          </div>
        </div>
      </div>

