
<?php 
//tuong tac csdl, goi tat ca nhung gi co trong dmodel
    class paymentmodel extends Dmodel {
       public function __construct(){
           parent::__construct();
        }
     
        public function insert_payment($table_payment,$data_payment){
           
            return $this->db->insert($table_payment,$data_payment);
    }
        
    }

?>