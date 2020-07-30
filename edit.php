<?php
$title = "Welcome";                   // (1) Set the title
include "include/header.php";

 //$Id = base64_decode($_REQUEST['Id']);   
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  background-color: #ffffcc;
  
}
input[type=text], select, textarea {
  margin-left: 400px; 
  width: 50%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
.savebtn{
  width: 10%;
  margin-right: 700px;
  margin-top: 10px;
  margin-bottom: 100px;
  border: none;
  background-color: green;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  float:right;
} 
</style>
</head>
<body>

<?php
 // $Id = base64_decode($_REQUEST['Id']);
if(isset($_REQUEST['Id']) && $_REQUEST['Id']!=""){
$Id =base64_decode($_REQUEST['Id']);
  // $query_profile ="SELECT * FROM `registration` WHERE Id = '" .$_SESSION['user_id']."'";
$query_edit ="SELECT * FROM `technical_skill` WHERE Id = :Id";
$res = $pdo->prepare($query_edit);

$res->bindParam(":Id",$Id);
$res->execute();
          // $dberror= $res->errorInfo();
          //    echo "<pre>";
          //     print_r($dberror);exit;
           
              //$data= $res->fetch(PDO::FETCH_ASSOC);
             // echo "<pre>";
             //  print_r($data);
             //  exit;
$count=$res->rowCount();
if($count > 0){
$data =$res->fetch(PDO::FETCH_ASSOC);
             //  echo "<pre>";print_r($data);
             // exit;
}
}

if(isset($_POST['update'])&& $_SERVER["REQUEST_METHOD"] == "POST"){
//$Id =xssCheck($_POST['Id']);
//$Id = base64_decode($_REQUEST['Id']); 
$Id = isset($_POST['Id']);
$technical_skill = xssCheck($_POST['technical_skill']);

$query_update = "UPDATE `technical_skill` SET `technical_skill`=:technical_skill WHERE `Id`=:Id";

$result = $pdo->prepare($query_update);

$result->bindParam(":Id",$Id);
$result->bindParam(":technical_skill",$technical_skill);
     
if($result->execute()){
// $dberror= $res->errorInfo();
 //     echo "<pre>";
 //      print_r($dberror);exit;


          
header('location:edit.php?mesg=success');
               // echo "data updated";
}else{
header('location:edit.php?mesg=failed');
 }
} 
?>

 


<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  
<?php if(isset($_REQUEST['mesg']) && $_REQUEST['mesg']=="success"){ ?>
<div style="color: green"; class="success" name="success" id="success" ><h3>Data updated successfully</h3></div>
<?php } ?>
<?php if(isset($_REQUEST['mesg']) && $_REQUEST['mesg']=="failed"){?>
<div style="color:red"; class="failed" name="failed" id="failed"><h3>Failed to update the data.</h3></div>
<?php }?>

<input type="hidden" name="Id" value="<?php echo $data['Id'];?>"> 

<h1 style="margin-top: 250px;margin-left: 20px;">Technical Skill:</h1>

<input type="text" name="technical_skill" value="<?php if(isset($data['technical_skill']))echo $data['technical_skill'];?>"><br><br><br>

<button type="submit" name="update" id= "update" class="savebtn">UPDATE</button>
</body>
</html>