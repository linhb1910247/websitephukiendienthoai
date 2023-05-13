<?php
    require 'mail.php';
    require './vendor/autoload.php';
  
  use Gregwar\Captcha\CaptchaBuilder;
  use Gregwar\Captcha\PhraseBuilder;
  use Carbon\Carbon;
  use Carbon\CarbonInterval;
    class order extends Dcontroller{
        function __construct(){
            // Session::chesksession();
             parent::__construct();
        }
        public function index(){
            $this->order();
        }
        public function order(){ 
            Session::chesksession_customer();
            $table_order='tbl_order';
            $ordermodel = $this->load->model('ordermodel');
            if(isset($_POST['datedown'])){
                $cond="ORDER BY order_date DESC";
            }else if (isset($_POST['dateup'])){
                $cond= "ORDER BY order_date ASC";
            }else if(isset($_POST['ordercodedown'])){
                $cond ="ORDER BY order_code DESC";
            }else if(isset($_POST['ordercodeup'])){
                $cond="ORDER BY order_code ASC";
            }else{
                $cond="ORDER By order_code DESC";
            }
            $data['order']= $ordermodel ->list_order($table_order,$cond);
            $this->load->view("admin/header");
            $table_customers ='tbl_customers';
            $customermodel = $this->load->model('customermodel');
            $id=Session::get('customers_id');
            $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
            $this->load->view("admin/menu",$data_info);
           $this->load->view("admin/order/order",$data);
           $this->load->view("admin/footer");
        }
        // public function add_order(){ 
        //     Session::chesksession_customer();
        //     $this->load->view("admin/header");
        //     $this->load->view("admin/menu");
        //    $this->load->view("admin/order/add_order");
        //    $this->load->view("admin/footer");
        // }
        public function order_details($order_code){
            Session::chesksession_customer();
            $table_order_details='tbl_order_details';
            $table_product='tbl_product';
           
            $cond = "$table_product.product_id = $table_order_details.order_product_id AND order_code='$order_code'";
            $ordermodel = $this->load->model('ordermodel');
            $data['order_details']= $ordermodel ->list_order_details($table_product,$table_order_details,$cond);
            $this->load->view("admin/header");
            $table_customers ='tbl_customers';
            $customermodel = $this->load->model('customermodel');
            $id=Session::get('customers_id');
            $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
            $this->load->view("admin/menu",$data_info);
           $this->load->view("admin/order/order_details",$data);
           $this->load->view("admin/footer");
        }
        public function order_confirm($order_code){
            Session::chesksession_customer();
            $table_statistic = "tbl_statistic";
            $table_order_details='tbl_order_details';
            $table_product='tbl_product';
            $product_details='product_details';

            $ordermodel = $this->load->model('ordermodel');
            $orderstatistic = $this->load->model('thongkemodel');
            $table_order='tbl_order';
            $cond_order_details=" $table_product.product_id = $table_order_details.order_product_id 
            AND $table_order.order_code = $table_order_details.order_code 
            AND $product_details.id_product = $table_product.product_id
            AND  $table_order_details.order_code ='$order_code' LIMIT 1"  ;
       
            $cond= "$table_order.order_code ='$order_code'";
            $data = array(
                'order_status' => 4
            );
            $result= $ordermodel ->order_confirm($table_order,$data,$cond);
            $data['order_details']= $ordermodel ->ordercetailscustomerbyid($table_order,$product_details,$table_product,$table_order_details,$cond_order_details);

           $quanlity=0;
           $sales=0;
           foreach($data['order_details'] as $key =>$val){
                $quanlity+= $val['order_product_quanlity'];
                $sales +=$val['order_product_quanlity']*$val['product_price'];
                $email=$val['email'];
                $size=$val['size'];
                $name=$val['name'];
                $date=$val['order_date'];
                $order_code=$val['order_code'];
            $data_statistics =array(
                'order_date' => $val['order_date'],
                'quanlity' =>$quanlity,
                'sales' =>$sales
              );
            }
           $title="Order processed sucessfully";
            if($result==1){
                $orderstatistic->insert_statistics($table_statistic,$data_statistics);
                $message['msg']="Order processed successfully!!";
                header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
              }else{
                $message['msg']="Order processing failed!!";
                header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
            }
               $mail= new mailer();
        $mailorder = $email;
        $content ='<!DOCTYPE html>
        <html>
        <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <style type="text/css">
        
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; }
        
        img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }
        
        
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        
        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }
            .mobile-center {
                text-align: center !important;
            }
        }
        div[style*="margin: 16px 0;"] { margin: 0 !important; }
        </style>
        <body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
        
        
        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
      
        </div>
        
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
           
                <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 35px;" bgcolor="#F44336">
                       
                        <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                <tr>
                                    <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;" class="mobile-center">
                                        <h1 style="font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;">HLShop</h1>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                <tr>
                                    <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                        <table cellspacing="0" cellpadding="0" border="0" align="right">
                                            <tr>
                                                <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400;">
                                                    <p style="font-size: 18px; font-weight: 400; margin: 0; color: #ffffff;"><a href="#" target="_blank" style="color: #ffffff; text-decoration: none;">Shop &nbsp;</a></p>
                                                </td>
                                                <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px;">
                                                    <a href="#" target="_blank" style="color: #ffffff; text-decoration: none;"><img src="https://img.icons8.com/color/48/000000/small-business.png" width="27" height="23" style="display: block; border: 0px;"/></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                      
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                            <tr>
                                <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                    <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                                    <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                        Thank You For Your Order!
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                    <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                    Hello '.$name.'Your order has been shipped. please check
                                     </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-top: 20px;">
                               
                           
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                Order Confirmation #
                                            </td>
                                            <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                           '.$order_code.'
                                            </td>
                                           
                                        </tr>
                                        ';
                                        $total=0;
                                        foreach($data['order_details']  as $key => $details){
                                       
                                        $total +=$details['order_product_quanlity']*$details['product_price'];
                                         $content .='
                                        
                                        <tr>
                                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                            Product title
                                            </td>
                                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                            '.$details['product_title'].'
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                            Product quantity
                                            </td>
                                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                            '.$details['order_product_quanlity'].'
                                            </td>
                                        </tr>
                                        <tr>
                                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                        Size product
                                        </td>
                                        <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                        '.$details['size_product'].'
                                        </td>
                                    </tr>
                                        <tr>
                                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                               Product total
                                            </td>
                                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                            '.$details['order_product_quanlity']*$details['product_price'].'$
                                            </td>
                                        </tr>';
                                    }
                                        $content .='
                                    </table>
                                   

                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-top: 20px;">
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                                TOTAL
                                            </td>
                                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                            '.$total.'$
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        
                        </td>
                    </tr>
                     <tr>
                        <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                            <tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
        
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                            <tr>
                                                <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                    <p style="font-weight: 800;">Delivery Address</p>
                                                    <p>'.$details['address'].'<br>Tel: '.$details['phone'].'</p>
        
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                            <tr>
                                                <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                    <p style="font-weight: 800;">Estimated Delivery Date</p>
                                                    <p>'.$date.'</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style=" padding: 35px; background-color: #ff7361;" bgcolor="#1b9ba3">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                           
                            <tr>
                                <td align="center" style="padding: 25px 0 15px 0;">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="border-radius: 5px;" bgcolor="#66b3b7">
                                              <a href="http://localhost:8080/project_ct275/index/homepage" target="_blank" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #F44336; padding: 15px 30px; border: 1px solid #F44336; display: block;">Shop Again</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                            <tr>
                                <td align="center">
                                    <img src="http://localhost:8080/project_ct275/public/images/logo2.ico" width="37" height="37" style="display: block; border: 0px;"/>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
                                    <p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;">
                                        675 Parko Avenue<br>
                                        LA, CA 02232
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                                    
                                </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
        </table>
            
        </body>
        </html>' ;
          $mail->mailorder($mailorder,$content,$title);
       

        }
        public function order_delete($order_code){
            Session::chesksession_customer();
            $table_order='tbl_order';
            $cond= "$table_order.order_code ='$order_code'";
          
              $ordermodel = $this->load->model('ordermodel');
              $result= $ordermodel->deleteorder($table_order,$cond);
              if($result==1){
                $message['msg']="Delete order successfully!!";
                header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
              }else{
                $message['msg']="Delete failed orders!!";
                header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
            }
        }
   
        public function customer_order($id){
            Session::init();
         $table ='tb_category_product';
         $ordermodel = $this->load->model('ordermodel');

         if(isset($_GET['vnp_ResponseCode'])){
            $table_payment ='payment';
            $table_order='tbl_order';
            $vnp_ResponseCode= $_GET['vnp_ResponseCode'];
            $now=Carbon::now('asia/ho_chi_minh')->toDateString();
       $vnp_Amount=$_GET['vnp_Amount'];
       $vnp_BankCode=$_GET['vnp_BankCode'];
       $vnp_BankTranNo=$_GET['vnp_BankTranNo'];
       $vnp_CardType=$_GET['vnp_CardType'];
       $vnp_OrderInfo=$_GET['vnp_OrderInfo'];
       $vnp_PayDate=$_GET['vnp_PayDate'];
       $order_code= $_GET['vnp_TxnRef'];
       $paymentmodel = $this->load->model('paymentmodel');
     
       $data_payment = array(
           'order_code' => $order_code,
           'total_order'=> $vnp_Amount,
           'bank_code' => $vnp_BankCode,
           'vnp_BankTranNo' => $vnp_BankTranNo,
           'vnp_CardType' => $vnp_CardType,
           'vnp_OrderInfo' => $vnp_OrderInfo,
           'vnp_PayDate' => $now
       );
       $cond1= "$table_order.order_code ='$order_code'";
       if($vnp_ResponseCode==00){
        $table_order='tbl_order';
        $data = array(
            'transaction' => 1
        );
        $result= $ordermodel ->order_confirm($table_order,$data,$cond1);       }      


       
         $paymentmodel-> insert_payment($table_payment,$data_payment);
         }
         $categorymodel = $this->load->model('categorymodel');
         $data['category'] =$categorymodel->category_home($table);
             $table_order='tbl_order';
             $cond=" $table_order.customers_id ='$id'"  ;
             $data['order_details']= $ordermodel ->ordercustomerbyid($table_order,$cond);
             $this->load->view("HLshop/header",$data); 
            $this->load->view("HLshop/customer_order",$data);
            $this->load->view("HLshop/footer");
         }
        //  public function thanhtoanthanhcong($id){
        //     Session::init();
        //  $table ='tb_category_product';
        //  $categorymodel = $this->load->model('categorymodel');
        //  $data['category'] =$categorymodel->category_home($table);
        //      $table_order='tbl_order';
        //      $ordermodel = $this->load->model('ordermodel');
        //      $cond=" $table_order.customers_id ='$id'"  ;
        //      $data['order_details']= $ordermodel ->ordercustomerbyid($table_order,$cond);
        //      $this->load->view("HLshop/header",$data); 
        //     $this->load->view("HLshop/customer_order",$data);
        //     $this->load->view("HLshop/footer");
        //  }
         public function customer_orderdetails($order_code){
            Session::chesksession_customer();
             $table ='tb_category_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
           $table_order_details='tbl_order_details';
           $table_product='tbl_product';
           $table_order='tbl_order';
           $product_details='product_details';
           $ordermodel = $this->load->model('ordermodel');
           $cond=" $table_product.product_id = $table_order_details.order_product_id 
                  AND $table_order.order_code = $table_order_details.order_code 
                  AND $product_details.id_product = $table_product.product_id
                  AND $table_order_details.order_code ='$order_code' LIMIT 1"  ;
           $data['order_details']= $ordermodel ->ordercetailscustomerbyid($table_order,$product_details,$table_product,$table_order_details,$cond);
           $this->load->view("HLshop/header",$data);   
          $this->load->view("HLshop/customer_orderdetails",$data);
          $this->load->view("HLshop/footer");
       }
       public function canncel_order(){
        $ordermodel = $this->load->model('ordermodel');
        $table_order='tbl_order';
        $id=$_POST['customers_id'];
        $order_code=$_POST['code'];
        $cancel=$_POST['cancel'];
        $cond= "$table_order.order_code ='$order_code'";
        $data = array(
            'cancel' =>$cancel,
        );
      
        $result= $ordermodel ->order_confirm($table_order,$data,$cond);
        if($result==1){
          
            header('Location:'.BASE_URL."/order/customer_order/".$id);
          }
       }
       public function cancelorder($order_code){
        $ordermodel = $this->load->model('ordermodel');
        $table_order='tbl_order';
        $cond= "$table_order.order_code ='$order_code'";
        $table_order_details='tbl_order_details';
        $product_details="product_details";
        $table_product='tbl_product';
        $categorymodel =$this->load->model('categorymodel');
        $cond_order_details=" $table_product.product_id = $table_order_details.order_product_id 
        AND $table_order.order_code = $table_order_details.order_code 
        AND $product_details.id_product = $table_product.product_id
        AND $table_order_details.order_code ='$order_code' LIMIT 1"  ;
        $data = array(
            'order_status' => 2
        );
        $result= $ordermodel ->order_confirm($table_order,$data,$cond);
        $data['order_details']= $ordermodel ->ordercetailscustomerbyid($table_order,$product_details,$table_product,$table_order_details,$cond_order_details);
        if($result==1){
            foreach($data['order_details'] as $key =>$details){
                $quanlity= $details['qty'] + $details['order_product_quanlity'];
                $id_product=$details['order_product_id'];
                $email=$details['email'];
                $size=$details['size'];
                $name=$details['name'];
                $date=$details['order_date'];
                $order_code=$details['order_code'];
                $cond_product = "$product_details.id_product ='$id_product' AND $product_details.size='$size'";
                
                $data1 =array(
                    'qty' =>$quanlity,    
                  );
                  $cond= "$table_order.order_code ='$order_code'";
                  $result= $ordermodel->deleteorder($table_order,$cond);
                  $categorymodel->updatetproduct($product_details,$data1,$cond_product);
                
            }
            $message['msg']="Update successful!!";
            header('Location:'.BASE_URL."/product/inventory_management?msg=".urlencode(serialize($message)));
          }else{
            $message['msg']="Update menu success failed!!";
            header('Location:'.BASE_URL."/product/inventory_management?msg=".urlencode(serialize($message)));
        }
    }


       public function cancelorder_confirm($order_code){
        $ordermodel = $this->load->model('ordermodel');
        $table_order='tbl_order';
        $cond= "$table_order.order_code ='$order_code'";
        $table_order_details='tbl_order_details';
        $product_details="product_details";
        $table_product='tbl_product';
        $categorymodel =$this->load->model('categorymodel');
        $cond_order_details=" $table_product.product_id = $table_order_details.order_product_id 
        AND $table_order.order_code = $table_order_details.order_code 
        AND $product_details.id_product = $table_product.product_id
        AND $table_order_details.order_code ='$order_code' LIMIT 1"  ;
        $data = array(
            'order_status' => 2,
            'cancel' => 2
        );
        $result= $ordermodel ->order_confirm($table_order,$data,$cond);
        $data['order_details']= $ordermodel ->ordercetailscustomerbyid($table_order,$product_details,$table_product,$table_order_details,$cond_order_details);
        if($result==1){
            foreach($data['order_details'] as $key =>$details){
                $quanlity= $details['qty'] + $details['order_product_quanlity'];
                $id_product=$details['order_product_id'];
                $email=$details['email'];
                $size=$details['size'];
                $name=$details['name'];
                $date=$details['order_date'];
                $order_code=$details['order_code'];
                $cond_product = "$product_details.id_product ='$id_product' AND $product_details.size='$size'";
                
                $data1 =array(
                    'qty' =>$quanlity,    
                  );
                  
                  $categorymodel->updatetproduct($product_details,$data1,$cond_product);
                
            }
            $message['msg']="Cancel successfully!!";
            header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
          }else{
            $message['msg']="Cancel failed!!";
            header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
        }
        $title="Cancel Order";
        $mail= new mailer();
        $mailorder = $email;
        $content ='<!DOCTYPE html>
        <html>
        <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <style type="text/css">
        
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; }
        
        img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }
        
        
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        
        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }
            .mobile-center {
                text-align: center !important;
            }
        }
        div[style*="margin: 16px 0;"] { margin: 0 !important; }
        </style>
        <body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
        
        
        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
      
        </div>
        
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
           
                <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 35px;" bgcolor="#F44336">
                       
                        <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                <tr>
                                    <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;" class="mobile-center">
                                        <h1 style="font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;">HLShop</h1>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                <tr>
                                    <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                        <table cellspacing="0" cellpadding="0" border="0" align="right">
                                            <tr>
                                                <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400;">
                                                    <p style="font-size: 18px; font-weight: 400; margin: 0; color: #ffffff;"><a href="#" target="_blank" style="color: #ffffff; text-decoration: none;">Shop &nbsp;</a></p>
                                                </td>
                                                <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px;">
                                                    <a href="#" target="_blank" style="color: #ffffff; text-decoration: none;"><img src="https://img.icons8.com/color/48/000000/small-business.png" width="27" height="23" style="display: block; border: 0px;"/></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                      
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                            <tr>
                                <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                    <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                                    <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                        Thank You For Your Order!
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                    <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                    Hello '.$name.' Your order has been cancelled, money will return your account. please check
                                     </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-top: 20px;">
                               
                           
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                Order Confirmation #
                                            </td>
                                            <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                           '.$order_code.'
                                            </td>
                                           
                                        </tr>
                                        ';
                                        $total=0;
                                        foreach($data['order_details']  as $key => $details){
                                       
                                        $total +=$details['order_product_quanlity']*$details['product_price'];
                                         $content .='
                                        
                                        <tr>
                                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                            Product title
                                            </td>
                                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                            '.$details['product_title'].'
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                            Product quantity
                                            </td>
                                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                            '.$details['order_product_quanlity'].'
                                            </td>
                                        </tr>
                                        <tr>
                                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                        Size product
                                        </td>
                                        <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                        '.$details['size_product'].'
                                        </td>
                                    </tr>
                                        <tr>
                                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                               Product total
                                            </td>
                                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                            '.$details['order_product_quanlity']*$details['product_price'].'$
                                            </td>
                                        </tr>';
                                    }
                                        $content .='
                                    </table>
                                   

                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-top: 20px;">
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                                TOTAL
                                            </td>
                                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                            '.$total.'$
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        
                        </td>
                    </tr>
                     <tr>
                        <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                            <tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
        
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                            <tr>
                                                <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                    <p style="font-weight: 800;">Delivery Address</p>
                                                    <p>'.$details['address'].'<br>Tel: '.$details['phone'].'</p>

        
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                            <tr>
                                                <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                    <p style="font-weight: 800;">Estimated Delivery Date</p>
                                                    <p>'.$date.'</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style=" padding: 35px; background-color: #ff7361;" bgcolor="#1b9ba3">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                           
                            <tr>
                                <td align="center" style="padding: 25px 0 15px 0;">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="border-radius: 5px;" bgcolor="#66b3b7">
                                              <a href="http://localhost:8080/project_ct275/index/homepage" target="_blank" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #F44336; padding: 15px 30px; border: 1px solid #F44336; display: block;">Shop Again</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                            <tr>
                                <td align="center">
                                    <img src="http://localhost:8080/project_ct275/public/images/logo2.ico" width="37" height="37" style="display: block; border: 0px;"/>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
                                    <p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;">
                                        675 Parko Avenue<br>
                                        LA, CA 02232
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                                    
                                </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
        </table>
            
        </body>
        </html>' ;
          $mail->mailorder($mailorder,$content,$title);
       }
        
    }
?>