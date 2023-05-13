
<?php 
//tuong tac csdl, goi tat ca nhung gi co trong dmodel
    class customermodel extends Dmodel {
       public function __construct(){
           parent::__construct();
        }



        public function customer_info($table_customers,$id){
            $sql="SELECT * FROM $table_customers WHERE $table_customers.customers_id='$id'";    
            return $this->db->select($sql);
        }
        public function upload_pro($table,$data,$cond){
            return $this->db->update($table,$data,$cond); 
        }
        public function upload_role($table_customers,$data,$cond){
            return $this->db->update($table_customers,$data,$cond); 
        }
        //  public function category_home( $table){
        //     $sql ="SELECT * FROM $table ORDER BY category_product_id DESC";
        //    return $this->db->select($sql);

        //  }
        public function customer_delete($table,$cond){
            return $this->db->delete($table,$cond); 
        }
        public function list_customers($table_customers){
            $sql="SELECT * FROM $table_customers order by customers_id";    
            return $this->db->select($sql);
        }
        public function insert_customer($table_customers,$data){
            return $this->db->insert($table_customers,$data); 
          
        }
        public function login($table_customers,$username,$password){
            $sql ="SELECT * FROM $table_customers WHERE email =? AND  password =? ";
           return $this->db->affectedRows($sql,$username,$password);
        }
        
        public function getlogin($table_customers,$username,$password){
            $sql ="SELECT * FROM $table_customers WHERE email =?  AND  password =? ";
            return $this->db->selectUser($sql,$username,$password);
           }
        

        
    }
  
?>

 