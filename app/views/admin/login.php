<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
    body {
    font-family: "Lato", sans-serif;
}



.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-image: url("<?php echo BASE_URL?>/public/images/model_3.png");
        overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: blue !important;
    color: #FFF;
}

</style>
 
<div class="sidenav">
    <div class="mx-1">
    <img  width="150" height="150"  src="<?php echo BASE_URL?>/public/images/logo2.ico">
    
    </div>
         <div class="login-main-text">
            
            <h2>HLShop<br> Login Page</h2>
            <p>Login or register from here to access.</p>
         </div>
         
      </div>
      <div class="main">
      <?php
    if(!empty($_GET['msg'])){
        $msg= unserialize(urldecode($_GET['msg']));
       foreach($msg as $key => $value ){
        echo '  <div >
        <h2>Thông báo</h2>
        <div class="alert alert-success ">
          <strong>'.$value.'</strong> 
        </div> ';
      }
    }
    ?> 
         <div class="col-md-6 ">
     
            <div class="login-form">
          
               <form autocomplete="off" action="<?php echo BASE_URL?>/login/authentication_login" method="post">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" name="username" class="form-control" placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                  <?php   
                            
                        use Gregwar\Captcha\CaptchaBuilder;
                        use Gregwar\Captcha\PhraseBuilder;
                        $builder = new CaptchaBuilder();
                        $builder->build(); ?> 
                         <?php $_SESSION['phrase'] = $builder->getPhrase(); ?>
                      <label for="c_subject" class="text-black">Captcha  </label>
                      
                      <img class="btn-sm m-2" src="<?= $builder->inline() ?>" alt="Captcha">
                     <input type="text" class="form-control" id="c_subject" name="captcha">
                    
                  </div>
                  <button type="submit" name="login" value="login" class="btn btn-black">Login</button>
                  <button type="submit" class="btn btn-secondary">Register</button>
               </form>
            </div>
         </div>
      </div>
      </div>