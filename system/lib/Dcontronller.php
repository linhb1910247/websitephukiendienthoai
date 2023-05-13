<?php
//hien thi view va goi model tra lai toan bo du lieu cua view
    class Dcontroller{
        protected $load=array();
        
        public function __construct(){
          $this->load=new Load();
        }
        
    }
?>