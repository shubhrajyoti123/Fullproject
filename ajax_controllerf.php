<?php
include "include\config.php"; 
?>
<?php
if(isset($_REQUEST['operation'])=='showRecord' && $_REQUEST['EID']!=""){
  //print_r($_REQUEST);exit;
  //echo "hh";exit;
  $Id =$_REQUEST['EID'];
  // print_r($Id); die();

 // $technical_skill=$_POST['technical_skill'];
 // echo "<pre>";print_r($Id);exit;
    $query_edit = "SELECT * FROM `technical_skill` WHERE Id = $Id";
      $res = $pdo->prepare($query_edit);
    
      $res->execute();
    //print_r($res); die();
   //$dberror= $res->errorInfo();
     //echo "<pre>";
     //print_r($dberror);exit;
   $data =$res->fetch(PDO::FETCH_ASSOC);
     //print_r($data);exit(); 
      $Id =$data['Id'];
      $technical_skill = $data['technical_skill'];
      // print_r($technical_skill); 
      // print_r( $Id);
      // $array = array();
$array= array("Id"=>$Id,"technical_skill"=>$technical_skill);
  //print_r($array);
   // $count=$res->rowCount();
     echo json_encode($array);
     //print_r($array);die();
             
}    
if(isset($_REQUEST['oper']) == 'updateRecord' && $_REQUEST['technical_S'] != ""){
 // print_r($_REQUEST);exit;
  //echo "hh";exit;
  $Id =$_POST['rec_id'];
  
 //  //echo $Id;exit;
   $technical_skill=$_POST['technical_S'];
 //  //echo $technical_skill;
  
  $query_update = "UPDATE `technical_skill` SET `technical_skill`= :technical_skill WHERE `Id`= :Id";
   //echo $query_update;exit;
   $result = $pdo->prepare($query_update);
   $result->bindParam(":Id",$Id);
   $result->bindParam(":technical_skill",$technical_skill);
   if($result->execute()){
    echo "data updated";
   }else{
    echo "update failed";
   }
  //print_r($result);exit;
  //   echo"data updated";
  // }else{
  //   echo"failed";
  // }
}
?>  
























 