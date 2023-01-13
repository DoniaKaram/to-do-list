<?php

    //pdo

    try{
        $conn = new PDO("mysql:host=localhost;port=3306;dbname=todo_sun_c38","root","");
    }catch(Exception $e) {
      echo "connection faild : ".$e->getMessage();
    }


 