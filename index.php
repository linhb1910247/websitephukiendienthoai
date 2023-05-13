<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Web bán hàng</title> -->
    </head>
<body>


    <h1>
    <?php
        // spl_autoload_register(function($class) {
        //     include_once 'system/lib/'.$class.'.php' ;
        // });
      
        //Require tập tin autoload.php
        
        
        include_once('system/lib/main.php');
       
        include_once('system/lib/Dcontronller.php');
        include_once('system/lib/Database.php');
        include_once('system/lib/Dmodel.php');
        include_once('system/lib/Database.php');
        include_once('system/lib/load.php');
        include_once('system/lib/Session.php');
        include_once('app/config/config.php');
      
        $main =new Main();
        //neu ton tai url lay url khong thi tra ve rong
        // $url = isset($_GET['url']) ? $_GET['url'] : NULL;
      
        // if($url!=NULL){
        //     // xoa ki tu cuoi hang
        //          $url=rtrim($url, '/');
        //         //huy /../
        //         $url=explode('/', filter_var($url,FILTER_SANITIZE_URL));
        // }else{
        //     unset($url);
        // }

        // //url[0]: class ,1 methods, 2 id,3 para
        // if(isset($url[0])){
        //      //lget class qua url
        //     include_once('app/controller/'.$url[0].'.php');
        //     $ctrl=new $url[0]();
        //     if(isset($url[2])) {
        //         $ctrl->{$url[1]}($url[2]);
        //     }else{
        //         if(isset($url[1])){
        //             $ctrl->{$url[1]}();
        //         }else{
                   
        //         }
        //     }
        // }else{
        //     include_once('app/controller/index.php');
        //     $index = new index();
        //     $index->homepage();
        // }
   
       
      
       
      

    ?>
    </h1>
    

</body>
</html>