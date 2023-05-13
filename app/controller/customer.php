<?php
require 'mail.php';
require './vendor/autoload.php';

  require './vendor/autoload.php';
  use Gregwar\Captcha\CaptchaBuilder;
  use Gregwar\Captcha\PhraseBuilder;
  
  $builder = new CaptchaBuilder();
  $builder->build();
    class customer extends Dcontroller{
     
       public function __construct(){
        $message = array();
        $data= array();
       
             parent::__construct();
        }
        public function index(){
            $this->customer();
         }
         public function customer(){
             
            //  $this->load->view('HLshop/header');
            //  Session::init();
            //  if(Session::get("login")==true){
            //      header("Location:".BASE_URL."/customer/dashboard");
            //  }
            //  $this->load->view('HLshop/login');
            //  $this->load->view('HLshop/footer');
         }
         // quen mat khau 
        public function forgotpassword(){
          Session::init();
          $table ='tb_category_product';
          $categorymodel = $this->load->model('categorymodel');
          $data['category'] =$categorymodel->category_home($table);
           $table_customers ='tbl_customers';
             $customermodel = $this->load->model('customermodel');
             $id=Session::get('customers_id');
             $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
           $this->load->view('HLshop/header',$data);
           $this->load->view('HLshop/forgotpassword',$data_info);
            $this->load->view('HLshop/footer');
        }
      public function sendemail(){
        $email= $_POST['emailkp'];
        $mail= new mailer();
        $mailorder = $email;
        $password=rand(0,9999);
        $content ='<!DOCTYPE html>
        <html>
        <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <h1>Xin chào '.$email.'<h1>
            <p>Password mới của bạn là: '.$password.' </p>
        </body>
        </html>' ;
        $data =array(
          'password' =>md5($password),
        );
        $title="Update password";
        $table_customers ='tbl_customers';
        $customermodel = $this->load->model('customermodel');
        $cond = "email ='$email'";
         $customermodel->upload_pro($table_customers,$data,$cond);
        $result= $mail->mailorder($mailorder,$content,$title);
      

          if($result==1){
            $message['msg']="Gửi mail thành công!!";
            header('Location:'.BASE_URL."/customer/forgotpassword?msg=".urlencode(serialize($message)));
          }else{
            $message['msg']="Gửi mail thành công!!";
            header('Location:'.BASE_URL."/customer/forgotpassword?msg=".urlencode(serialize($message)));
        }

       }
        
    
  
      public function profile(){
         Session::init();
         $table ='tb_category_product';
         $categorymodel = $this->load->model('categorymodel');
         $data['category'] =$categorymodel->category_home($table);
          $table_customers ='tbl_customers';
            $customermodel = $this->load->model('customermodel');
            $id=Session::get('customers_id');
            $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
          $this->load->view('HLshop/header',$data);
          $this->load->view('HLshop/profile',$data_info);
           $this->load->view('HLshop/footer');
      }
        public function customer_list(){
          Session::chesksession_customer();
           $table_customers ='tbl_customers';
             $customermodel = $this->load->model('customermodel');
            $data_user['customer'] =  $customermodel->list_customers($table_customers);
            $id=Session::get('customers_id');
            $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
           $this->load->view('admin/header',);
           $this->load->view('admin/menu',$data_info);
           $this->load->view('admin/customer/customer_list',$data_user);
            $this->load->view('admin/footer');
        }
        public function delete_user($id){
          Session::init();
          $cond = "customers_id ='$id'";
          $table_customers ='tbl_customers';
          $customermodel = $this->load->model('customermodel');
          $result =  $customermodel->customer_delete($table_customers,$cond);
          if($result==1){
            $message['msg']="Delete account successfully!!";
            header('Location:'.BASE_URL."/customer/customer_list?msg=".urlencode(serialize($message)));
          }else{
            $message['msg']="Xóa tài khoản thất bại!!";
            header('Location:'.BASE_URL."/customer/customer_list?msg=".urlencode(serialize($message)));
        }
        }
        public function upload_role($id){
          Session::init();
          $table_customers ='tbl_customers';
          $customermodel = $this->load->model('customermodel');
          $cond = "customers_id ='$id'";
          // $level=$_POST['level'];
          if($_POST['level'] == 'User'){
              $level=0;
          } else if($_POST['level'] == 'Admin'){
            $level=1;
          }else if($_POST['level'] =='Host'){
            $level=2;
          }else if($_POST['level'] =='Lock'){
            $level=-1;
          }
           $data =array(
             'level'=>$level
           );
            $result =  $customermodel->upload_role($table_customers,$data,$cond);
            if($result==1){
              $message['msg']="Update successfully!!";
              header('Location:'.BASE_URL."/customer/customer_list?msg=".urlencode(serialize($message)));
            }else{
              $message['msg']="Update failed!!";
              header('Location:'.BASE_URL."/customer/customer_list?msg=".urlencode(serialize($message)));
          }
         }
        public function edit_profile(){
         Session::init();
         $table ='tb_category_product';
         
         $categorymodel = $this->load->model('categorymodel');
         $data['category'] =$categorymodel->category_home($table);
         $table_customers ='tbl_customers';
         $customermodel = $this->load->model('customermodel');
         $id=Session::get('customers_id');
         $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
          $this->load->view('HLshop/header',$data);
          $this->load->view('HLshop/edit_profile',$data_info);
           $this->load->view('HLshop/footer');
       }
       public function upload_profile(){
        Session::init();
        $table_customers ='tbl_customers';
        $customermodel = $this->load->model('customermodel');
        $id=Session::get('customers_id');
        $cond = "customers_id ='$id'";
        $name=$_POST['name'];
          $email=$_POST['email'];
          $password=$_POST['password'];
          $phone=$_POST['phone'];
          $address=$_POST['address'];
        
         $avatar=$_POST['avatar'];
         if($avatar){
          $data =array(
            'customers_name' =>$name,
            'email' =>$email,
            'password' =>$password,
            'phone' =>$phone,
            'address' =>$address,
            'avatar'=>$avatar,
          
            
          );
         
         }else{
          $data =array(
            'customers_name' =>$name,
            'email' =>$email,
            'password' =>md5($password),
            'phone' =>$phone,
            
            'address' =>$address,
            
            
          );
         } 
       
        $result =  $customermodel->upload_pro($table_customers,$data,$cond);
         
          if($result==1){
            $message['msg']="Successfully updated!!";
            header('Location:'.BASE_URL."/customer/profile?msg=".urlencode(serialize($message)));
          }else{
            $message['msg']="Update failed!!";
            header('Location:'.BASE_URL."/customer/profile?msg=".urlencode(serialize($message)));
        }
       }
         public function   customer_signin(){
            Session::init();
            $table ='tb_category_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
             $table_customers ='tbl_customers';
             $this->load->view('HLshop/header',$data);
             $this->load->view('HLshop/customer_signin');
              $this->load->view('HLshop/footer');
          }
          public function   customer_signup(){
            Session::init();
            $table_customers ='tbl_customers';
             $customermodel = $this->load->model('customermodel');
            $data_user['customer'] =  $customermodel->list_customers($table_customers);
             $table ='tb_category_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
            $table_customers ='tbl_customers';
            $this->load->view('HLshop/header',$data);
            $this->load->view('HLshop/customer_signup',$data_user);
          $this->load->view('HLshop/footer');
         }
         //ham dang nhap
          public function customer_login(){
            Session::init();
           
            $table ='tb_category_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
            $table_customers ='tbl_customers';
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $captcha = $_POST['captcha'];
           $customermodel = $this->load->model('customermodel');
           $count =$customermodel->login($table_customers,$username,$password);
        
           

           if($count==1 && isset($_SESSION['phrase']) &&
           PhraseBuilder::comparePhrases($_SESSION['phrase'],  $captcha)  ){
            $result= $customermodel->getlogin($table_customers,$username,$password);
           
            Session::set('customer',true);
            Session::set('customers_name',$result[0]['customers_name']);
            Session::set('customers_id',$result[0]['customers_id']);
            Session::set('level',$result[0]['level']);
            Session::set('avatar',$result[0]['avatar']);
            $name=  Session::get('customers_name');
            $message['msg']="Logged in successfully";
            $level=Session::get('level');
            if($level==1){
              $message['msg']="Hello admin $name  ";
              header('Location:'.BASE_URL."/login/dashboard?msg=".urlencode(serialize($message)));
              
              $_SESSION['admin']='admin';
            }else if( $level==0){
              $message['msg']="Hello $name";
              header("Location:".BASE_URL."/index/homepage?msg=".urlencode(serialize($message)));     
              $_SESSION['user']='user';
           }else if($level==-1){
            $message['msg']="$name account has been locked";
            header('Location:'.BASE_URL."/customer/customer_signin?msg=".urlencode(serialize($message)));
             $_SESSION['lock']='lock';
          }else if($level==2){
            $message['msg']="Hello $name";
            header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
             $_SESSION['host']='host';
          }
           
         }else {    
          $message['msg']="User, Captcha hoặc Password incorrect!!";
           header('Location:'.BASE_URL."/customer/customer_signin?msg=".urlencode(serialize($message)));
        }
        }
         //hàm đăng kí
         public function insert_signup(){
            $table_customers = "tbl_customers";
            $customermodel =$this->load->model('customermodel');
            $data_user['customer'] =  $customermodel->list_customers($table_customers);
                $name=$_POST['name'];
                $email=$_POST['email'];
                $password=$_POST['password'];
                $phone=$_POST['phone'];
                $address=$_POST['address'];
              $check=0;
               $avatar=$_POST['avatar'];
               $data =array(
                 'customers_name' =>$name,
                 'email' =>$email,
                 'password' =>md5($password),
                 'phone' =>$phone,
                 'address' =>$address,
                 'avatar'=>$avatar
               );
               foreach($data_user['customer'] as $key => $value){
                if($value['email'] == $email){
                  $message['msg']="Account already exists!!";
                  $check=1;
                header('Location:'.BASE_URL."/customer/customer_signup?msg=".urlencode(serialize($message)));
                }
              }
                if($check != 1){
                  $result = $customermodel->insert_customer($table_customers,$data);
                  if($result){
                    $message['msg']="successful registration!!";
                    header('Location:'.BASE_URL."/customer/customer_signin?msg=".urlencode(serialize($message)));
                  }else{
                    $message['msg']="Failed registration!!";
                    header('Location:'.BASE_URL."/customer/customer_signin?msg=".urlencode(serialize($message)));
                  }
                }
              
              
              
              
         }
         // ham đăng xuất
         public function logout(){
            Session::init();
            Session::destroy();
            $message['msg']="Logout successfully!!";
            header('Location:'.BASE_URL."/customer/customer_signin?msg=".urlencode(serialize($message)));
           
         }
        
     
    }
?>