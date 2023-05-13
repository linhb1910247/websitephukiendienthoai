<?php
 require 'mail.php';
    class checkout extends Dcontroller{
        function __construct(){
           
             parent::__construct();
        }
        public function index(){
            $this->checkout();
        }
   
  
    public function checkout() {
        Session::init();
        $table_order = 'tbl_order';
        $table_order_details = 'tbl_order_details';
        $ordermodel =$this->load->model('ordermodel');
        $table_product = "tbl_product";
        $tbl_product_detail="product_details";
        $categorymodel =$this->load->model('categorymodel');
        $name =$_POST['name'];
        $customers_id=$_POST['customers_id'];
        $email =$_POST['email'];
        $phone =$_POST['phone'];
        $address =$_POST['address'];
        $note =$_POST['note'];
        $method_payment=$_POST['method_payment'];
        $order_code= rand(0,9999);
        //format theo ngay gio tphcm
        date_default_timezone_set('asia/ho_chi_minh');
        $date =date("Y-m-d");
        if(Session::get("addtocart")==true){
        $data_order = array(
            'order_code' => $order_code,
            'order_date' => $date,
            'order_status' => 0,
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address,
            'order_note'=>$note,
            'customers_id' => $customers_id,
            'payment_methods' =>    $method_payment
          );
          $result_order = $ordermodel->insert_order($table_order,$data_order);
      }
        $total=0;
          if(Session::get("addtocart")==true) {
          foreach(Session::get("addtocart") as $key =>$value){
            $id=$value['id_product'];
            $size=$value['size_product'];
            $cond = "product_id ='$id'";
         
            $cond_updateqty = "id_product ='$id' AND size= '$size' ";
            $productbyid= $categorymodel->productbyid($table_product,$cond);
            $productdetailbyid= $categorymodel->product_details_by_id($tbl_product_detail,$cond_updateqty);
            $data_details = array(
              'order_code' => $order_code,
              'order_product_id' => $value['id_product'],
              'product_title'=>$value['title_product'],
              'order_product_quanlity' => $value['quanlity_product'],
              'size_product' => $value['size_product'],
               );
            foreach($productbyid as $key =>$product){
                  $result_order_details= $ordermodel->insert_details($table_order_details,$data_details);
                  foreach($productdetailbyid as $key =>$product){
                  $quanlity= $product['qty'] -  $value['quanlity_product'];
                  }
                  $data_updateqty =array(
                                    'qty' =>$quanlity, 
                                  );
               $result = $categorymodel->update_product_details($tbl_product_detail,$data_updateqty,$cond_updateqty);

                }
              //capnhat soluong
            
            
          }
          unset($_SESSION['addtocart']);
          if($result==1){
  
            $mess['msg']="You ordered succeed!!";
            header('Location:'.BASE_URL."/cart/dathang?msg=".urlencode(serialize($mess)));
          }else{
            $mess['msg']="You ordered failed!!";
            header('Location:'.BASE_URL."/cart/dathang?msg=".urlencode(serialize($mess)));         
            }
        }
        
       
        $cond_order=" $table_product.product_id = $table_order_details.order_product_id 
               AND $table_order.order_code = $table_order_details.order_code
               AND $tbl_product_detail.id_product = $table_product.product_id
                AND $table_order_details.order_code ='$order_code' LIMIT 1"  ;
        $data['order_details']= $ordermodel ->ordercetailscustomerbyid($table_order,$tbl_product_detail,$table_product,$table_order_details,$cond_order);
        
      
       
        $mail= new mailer();
        $mailorder=$email;
        // $ordercode=$value['order_code'];
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
                                    Hello '.$name.' You have placed an order with the following order. please check
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
                                        foreach($data['order_details']  as $key => $value){
                                       
                                        $total +=$value['order_product_quanlity']*$value['product_price'];
                                         $content .='
                                        
                                        <tr>
                                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                            Product title
                                            </td>
                                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                            '.$value['product_title'].'
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                            Product quantity
                                            </td>
                                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                            '.$value['order_product_quanlity'].'
                                            </td>
                                        </tr>
                                        <tr>
                                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                        Size product
                                        </td>
                                        <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                        '.$value['size_product'].'
                                        </td>
                                    </tr>
                                        <tr>
                                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                               Product total
                                            </td>
                                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                            '.$value['order_product_quanlity']*$value['product_price'].'$
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
                                                    <p>3/2, Hưng Lợi, Ninh Kiều, Cần Thơ<br>Tel: 09850123456</p>
        
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
        $title="Your orders";
          $mail->mailorder($mailorder,$content,$title);
          
    //   if($result_order_details){
        
    //     $message['msg']="Đặt hàng thành công!!";
    //     header('Location:'.BASE_URL."/cart?msg=".urlencode(serialize($message)));
    //   }
      
    }
}
?>  