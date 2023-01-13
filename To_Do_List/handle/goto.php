<?php
require_once '../App.php';


if($request->hasGet("name")&& $request->hasGet("id")){
    $name = $request->get("name");
    $id = $request->get("id");

    //select 
    $out =  $handle->select($id);

    if($out) 
    {
      $is_updated =   $handle->update( ":status","status",$name,":id","id" , $id);
        if($is_updated){
            $session->set("success","status update successfuly ");
            $request->header("../index.php");

        }else{
            // $session->set("success","status update successfuly ");
            $request->header("../index.php");
        }

    }else{
    $request->header("../index.php");

    }

    //update

}else {
    $request->header("../index.php");
}

