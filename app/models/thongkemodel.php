
<?php 
    class thongkemodel extends Dmodel {
       public function __construct(){
           parent::__construct();
        }
     
        public function thongke_order($table_statistic,$subdays,$now){
            $sql="SELECT * FROM $table_statistic WHERE  $table_statistic.order_date BETWEEN '$subdays' AND '$now' ORDER BY $table_statistic.order_date";    
            return $this->db->select($sql);
        }
        public function thongke($table_statistic){
            $sql="SELECT * FROM $table_statistic.order_date";    
            return $this->db->select($sql);
        }
     
        public function insert_statistics($table_statistic,$data_statistics){
           
                return $this->db->insert($table_statistic,$data_statistics);
        }
        public function transactions($table_payment,$tbl_order,$subdays_stransactions,$now)
        {
            $sql="SELECT * FROM $table_payment,$tbl_order WHERE  $table_payment.order_code =$tbl_order.order_code AND $table_payment.vnp_PayDate BETWEEN '$subdays_stransactions' AND '$now' ORDER BY $table_payment.vnp_PayDate DESC";    
            return $this->db->select($sql);
        }
    }   
   
?>
