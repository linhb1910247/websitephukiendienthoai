
<?php 
//tuong tac csdl, goi tat ca nhung gi co trong dmodel
    class homemodel extends Dmodel {
       public function __construct(){
           parent::__construct();
        }
     
        public function search_product($table_product,$table,$tukhoa){
        $sql= "SELECT * FROM  $table_product,$table  WHERE $table_product.category_product_id=$table.category_product_id
        AND $table_product.product_title   LIKE '%".$tukhoa."%' OR $table_product.category_product_id=$table.category_product_id AND $table_product.product_price LIKE '%".$tukhoa."%' "   ;
            return  $this->db->select($sql);
        }
        public function search_product_admin($table,$tbl_product_details,$table_product,$tukhoa){
            $sql= "SELECT * FROM  $table,$tbl_product_details,$table_product  WHERE $tbl_product_details.id_product=$table_product.product_id AND $table.category_product_id =  $table_product.category_product_id
             AND $tbl_product_details.size LIKE '%".$tukhoa."%'
               OR $table.category_product_id =  $table_product.category_product_id AND  $table_product.product_title LIKE '%".$tukhoa."%' 
               OR $table.category_product_id =  $table_product.category_product_id AND $table_product.product_price LIKE '%".$tukhoa."%'
               OR $table.category_product_id =  $table_product.category_product_id AND $tbl_product_details.qty LIKE '%".$tukhoa."%'
               OR   $table.category_product_id =  $table_product.category_product_id AND $table.category_product_title LIKE '%".$tukhoa."%' 
               OR $table.category_product_id =  $table_product.category_product_id AND $table_product.status LIKE '%".$tukhoa."%'"   ;
                return  $this->db->select($sql);
        }
        public function search_order_admin($table,$tukhoa){
            $sql= "SELECT * FROM $table WHERE $table.order_code LIKE '%".$tukhoa."%'
            OR  $table.order_code LIKE '%".$tukhoa."%'
            OR $table.phone LIKE '%".$tukhoa."%'
            OR $table.order_date LIKE '%".$tukhoa."%'
            OR $table.name LIKE '%".$tukhoa."%'
            OR $table.address LIKE '%".$tukhoa."%'
            OR $table.email LIKE '%".$tukhoa."%'
            OR $table.payment_methods LIKE '%".$tukhoa."%'
            OR $table.order_status LIKE '%".$tukhoa."%' 
            OR $table.cancel LIKE '%".$tukhoa."%' ";             
            return  $this->db->select($sql);

        }
    }

?>