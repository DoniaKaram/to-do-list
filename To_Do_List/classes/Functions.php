<?php

class Handle {

    private  $conn ;
    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;port=3306;dbname=todo_sun_c38","root","");
    }
    public function select($id){
        $stm =  $this->conn->query("select * from todo where id=$id");
        $out =   $stm->execute();
        return $out;
    }

    public function update($keyName ,$columName, $name ,$keyId,$columId , $id)
    {
        $stm = $this->conn->prepare("update todo set `$columName`=$keyName where `$columId`=$keyId");
        $stm->bindParam("$keyName",$name,PDO::PARAM_STR);
        $stm->bindParam("$keyId",$id,PDO::PARAM_STR);
        $is_updated =   $stm->execute();
            return $is_updated;
    }
}