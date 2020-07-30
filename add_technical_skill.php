<?php
$title = "Welcome";                   // (1) Set the title
include "include/header.php"; 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  background-color: #ffffcc;
  
}
input[type=text], select, textarea {
  margin-left: 300px; 
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
if(isset($_REQUEST["save"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

$technical_skill = xssCheck($_POST['technical_skill']);

$technical_skill_query = "INSERT INTO TECHNICAL_SKILL (`technical_skill`) VALUES (:technical_skill)";

$Result = $pdo->prepare($technical_skill_query);

$Result->bindParam(":technical_skill", $technical_skill);

if( $Result->execute()){
header('location:add_technical_skill.php?mesg=success');
}else{
header('location:add_technical_skill.php?mesg=failed');
}
      // $dberror= $Result->errorInfo();
      //  echo "<pre>";
      // print_r($dberror);exit;

      //  $rresult= $res->fetch(PDO::FETCH_LAZY);
      // echo "<pre>";
      //  print_r($rresult);
      //  exit;

}
?>
	 


<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">


<?php if(isset($_REQUEST['mesg']) && $_REQUEST['mesg']=="success"){ ?>
 <div style="color: green"; class="success" name="success" id="success" ><h3>Data saved successfully</h3></div>
 <?php } ?>
 <?php if(isset($_REQUEST['mesg']) && $_REQUEST['mesg']=="failed"){?>
 <div style="color:red"; class="failed" name="failed" id="failed"><h3>Failed to save the data.</h3></div>
 <?php }?>








<h1 style="margin-top: 250px;margin-left: 20px;">Technical Skill:</h1>
<input type="text" name="technical_skill" value=""><br><br><br>
<button type="submit" name="save" id= "save" class="savebtn">Save</button>




</body>
</form>
</html>

<!-- <?php
include "include/footer.php";                 // (3) Include the footer
?> -->