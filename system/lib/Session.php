<?php
    class Session{
        public static function init(){
          session_start();

        }
        public static function set($key,$val){
            $_SESSION[$key]=$val;
            
        }
        public static function get($key){
           if(isset($_SESSION[$key])){
                return $_SESSION[$key];
           }else{
                return false;
           }
            
        }
        public static function chesksession_customer(){
            self::init();
            if(self::get('admin')==false AND SESSION::get('host')==false){
                header("Location:".BASE_URL."/index/hompage");
            }else if(self::get('admin')==false AND  SESSION::get('user')==false){
                header("Location:".BASE_URL."/index/hompage");
            }
        }   
        public static function chesksession(){
            self::init();
            if(self::get('user')==false){
                self::destroy();
                header("Location:".BASE_URL."/customer/customer_signup");
            }else{

            }
        }
        public static function destroy(){
            session_destroy();
            
        }
        public static function unset($key){
            session_unset($key);
            
        }
    }
?>