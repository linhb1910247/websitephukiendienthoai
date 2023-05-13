<?php
    class contact extends Dcontroller{
     
       public function __construct(){
        $data= array();
             parent::__construct();
        }
        public function index(){
           $this->contact();
        }
       
       
        public function contact(){
            Session::init();
            
            $table ='tb_category_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
            $table ='tbl_contact';
            // $contactmodel = $this->load->model('contactmodel');
            $table_customers ='tbl_customers';
            $customermodel = $this->load->model('customermodel');
            $id=Session::get('customers_id');
            $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
            $this->load->view('HLshop/header',$data);
            // $this->load->view('HLshop/slider');
            $this->load->view('HLshop/contact',$data_info);
            $this->load->view('HLshop/footer');
        }
     public function insert_contact(){
        Session::init();
        $table ='tbl_contact';
        $contactmodel = $this->load->model('contactmodel');
        $name= $_POST['name'];
        $email= $_POST['email'];
        $subject= $_POST['subject'];
        $message= $_POST['message'];
        $phone= $_POST['phone'];
        $customers_id= $_POST['customers_id'];
        $data=array(
            'name'=>$name,
            'email'=> $email,
            'subject'=>$subject,
            'message'=> $message,
            'phone'=> $phone,
            'customers_id'=>$customers_id

        );
        $result =$contactmodel->insertcontact($table,$data);
        if($result==1){
  
            $mess['msg']="Your contact is successfull!!";
            header('Location:'.BASE_URL."/contact/contact?msg=".urlencode(serialize($mess)));
          }else{
            $mess['msg']="Your contact is failed!!";
            header('Location:'.BASE_URL."/contact/contact?msg=".urlencode(serialize($mess)));         
            }
     }
     public function  list_contact(){
        Session::chesksession_customer();

        $table_contact ='tbl_contact';
        $contactmodel = $this->load->model('contactmodel');
        $data['contact'] =  $contactmodel->listcontact($table_contact);
        $this->load->view("admin/header");
        $table_customers ='tbl_customers';
        $customermodel = $this->load->model('customermodel');
        $id=Session::get('customers_id');
        $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
        $this->load->view("admin/menu",$data_info);

        // $this->load->view('HLshop/slider');
        $this->load->view('admin/contact/listcontact',$data);
        $this->load->view('admin/footer');
     }
    }
?>