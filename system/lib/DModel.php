<?php

require './vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

    class DModel{
        //dmodel ket noi database
        protected $db =array();
        public function __construct(){
            $mysqlname=$_ENV['DB_NAME'];
            $host=$_ENV['DB_HOST'];
            $connect = 'mysql:dbname='.$mysqlname.';host-'. $host.';charset=utf8';
            $user = $_ENV['DB_USER'];
            $pass = $_ENV['DB_PASS'];
            $this->db=new Database($connect, $user, $pass);
        }
        
    }
?>