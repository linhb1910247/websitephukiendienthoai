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
          <div class="col-md-12 mb-0"><a href="<?php echo BASE_URL?> /index/homepage">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Forgot Password</strong></div>
        </div>
      </div>
    </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
          <form autocomplete="off" action="<?php echo BASE_URL ?>/customer/sendemail" method="post">
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <labe  style="font-size:22px" for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email" name="emailkp" placeholder="email khoi phuc">
                  </div>
                </div>
                    <button type="submit" class="btn btn-info btn-lg" value="Sigin">SendEmail</a>
                  </div>
                </div>
              </div>     
            </form>
          </div>
        
        </div>
      </div>

