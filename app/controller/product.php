<?php
    class product extends Dcontroller{
        public function __construct(){
           parent::__construct();
        }
        public function index(){
           $this->add_category();
            
        }
        
        public function add_category(){
          Session::chesksession_customer();
            $this->load->view("admin/header");
            $table_customers ='tbl_customers';
            $customermodel = $this->load->model('customermodel');
            $id=Session::get('customers_id');
            $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
            $this->load->view("admin/menu",$data_info);
           $this->load->view("admin/product/add_category");
           $this->load->view("admin/footer");
       
        }
        public function comment(){
         $table = "tbl_comment";
         Session::chesksession_customer();  
         $categorymodel =$this->load->model('categorymodel');
         date_default_timezone_set('asia/ho_chi_minh');
      
         $date =date("Y-m-d H:i:s");
         $product_id= $_POST['product_id'];
         $data= array(
          'product_id'=>$_POST['product_id'],
          'customer_id'=>$_POST['user_id'],
          'content_comment'=>$_POST['content'],
          'comment_date'=>$date
         );
         $result = $categorymodel->insert_cmt($table,$data);
         if($result==1){
        
           $message['msg']="Successful product comment!!";
           header('Location:'.BASE_URL."/sanpham/chitietsanpham/".$product_id."?msg=".urlencode(serialize($message)));  
           

         }else{
           $message['msg']="Failed product comment!!";
           header('Location:'.BASE_URL."/sanpham/chitietsanpham/".$product_id."?msg=".urlencode(serialize($message)));        
       }
      }
       public function comment_replay(){
        $table = "tbl_replycomment";
        Session::chesksession_customer();  
        $categorymodel =$this->load->model('categorymodel');
        date_default_timezone_set('asia/ho_chi_minh');
     
        $date =date("Y-m-d H:i:s");
        $product_id= $_POST['product_id'];
        $data= array(
         'user_relyid'=>$_POST['userrely_id'],
         'customers_id'=>$_POST['user_id'],
         'content'=>$_POST['content'],
         'commentrely_date'=>$date
        );
        $result = $categorymodel->insert_cmt($table,$data);
        if($result==1){
       
          $message['msg']="Successfull product comment!!";
          header('Location:'.BASE_URL."/sanpham/chitietsanpham/".$product_id."?msg=".urlencode(serialize($message)));  
          

        }else{
          $message['msg']="Failed product comment!!";
          header('Location:'.BASE_URL."/sanpham/chitietsanpham/".$product_id."?msg=".urlencode(serialize($message)));        
      }
       }
        
        public function add_product(){
          Session::chesksession_customer();
         $this->load->view("admin/header");
         $table_customers ='tbl_customers';
         $customermodel = $this->load->model('customermodel');
         $id=Session::get('customers_id');
         $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
         $this->load->view("admin/menu",$data_info);

         $table = "tb_category_product";
         $categorymodel =$this->load->model('categorymodel');
         $data['category'] = $categorymodel->category($table);
         $this->load->view("admin/product/add_product",$data);
         $this->load->view("admin/footer");
     
      }
      public function insert_product(){
        $categorymodel =$this->load->model('categorymodel');
        
        $title=$_POST['product_title'];
        $price=$_POST['product_price'];
      
        $sizeM=$_POST['sizeM'];
        $sizeS=$_POST['sizeS'];
        $sizeL=$_POST['sizeL'];
        $qtyL=$_POST['qtyL'];
        $qtyS=$_POST['qtyS'];
        $qtyM=$_POST['qtyM'];
        $desc=$_POST['product_desc'];
        $category=$_POST['category_product_id'];
        $image=$_FILES['product_image']['name'];
        $tmp_image=$_FILES['product_image']['tmp_name'];
        $div = explode('.',$image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'.$file_ext;
        $path_upload = "public/upload/product/".$unique_image;
       $table = "tbl_product";
       $table_product_details='product_details';
       $product_id= rand(0,999);
       $data =array(
        'product_id' => $product_id,
         'product_title' =>$title,
         'product_image' =>$unique_image,
         'product_price' =>$price,
         'product_price' =>$price,
          'status' => 1,
         'product_desc' =>$desc,
         'category_product_id' =>$category
       );
       $result = $categorymodel->insertproduct($table,$data);
       $data_product_detailsM = array(
        'id_product' =>$product_id,
        'size' =>$sizeM,
        'qty' =>$qtyM,

       );
       $data_product_detailsS = array(
        'id_product' =>$product_id,
        'size' =>$sizeS,
        'qty' =>$qtyS,
       );
       $data_product_detailsL = array(
        'id_product' =>$product_id,
        'size' =>$sizeL,
        'qty' =>$qtyL,
       );
            $categorymodel->insertproductdetails($table_product_details,$data_product_detailsM);
            $categorymodel->insertproductdetails($table_product_details,$data_product_detailsS);
            $categorymodel->insertproductdetails($table_product_details,$data_product_detailsL);
  
        if($result==1){
          move_uploaded_file($tmp_image,$path_upload);
          $message['msg']="Successful add product!!";
          header('Location:'.BASE_URL."/product/add_product?msg=".urlencode(serialize($message)));
        }else{
          $message['msg']="Failed add product!!";
          header('Location:'.BASE_URL."/product/add_product?msg=".urlencode(serialize($message))); 
                  }
              
    

     }
     public function list_product(){
      Session::chesksession_customer();
      $this->load->view("admin/header");
      $table_customers ='tbl_customers';
      $customermodel = $this->load->model('customermodel');
      $id=Session::get('customers_id');
      $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
      $this->load->view("admin/menu",$data_info);
      $table_product = "tbl_product";
      $table_category = "tb_category_product";
      $tbl_product_detail="product_details";
    
      $categorymodel =$this->load->model('categorymodel');
      if(isset($_POST['sort'])){
        $cond='ORDER BY product_title DESC';
      }else if(isset($_POST['sortup'])){
        $cond='ORDER BY product_title ASC';
      }else if(isset($_POST['pricedown'])){
        $cond='ORDER BY product_price DESC';
      }else if(isset($_POST['pricedown'])){
        $cond='ORDER BY product_price ASC';
      }else if(isset($_POST['quantitydown'])){
        $cond='ORDER BY qty DESC';
      }else if(isset($_POST['quantityup'])){
        $cond='ORDER BY qty ASC';
      }else{
        $cond="ORDER BY product_id DESC";
      }
      $data['product'] = $categorymodel->product($table_product, $table_category,$tbl_product_detail, $cond);
      $this->load->view("admin/product/list_product",$data);
      $this->load->view("admin/footer");
  }
  public function inventory_management(){
    Session::chesksession_customer();
    $this->load->view("admin/header");
    $table_customers ='tbl_customers';
    $customermodel = $this->load->model('customermodel');
    $id=Session::get('customers_id');
    $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
    $this->load->view("admin/menu",$data_info);
    $table_product = "tbl_product";
    $table_category = "tb_category_product";
    $tbl_product_detail="product_details";
    $table_order_details='tbl_order_details';
    $table_product='tbl_product';
    $table_order='tbl_order';    
    $ordermodel = $this->load->model('ordermodel');
   
    $categorymodel =$this->load->model('categorymodel');

    $data['product'] = $categorymodel->sanphamhethang($table_product, $table_category,$tbl_product_detail);
    $data['sanphamsaphet'] = $categorymodel->sanphamsaphet($table_product, $table_category,$tbl_product_detail);
    $data['sanphamtonkho'] = $categorymodel->sanphamtonkho($table_product, $table_order_details,$table_order);

    $this->load->view("admin/product/inventory_management",$data);
    $this->load->view("admin/footer");
}

  public function turnoff($id){
    $table = "tbl_product";
    $cond = "product_id ='$id'";
    $data=array(
      'status' => 0,
    );
      $categorymodel =$this->load->model('categorymodel');
      $result= $categorymodel->updatetproduct($table,$data,$cond);
      if($result==1){
        $message['msg']="Turn off successfully!!";
        header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
      }else{
        $message['msg']="Tắt sản phẩm thất bại!!";
        header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
    }
  }
  public function turnon($id){
    $table = "tbl_product";
    $cond = "product_id ='$id'";
    $data=array(
      'status' => 1,
    );
      $categorymodel =$this->load->model('categorymodel');
      $result= $categorymodel->updatetproduct($table,$data,$cond);
      if($result==1){
        $message['msg']="Turn on successfully !!";
        header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
      }else{
        $message['msg']="Mở sản phẩm thất bại!!";
        header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
    }
  }
  public function delete_product($id){
    $table = "tbl_product";
    $cond = "product_id ='$id'";
  
      $categorymodel =$this->load->model('categorymodel');
      $result= $categorymodel->deleteproduct($table,$cond);
      if($result==1){
        $message['msg']="Delete product successfully!!";
        header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
      }else{
        $message['msg']="Xóa sản phẩm thất bại!!";
        header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
    }
  }
  public function delete_product_details($size){
    $table = "product_details";
    $cond = "size ='$size'";
  
      $categorymodel =$this->load->model('categorymodel');
      $result= $categorymodel->deleteproduct($table,$cond);
      if($result==1){
        $message['msg']="Delete product successfully!!";
        header('Location:'.BASE_URL."/product/inventory_management?msg=".urlencode(serialize($message)));
      }else{
        $message['msg']="Xóa sản phẩm thất bại!!";
        header('Location:'.BASE_URL."/product/inventory_management?msg=".urlencode(serialize($message)));
    }
  }
  public function update_product(){
    Session::chesksession_customer();
    $id=$_GET['id'];
    $size=$_GET['size'];
    $table = "tbl_product";
    $table_product_details='product_details';
    $categorymodel =$this->load->model('categorymodel');
    $cond = "product_id ='$id'  ";
    $cond_product_by_id = "$table_product_details.id_product = $table.product_id AND $table.product_id ='$id' AND $table_product_details.size ='$size' ";
    $qty=$_POST['qty'];
   
    $cond_product_details = "$table_product_details.id_product='$id' AND $table_product_details.size='$size'";
    $title=$_POST['product_title'];
    $price=$_POST['product_price'];
    $desc=$_POST['product_desc'];
    $category=$_POST['category_product_id'];
    $image=$_FILES['product_image']['name'];
    $tmp_image=$_FILES['product_image']['tmp_name'];
    $div = explode('.',$image);
    $file_ext = strtolower(end($div));
    $unique_image = $div[0].time().'.'.$file_ext;
    $path_upload = "public/upload/product/".$unique_image;
    if($image){
      $data['productbyid']= $categorymodel->productbyid_upload($table,$table_product_details,$cond_product_by_id);
      foreach($data['productbyid'] as $key =>$value){
          $path_unlink = "public/upload/product/";
          unlink($path_unlink.$value['product_image']);
    
      }
      move_uploaded_file($tmp_image,$path_upload);
      $data =array(
        'product_title' =>$title,
        'product_image' =>$unique_image,
        'product_price' =>$price,
        'product_desc' =>$desc,
        'category_product_id' =>$category
      );
    }else{
      $data =array(
        'product_title' =>$title,
        // 'product_image' =>$unique_image,
        'product_price' =>$price,
        'product_desc' =>$desc,
        'category_product_id' =>$category
      );
   
    }
    $data_product_details=array(
      'qty'=>$qty,
    );
  $categorymodel->update_product_details($table_product_details,$data_product_details,$cond_product_details);
   $result = $categorymodel->updatetproduct($table,$data,$cond);
   if($result==1){
  
     $message['msg']="Update successfully!!";
     header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
   }else{
     $message['msg']="Cập nhật phẩm thất bại!!";
     header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));         
     }
  }

      public function insert_category(){
       $title=$_POST['category_product_title'];
       $desc=$_POST['category_product_desc'];
       $table = "tb_category_product";
       $image=$_POST['category_product_images'];

       $data =array(
         'category_product_title' =>$title,
         'category_product_desc' =>$desc,
         'category_product_images' =>$image
       );
       $categorymodel =$this->load->model('categorymodel');
       $result = $categorymodel->insertcategory($table,$data);
       if($result==1){
         $message['msg']="Add product successfully!!";
         header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
       }else{
         $message['msg']="Thêm danh mục sản phẩm thất bại!!";
         header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));          }
     }
     public function edit_product(){
      Session::chesksession_customer();
      $id=$_GET['id'];
      $size=$_GET['size'];
      $table = "tbl_product";
      $table_product_details = "product_details";
      $table_category = "tb_category_product";
      $cond = "$table_product_details.id_product = $table.product_id AND $table.product_id ='$id' AND $table_product_details.size ='$size' ";

      $categorymodel =$this->load->model('categorymodel');
      $data['productbyid']= $categorymodel->productbyid_upload($table,$table_product_details,$cond);
      $data['category']= $categorymodel->category($table_category);

      $this->load->view("admin/header");
      $table_customers ='tbl_customers';
      $customermodel = $this->load->model('customermodel');
      $id=Session::get('customers_id');
      $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
      $this->load->view("admin/menu",$data_info);
      $this->load->view("admin/product/edit_product",$data);
      $this->load->view("admin/footer");
    }

       
        public function list_category(){
          Session::chesksession_customer();
            $this->load->view("admin/header");
            $table_customers ='tbl_customers';
            $customermodel = $this->load->model('customermodel');
            $id=Session::get('customers_id');
            $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
            $this->load->view("admin/menu",$data_info);
            $table = "tb_category_product";
            $categorymodel =$this->load->model('categorymodel');
            $data['category'] = $categorymodel->category($table);
            $this->load->view("admin/product/list_category",$data);
            $this->load->view("admin/footer");
        }
        public function delete_category($id){
          $table = "tb_category_product";
          $cond = "category_product_id ='$id'";
            $categorymodel =$this->load->model('categorymodel');
            $result= $categorymodel->categorydelete($table,$cond);
            if($result==1){
              $message['msg']="Delete category successfully!!";
              header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
            }else{
              $message['msg']="Xóa danh mục sản phẩm thất bại!!";
              header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
          }
        }



        public function edit_category($id){
          Session::chesksession_customer();
          $table = "tb_category_product";
          $cond = "category_product_id ='$id'";
          $categorymodel =$this->load->model('categorymodel');
          $data['categorybyid']= $categorymodel->categorybyid($table,$cond);
          $this->load->view("admin/header");
          $table_customers ='tbl_customers';
          $customermodel = $this->load->model('customermodel');
          $id=Session::get('customers_id');
          $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
          $this->load->view("admin/menu",$data_info);
          $this->load->view("admin/product/edit_category",$data);
          $this->load->view("admin/footer");
        }
        public function update_category($id){
         
          $table = "tb_category_product";
          $cond = "category_product_id ='$id'";
          $title=$_POST['category_product_title'];
          $desc=$_POST['category_product_desc'];
          $image=$_POST['category_product_images'];
          if($image){
            $data =array(
              'category_product_title' =>$title,
              'category_product_desc' =>$desc,
              'category_product_images' =>$image
            );
          }else{
            $data =array(
              'category_product_title' =>$title,
              'category_product_desc' =>$desc, 
            );
          }
       
          $categorymodel =$this->load->model('categorymodel');
          $result= $categorymodel->updatecategory($table,$data,$cond);
          if($result==1){
            $message['msg']="Update categoty successfully!!";
            header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
          }else{
            $message['msg']="Cập nhật phẩm thất bại!!";
            header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
        }
        }
    }
?>