<?php
require_once '../App.php';

// 

if($request->hasGet("id")){
    $id = $request->get("id");

    // 
    $out =  $handle->select($id);
    if($out) {
        //delete
       $stm = $conn->prepare("delete from todo where id=(:id)");
       $stm->bindParam(":id",$id,PDO::PARAM_STR);
       $is_deleted = $stm->execute();
        if($is_deleted){
            $session->set("success","data deleted successfuly");
            $request->header("../index.php");
        }else{
            $session->set("errors","errors whiel deleting");
            $request->header("../index.php");
        }

    }else{
    $session->set("errors","data not found");
    $request->header("../index.php");

    }


}else {
    $request->header("../index.php");
}
