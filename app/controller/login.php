<?php
 require './vendor/autoload.php';
 use Gregwar\Captcha\CaptchaBuilder;
 use Gregwar\Captcha\PhraseBuilder;
 use Carbon\Carbon;
use Carbon\CarbonInterval;

    class login extends Dcontroller{
     
       public function __construct(){
        $message = array();
        
       
             parent::__construct();
        }
        public function index(){
           $this->login();
        }
        public function login(){
            
            $this->load->view('admin/header');
            Session::init();
            if(Session::get("login")==true){
                header("Location:".BASE_URL."/login/dashboard");
            }
            $this->load->view('admin/menu');
            $this->load->view('admin/login');
            $this->load->view('admin/footer');
        }
        public function dashboard(){
            Session::chesksession_customer();
            if(isset($_POST['thoigian'])){
                $thoigian = $_POST['thoigian'];
            }else{
                $thoigian='';
                $subdays=Carbon::now('asia/ho_chi_minh')->subdays(365)->toDateString();
            }
            if($thoigian=='7ngay'){
                $subdays=Carbon::now('asia/ho_chi_minh')->subdays(7)->toDateString();
            }else if($thoigian=='28ngay'){
                $subdays=Carbon::now('asia/ho_chi_minh')->subdays(28)->toDateString();
            }else if($thoigian=='90ngay'){
                $subdays=Carbon::now('asia/ho_chi_minh')->subdays(90)->toDateString();
            }else if($thoigian=='365ngay'){
                $subdays=Carbon::now('asia/ho_chi_minh')->subdays(365)->toDateString();
            }

            if(isset($_POST['thoigianmua'])){
                $thoigianmua = $_POST['thoigianmua'];
            }else{
                $thoigianmua='';
                $subdaysmua=Carbon::now('asia/ho_chi_minh')->subdays(365)->toDateString();
            }
            if($thoigianmua=='7ngay'){
                $subdaysmua=Carbon::now('asia/ho_chi_minh')->subdays(7)->toDateString();
            }else if($thoigianmua=='28ngay'){
                $subdaysmua=Carbon::now('asia/ho_chi_minh')->subdays(28)->toDateString();
            }else if($thoigianmua=='90ngay'){
                $subdaysmua=Carbon::now('asia/ho_chi_minh')->subdays(90)->toDateString();
            }else if($thoigianmua=='365ngay'){
                $subdaysmua=Carbon::now('asia/ho_chi_minh')->subdays(365)->toDateString();
            }
            $now=Carbon::now('asia/ho_chi_minh')->toDateString();
            // $subdays=Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
            $table_statistic='tbl_statistic';
            $table_payment ='payment';
            $table_customers ='tbl_customers';
            $tbl_order='tbl_order';
            $customermodel = $this->load->model('customermodel');

            $thongkemodel = $this->load->model('thongkemodel');
            $data['ordermua']= $thongkemodel ->thongke_order($table_statistic,$subdaysmua,$now);
            $data['order']= $thongkemodel ->thongke_order($table_statistic,$subdays,$now);
            if(isset($_POST['transactionsviewall'])){
                $subdays_stransactions=Carbon::now('asia/ho_chi_minh')->subdays(365)->toDateString();

            }else{
            $subdays_stransactions=Carbon::now('asia/ho_chi_minh')->subdays(7)->toDateString();
            }

            $id=Session::get('customers_id');
            $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
            $data['transactions'] = $thongkemodel->transactions($table_payment,$tbl_order,$subdays_stransactions,$now);
            $table_product = "tbl_product";
            $table_category = "tb_category_product";
            $tbl_product_detail="product_details";
            $table_order_details='tbl_order_details';
            $table_order='tbl_order';    
            $ordermodel = $this->load->model('ordermodel');
           
            $categorymodel =$this->load->model('categorymodel');
        
            $data['product'] = $categorymodel->sanphamhethang($table_product, $table_category,$tbl_product_detail);
            $data['sanphamsaphet'] = $categorymodel->sanphamsaphet($table_product, $table_category,$tbl_product_detail);
            $data['sanphamtonkho'] = $categorymodel->sanphamtonkho($table_product, $table_order_details,$table_order);
            $data['list_product'] = $categorymodel->list_product_home($table_product);
            $data['customers'] =  $customermodel->list_customers($table_customers);

            $this->load->view("admin/header");
            $this->load->view("admin/menu",$data_info);
            $this->load->view("admin/dashboard",$data);
            $this->load->view("admin/footer",$data);
            // echo $data=$chart_data;
        }
     
    }
?>