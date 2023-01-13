<?php
require_once '../App.php';


// update
// data ->validation ->valid -- update , not valid-> edit  -- message

if($request->hasPost("submit") && $request->hasGet("id")){
    $id = $request->get("id");
    $title = $request->clean("title");

    //validation 

    $validation->validate("title",$title,['Required','Str']);
    $errors =  $validation->getError();

    if(empty($errors)){
        //select 
        $out =  $handle->select($id);
        if($out){
            //update

            $is_updated =   $handle->update( ":title","title",$title,":id","id" , $id);

            if($is_updated){
                $session->set("success","data updated successfuly");
                $request->header("../index.php");
            }else{
                $session->set("errors","error while udpating");
                $request->header("../edit.php?id=$id");
            }

        }


    }else{
        $session->set("errors",$errors);
        $request->header("edit.php?id=$id");
    }

}else {
    $request->header("index.php");
}