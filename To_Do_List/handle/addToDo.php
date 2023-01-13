<?php

require_once '../App.php';
if($request->hasPost("submit")){
    $title = $request->clean("title");

    //validation 
     $validation->validate("title",$title,['Required','Str']);
    $errors =  $validation->getError();

    if(empty($errors)){
        //insert 
      $stm =  $conn->prepare("insert into todo(`title`) values(:title)");
        $stm->bindParam(":title",$title,PDO::PARAM_STR);
      $out =  $stm->execute();
      if($out) {
        $session->set("success","data inserted successfuly");
        $request->header("../index.php");

      }else{
        $request->header("../index.php");
      }
    }else{
        $session->set("errors",$errors);
        $request->header("../index.php");
    }


    
}else {
    $request->header("../index.php");
}
