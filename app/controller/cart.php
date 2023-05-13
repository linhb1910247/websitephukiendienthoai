<?php
    class cart extends Dcontroller{
     
       public function __construct(){
        $data= array();
             parent::__construct();
        }
        public function index(){
           $this->cart();
        }
        public function dathang(){
            Session::init();
            $table ='tb_category_product';
        
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
            $table_customers ='tbl_customers';
            $customermodel = $this->load->model('customermodel');
            $id=Session::get('customers_id');
            $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
            $this->load->view('HLshop/header',$data);
            // $this->load->view('HLshop/slider');
            $this->load->view('HLshop/dathang',$data_info);
            $this->load->view('HLshop/footer');
        }
       
        public function cart(){
         
            Session::init();

            $table_product_details='product_details';
            $categorymodel = $this->load->model('categorymodel');
            $table_product = "tbl_product";

            $table ='tb_category_product';
           if(isset($_SESSION["addtocart"])){
            foreach($_SESSION["addtocart"] as $key => $value){
                $id= $value['id_product'];
                $size= $value['size_product'];
            }
           }else{
            $id=0;
            $size='';
           }
           $cond_product_by_id = "$table_product_details.id_product = $table_product.product_id AND $table_product.product_id ='$id' AND $table_product_details.size ='$size' ";
           $data1['productbyid']= $categorymodel->productbyid_upload($table_product,$table_product_details,$cond_product_by_id);
            $data['category'] =$categorymodel->category_home($table);
            
            $this->load->view('HLshop/header',$data);
            // $this->load->view('HLshop/slider');
            $this->load->view('HLshop/cart',$data1);
            $this->load->view('HLshop/footer');
        }
       
        public function addtocart(){
            Session::init();
            // Session::destroy();
            if(isset($_SESSION["addtocart"])){
                $available=0;
                $avaliablesize=0;
               //neu ton tai cart ma trung thi tang so luong
               //neu ton tai khong trung sp thi add du lieu them vao
                foreach($_SESSION["addtocart"] as $key => $value){
                   
                    if($_SESSION["addtocart"][$key]['id_product']== $_POST["id_product"] ){
                        if($_SESSION["addtocart"][$key]["size_product"]== $_POST["size"]){
                            //neu trung available tang len sẽ khac 0 khong them du lieu nua
                              $avaliablesize=$avaliablesize+1;
                              $_SESSION["addtocart"][$key]['quanlity_product']= $_SESSION["addtocart"][$key]['quanlity_product'] + $_POST["quanlity_product"];
                          }
                    }
                     
                   
                } 
                    if( $avaliablesize==0 ){
                        $item= array(
                        'id_product' => $_POST["id_product"],
                        'title_product' => $_POST["title_product"],
                        'image_product' => $_POST["image_product"],
                        'price_product' => $_POST["price_product"],
                        'quanliti' => $_POST["quanliti"],
                        'quanlity_product' => $_POST["quanlity_product"],
                        'size_product' =>$_POST["size"],
                        );
                        $_SESSION["addtocart"][]=$item;
                    }
                
                }else{
                    //chuoi mang du lieu
                    $item= array(
                        'id_product' => $_POST["id_product"],
                        'title_product' => $_POST["title_product"],
                        'image_product' => $_POST["image_product"],
                        'price_product' => $_POST["price_product"],
                        'quanliti' => $_POST["quanliti"],
                        'quanlity_product' => $_POST["quanlity_product"],
                        'size_product' =>$_POST["size"],
                    );
                    $_SESSION["addtocart"][]=$item;
                     }
                header("Location:".BASE_URL.'/cart');
        }
       
        public function updatecart(){
            
            Session::init(); 
           
            $table_product = "tbl_product";
            if(isset($_POST['delete_cart'])){
                if(isset($_SESSION["addtocart"])){
                    foreach($_SESSION["addtocart"] as $key => $value){
                        foreach($_POST['delete_cart'] as $k => $val){
                            if( $_SESSION["addtocart"][$key]["id_product"] ==  $val && $_SESSION["addtocart"][$key]["size_product"]== $k ){ 
                                unset($_SESSION["addtocart"][$key]);
                                  $message['msg']="Delete successfull!!";
                        } 
                        }
                          if($_SESSION["addtocart"]==null){
                            unset($_SESSION["addtocart"]);
                            $message['msg']="Cart is empty!!";
                            header('Location:'.BASE_URL."/cart?msg=".urlencode(serialize($message)));
               
                          }
                         
                     }
                     header('Location:'.BASE_URL."/cart?msg=".urlencode(serialize($message)));
               
              }else{
                  header("Location:".BASE_URL);
                 }
            }else{
                foreach($_POST['qty'] as $key => $qty){
                    foreach($_POST['size_product'] as $s => $size){
                    foreach($_SESSION["addtocart"] as $section => $value){
                        foreach( $_POST['update_cart'] as $arr => $val){
                        if($value['size_product'] == $key && $qty >=1 && $value['size_product'] ==$s ){
                            $_SESSION["addtocart"][$section]['quanlity_product'] =$qty;

                            if( $_SESSION["addtocart"][$section]["id_product"] ==  $val && $_SESSION["addtocart"][$section]["size_product"]== $arr ){
                            $_SESSION["addtocart"][$section]['size_product'] = $size;
                            $message['msg']="Updated successfull!!";
                            }
                        }
                        $item= array(
                            'id_product' => $val,
                           
                            'size_product' =>$size,
                        );
                        // if(array_unique($_SESSION["addtocart"][$section])){
                        //     $_SESSION["addtocart"][$section]['quanlity_product'] +=1;
                        //     $_SESSION["addtocart"][]  =array_unique($_SESSION["addtocart"][$9]]);
                        // }
                        }
                        if($value['size_product'] == $key  && $value['size_product'] ==$s && $qty == 0 ){
                            unset($_SESSION["addtocart"][$section]);
                            $message['msg']="Delete row successfully !!";
                        }
                        if($_SESSION["addtocart"]==null){
                            unset($_SESSION["addtocart"]);
                            $message['msg']="Cart is empty!!";
                            header('Location:'.BASE_URL."/sanpham/tatca?msg=".urlencode(serialize($message)));
               
                          }
                    
                    header('Location:'.BASE_URL."/cart?msg=".urlencode(serialize($message)));
                }
            }
            }
            }
        }
                
    
  
}   
?>