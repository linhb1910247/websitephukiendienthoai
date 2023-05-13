<?php
 require './vendor/autoload.php';
 use Gregwar\Captcha\CaptchaBuilder;
 use Gregwar\Captcha\PhraseBuilder;
 use Carbon\Carbon;
use Carbon\CarbonInterval;
    class index extends Dcontroller{
    
       public function __construct(){
        $data= array();
             parent::__construct();
        }
        public function index(){
            $this->homepage();
        }
        public function homepage(){
            Session::init();
            $table_product= 'tbl_product';
            $table ='tb_category_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
            $data['list_product'] = $categorymodel->list_product_home($table_product);
            $this->load->view('HLshop/header',$data);
            $this->load->view('HLshop/slider',$data);
            $this->load->view('HLshop/home',$data);
            $this->load->view('HLshop/footer');
        }
        public function search(){
            Session::init();
            $table_product= 'tbl_product';
            $table ='tb_category_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
            $data['list_product'] = $categorymodel->list_product_home($table_product);
            $homemodel = $this->load->model('homemodel');
            if(isset($_POST['tukhoa'])){
                $tukhoa=$_POST["tukhoa"];
            }else{
                $tukhoa='';
            }
            $data['search_list'] = $homemodel->search_product($table_product,$table,$tukhoa);
            $this->load->view('HLshop/header',$data);
            $this->load->view('HLshop/search',$data);
            $this->load->view('HLshop/footer');
        }
        public function notfound(){
            Session::init();
            $table ='tb_category_product';
           
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
          
            $this->load->view('HLshop/header',$data);
            $this->load->view('HLshop/slider');
            $this->load->view('HLshop/404');
            $this->load->view('HLshop/footer');
        }
        public function search_product(){
            Session::chesksession_customer();
            $table_product = "tbl_product";
            $tbl_product_details="product_details";
            $homemodel = $this->load->model('homemodel');
            if(isset($_POST['tukhoa'])){
                if($_POST['tukhoa'] == 'het hang' 
                || $_POST['tukhoa'] == 'hết hàng' 
                || $_POST['tukhoa'] == 'Hết Hàng'
                || $_POST['tukhoa'] == ' Hết Hàng'
                || $_POST['tukhoa'] == 'Hết Hàng ' 
                    ||$_POST['tukhoa'] == 'Ngung ban' 
                || $_POST['tukhoa'] == 'Ngừng bán' 
                || $_POST['tukhoa'] == 'ngungban'
                || $_POST['tukhoa'] == 'Ngừng Bán'
                || $_POST['tukhoa'] == 'Ngung ban'){
                    $tukhoa = 0;
                }else if($_POST['tukhoa'] == 'Đang bán' 
                || $_POST['tukhoa'] == 'đang bán' 
                || $_POST['tukhoa'] == 'đang bán'
                || $_POST['tukhoa'] == ' đang bán'
                || $_POST['tukhoa'] == ' Dang Ban '
                || $_POST['tukhoa'] == 'Đang Bán'
                || $_POST['tukhoa'] == 'dangban'
                ){
                    $tukhoa = 1;
                }else{
                    $tukhoa=$_POST["tukhoa"];
                }
               
                
            }else{
                $tukhoa='';
            }
            $table ='tb_category_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
            $data['search_list'] = $homemodel->search_product_admin($table,$tbl_product_details,$table_product,$tukhoa);
            $this->load->view("admin/header");
            $table_customers ='tbl_customers';
            $customermodel = $this->load->model('customermodel');
            $id=Session::get('customers_id');
            $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
            $this->load->view("admin/menu",$data_info);
            $this->load->view("admin/search",$data);
            $this->load->view("admin/footer");
        }
        public function search_order(){
            Session::chesksession_customer();
            
            $tbl_order_details="tbl_order_details";
            $homemodel = $this->load->model('homemodel');
            if(isset($_POST['tukhoa'])){
                if($_POST['tukhoa'] == 'Paid' 
                || $_POST['tukhoa'] == 'paid' 
                || $_POST['tukhoa'] == 'paid '
                || $_POST['tukhoa'] == 'Paid '
               ){
                    $tukhoa = 1;
                }else if($_POST['tukhoa'] == 'Unpaid' 
                || $_POST['tukhoa'] == 'Unpaid ' 
                || $_POST['tukhoa'] == 'unpaid'
                || $_POST['tukhoa'] == ' Unpaid'
                || $_POST['tukhoa'] == ' unpaid'
                || $_POST['tukhoa'] == 'unpaid '

                ){
                    $tukhoa = 0;
                }else if($_POST['tukhoa'] == 'Cancelled' 
                || $_POST['tukhoa'] == 'cancelled ' 
                || $_POST['tukhoa'] == 'Cancelled '
                || $_POST['tukhoa'] == 'cancelled'
                || $_POST['tukhoa'] == ' cancelled'
                || $_POST['tukhoa'] == ' Cancelled '){
                    $tukhoa=2;
                }else if($_POST['tukhoa'] == 'Deliver' 
                || $_POST['tukhoa'] == 'Deliver ' 
                || $_POST['tukhoa'] == 'deliver '
                || $_POST['tukhoa'] == 'deliver'
                || $_POST['tukhoa'] == ' Deliver'
                || $_POST['tukhoa'] == ' deliver '){
                    $tukhoa=4;
                }else{
                    $tukhoa=$_POST['tukhoa'];

                }
               
                
            }else{
                $tukhoa='';
            }
            $table ='tbl_order';
            $data['search_list'] = $homemodel->search_order_admin($table,$tukhoa);
            $this->load->view("admin/header");
            $table_customers ='tbl_customers';
            $customermodel = $this->load->model('customermodel');
            $id=Session::get('customers_id');
            $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
            $this->load->view("admin/menu",$data_info);
            $this->load->view("admin/search_order",$data);
            $this->load->view("admin/footer");
        }
        public function thanhtoanvnpay(){
            
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $vnp_TxnRef = $_POST['code']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $custommer=$_POST['custommer_id'];
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $mess['msg']="Payment success!!";
            $vnp_Returnurl = "http://devnguyen.localhost:8080/order/customer_order/$custommer?msg=".urlencode(serialize($mess));
            $vnp_TmnCode = "O0KLAEZP";//Mã website tại VNPAY 
            $vnp_HashSecret = "RJNIIJIJBNWWONGQQYVTFINLOSAKYDAY"; //Chuỗi bí mật
           
            $vnp_OrderInfo = 'thanhtoandonhang';
            $vnp_OrderType ='billpayment';
            $vnp_Amount = $_POST['total_order'];
            $vnp_Locale = 'VN';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version
            // $vnp_ExpireDate = $_POST['txtexpire'];
             //Billing
           
        
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );
           
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }
            
            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
            
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
                // vui lòng tham khảo thêm tại code demo
        }
       
    }
    
?>