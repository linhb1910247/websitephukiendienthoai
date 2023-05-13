
<?php 
//tuong tac csdl, goi tat ca nhung gi co trong dmodel
    class categorymodel extends Dmodel {
       public function __construct(){
           parent::__construct();
        }
        public function category( $table){

            $sql ="SELECT * FROM $table ORDER BY category_product_id DESC";
           return $this->db->select($sql);

         }
         public function category_home( $table){
            $sql ="SELECT * FROM $table ORDER BY category_product_id DESC";
           return $this->db->select($sql);

         }
        public function categorybyid($table,$cond){
            $sql="SELECT * FROM $table WHERE $cond";     
            return $this->db->select($sql);
        }

        //lay san pham thuoc danh muc
        public function categorybyid_home($table,$table_product,$id){
            $sql="SELECT * FROM $table,$table_product WHERE $table.category_product_id = $table_product.category_product_id AND $table_product.category_product_id= '$id' ORDER BY $table_product.product_id DESC";    
           
            return $this->db->select($sql);
        }
        public function detail_product_home($table,$table_product,$table_product_details,$cond){
            $sql="SELECT * FROM $table,$table_product,$table_product_details WHERE $cond";    
          
            return $this->db->select($sql);
        }
        public function detail_product_home_size($table_product_details,$cond_product_details){
            $sql="SELECT * FROM $table_product_details WHERE $cond_product_details";
        }
        public function list_product_home($table_product){
            $sql="SELECT * FROM $table_product ORDER BY $table_product.product_id DESC";    
           
            return $this->db->select($sql);
        }
        public function sanphamtonkho($table_product, $table_order_details,$table_order){
            $sql="SELECT * FROM $table_product,$table_order_details,$table_order 
            where $table_product.product_id = $table_order_details.order_product_id 
            and $table_order.order_code = $table_order_details.order_code
            and order_status= 4 or order_status= 5 ORDER BY $table_product.product_id DESC";    
           
            return $this->db->select($sql);
        }
       
        public function insertcategory($table,$data){
            return $this->db->insert($table,$data); 
          
        }
        public function updatecategory($table,$data,$cond){
            return $this->db->update($table,$data,$cond); 
        }
        public function updatetproduct($table,$data,$cond){
            return $this->db->update($table,$data,$cond); 
        }
    
       
        public function insert_cmt($table,$data){
            return $this->db->insert($table,$data); 
        }
        public function listcomment($table_comment,$table_customers,$table_product,$cond_comment){
            $sql="SELECT * FROM $table_comment,$table_customers,$table_product WHERE  $cond_comment ORDER BY $table_comment.comment_date DESC";  
            return $this->db->select($sql);  
        }
        public function listcommentrely($table_rely,$table_customers,$cond_commentrely,$table_comment){
            $sql="SELECT * FROM $table_rely,$table_customers,$table_comment WHERE $cond_commentrely  ORDER BY $table_rely.commentrely_date DESC";
            return $this->db->select($sql);  
        }
        public function categorydelete($table,$cond){
            return $this->db->delete($table,$cond); 
        }
        //product
        public function insertproduct($table,$data){
            return $this->db->insert($table,$data); 
          
        }  public function insertproductdetails($table,$data){
            return $this->db->insert($table,$data); 
          
        }
        public function product($table_product, $table_category,$tbl_product_detail,$cond){
            //goi select tu ddatabase va truyen gia ban vao 
            //JOIN 2 bả
            $sql ="SELECT * FROM $table_product,$table_category, $tbl_product_detail WHERE
             $table_product.category_product_id = $table_category.category_product_id AND
             $tbl_product_detail.id_product=$table_product.product_id 
                 $cond";
           return $this->db->select($sql);
         }
         public function  sanphamhethang($table_product, $table_category,$tbl_product_detail){
            $sql ="SELECT * FROM $table_product,$table_category, $tbl_product_detail WHERE
            $table_product.category_product_id = $table_category.category_product_id AND
            $tbl_product_detail.id_product=$table_product.product_id AND $tbl_product_detail.qty=0;
             ORDER BY  $table_product.product_id DESC";
          return $this->db->select($sql);
         }
         public function  sanphamsaphet($table_product, $table_category,$tbl_product_detail){
            $sql ="SELECT * FROM $table_product,$table_category, $tbl_product_detail WHERE
            $table_product.category_product_id = $table_category.category_product_id AND
            $tbl_product_detail.id_product=$table_product.product_id AND $tbl_product_detail.qty<=2 AND $tbl_product_detail.qty!=0;
             ORDER BY  $table_product.product_id DESC";
          return $this->db->select($sql);
         }
         public function deleteproduct($table_product,$cond){
            return $this->db->delete($table_product,$cond); 
         }
     
         public function productbyid($table,$cond){
            $sql="SELECT * FROM $table WHERE $cond ORDER BY  $table.product_id";    
            return $this->db->select($sql);
        }
        public function productbyid_upload($table,$table_product_details,$cond_product_by_id){
            $sql="SELECT * FROM $table,$table_product_details WHERE $cond_product_by_id ORDER BY  $table.product_id";    
            return $this->db->select($sql);
        }
        public function product_details_by_id($table,$cond){
            $sql="SELECT * FROM $table WHERE $cond";    
            return $this->db->select($sql);
        }
        public function update_product_details($table,$data,$cond){
            return $this->db->update($table,$data,$cond); 

        }
    }
  
?>

 