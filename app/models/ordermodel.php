
<?php 
    class ordermodel extends Dmodel {
       public function __construct(){
           parent::__construct();
        }
     
        public function insert_order($table_order,$data_order){
            return $this->db->insert($table_order,$data_order);
        }
        public function insert_details($table_order_details,$data_details){
            return $this->db->insert($table_order_details,$data_details);
        }
        public function list_order($table_order, $cond){
            $sql="SELECT * FROM $table_order $cond ";    
            return $this->db->select($sql);
        }
        public function list_order_details($table_product,$table_order_details,$cond){
            $sql="SELECT * FROM $table_order_details,$table_product WHERE $cond ";    
            return $this->db->select($sql);
        }
        public function list_info($table_order_details,$cond_info){
            $sql="SELECT * FROM $table_order_details WHERE $cond_info LIMIT 1 ";    
            return $this->db->select($sql);
        }
        public function order_confirm($table_order,$data,$cond){
            return $this->db->update($table_order,$data,$cond); 
            
        }
        public function deleteorder($table_order,$cond){
            return $this->db->delete($table_order,$cond); 
        }
        public function ordercustomerbyid($table_order,$cond){
            $sql="SELECT * FROM  $table_order WHERE $cond order by $table_order.order_date ASC ";    
            return $this->db->select($sql);
        }
        public function ordercetailscustomerbyid($table_order,$product_details,$table_product,$table_order_details,$cond_order_details){
            $sql="SELECT * FROM  $product_details,$table_order,$table_order_details,$table_product WHERE $cond_order_details ";    
            return $this->db->select($sql);
        }
        public function cancelorder($table_order_details,$cond){
            return $this->db->delete($table_order_details,$cond); 
        }
       public function existsorder($table_order_details,$cond){
        $sql="SELECT Count(*) FROM  $table_order_details WHERE $table_order_details.order_code=$cond  ";  
        return  $this->db->select($sql);
       }    
    }   
   
?>