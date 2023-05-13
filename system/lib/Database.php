<?php
    class Database extends PDO {
        
        //ket noi csdl
        public function __construct($connect, $user, $pass){
        
            parent::__construct($connect, $user, $pass);
        }
        public function select($sql,$data =array(),$fetchStyle = PDO::FETCH_ASSOC) {
            //lay du lieu tu csdl va tra ve kq
            $statement=$this->prepare($sql);
            foreach ($data as $key => $value){
                $statement->bindParam($key,$value);
            }
           
            $statement->execute();
            return $statement->fetchAll($fetchStyle);

        }
        public function insert($table,$data){
            //cắt dấu , trong mãng để lấy tên trường 
            $keys=implode(",",array_keys($data));
            //loại bỏ , : trong mảng data và thêm => :filed
            $values=":".implode(", :",array_keys($data));
            $sql = "INSERT INTO $table($keys) VALUES ($values) ";
            $statement = $this->prepare($sql);
            foreach ($data as $key => $value){
                //lặp hết mảng để lấy ra từng trường hợp khi gọi hàm insert
             $statement->bindValue(":$key",$value);
            }
            return  $statement->execute();
        }
        public function update($table,$data,$cond){
            $updateKeys =NULL;
            foreach ($data as $key => $value){
                //thêm chuỗi thành vd $data=array(name, phone) =>data=array(:name, :phone,)
              $updateKeys .= "$key=:$key,";
               }
               //loai bo , data=array(:name, :phone,) => data=array(:name :phone)
               $updateKeys= rtrim( $updateKeys,",");
            $sql= "UPDATE $table SET $updateKeys WHERE $cond";
            $statement = $this->prepare($sql);
            foreach ($data as $key => $value){
                // tuong tu insert
                $statement->bindValue(":$key",$value);
               }
               return  $statement->execute();
        }
        public function delete($table,$cond,$limit=1){
           $sql="DELETE FROM $table WHERE $cond LIMIT $limit";
           return $this->exec($sql);
        }
        public function affectedRows($sql,$username,$password){
            //so sanh voi coi sở dữ liệu, rồi trả về biến rowcoutn
            //dung bang 1 nhiều người sẽ trả biến số lượng
            $statement = $this->prepare($sql);
            $statement->execute(array($username,$password));
            return $statement->rowCount();
        }
        public function selectUser($sql,$username,$password){
            $statement = $this->prepare($sql);
            $statement->execute(array($username,$password));
            return  $statement->fetchAll(PDO::FETCH_ASSOC);
        }   
    }
?>