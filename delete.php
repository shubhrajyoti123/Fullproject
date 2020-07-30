<?php
include "include/config.php";    // (2) Include the config.php


if(isset($_REQUEST['record_status']) && $_REQUEST['record_status']=='delete'){
$Id =base64_decode($_REQUEST['Id']);
$sql = 'DELETE FROM `technical_skill` WHERE Id=:Id';
 $result = $pdo->prepare($sql);
 $result->bindParam(":Id",$Id);
if($result->execute()){

             header('location:technical_skill.php?mesg=success');
               // echo "data updated";
               }else{
               header('location:technical_skill.php?mesg=failed');
               }
 // $dberror= $result->errorInfo();
 //                echo "<pre>";
 //                 print_r($dberror);exit;
}

?>