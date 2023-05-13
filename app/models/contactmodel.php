
<?php 
//tuong tac csdl, goi tat ca nhung gi co trong dmodel
    class contactmodel extends Dmodel {
       public function __construct(){
           parent::__construct();
        }
     
        public function insertcontact($table,$data){
            return $this->db->insert($table,$data); 
          
        }
        public function listcontact($table_contact){
            $sql ="SELECT * FROM $table_contact ORDER BY contact_id DESC";
            return $this->db->select($sql);
 
        }
        
        
    }

?>