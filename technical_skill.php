<?php
$title = "Welcome";                   // (1) Set the title
include "include/header.php";   
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.vertical-menu {
  float: left;
  list-style-type: none;
  margin-bottom: 0px;
  background: #ccc;
  height: 1600px;only for demonstration, should be removed
  height: 100%;
  padding: 0px;
  width: 16%;
  background-color: #669999;
  position: relative; /* Make it stick, even on scroll */
  overflow-y: auto; /* Enable scrolling if the sidenav has too much content */
}
.vertical-menu a {
   background-color:#669999;
  color: white;
  display: block;
  padding: 20px;
  text-decoration: none;

}
.vertical-menu a.active{
   background-color: #003300;
}

.vertical-menu a:hover {
  background-color: #ccc;

}




.btnadd {
	width: 20%;
  border: none;
  background-color: green;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  display: block;
  float:right;
}
table{
width: 50%;
margin-top: 100px;
margin-left: 350px;
margin-bottom: 100px;
height: 10px;
}

</style>
</head>
<body>
<div class="vertical-menu">
  <a class="" href="dashboard.php">Dashboard</a>
  <a class="" href="profile.php">Profile</a>
  <a class="<?php active('technical_skill.php');?>" href="technical_skill.php">Technical skill</a>
  <a href="data_table.php">Data table</a>
  <a href="#">Change password</a>
  </div> 
 



<?php
  // $query_profile ="SELECT * FROM `registration` WHERE Id = '" .$_SESSION['user_id']."'";
	$query_technical_skill ="SELECT * FROM technical_skill";
   $res = $pdo->query($query_technical_skill);


   // $res->bindParam(":Id",$Id);
          
   //          $res->execute();

   //           $rresult= $res->fetch(PDO::FETCH_LAZY);
   //          echo "<pre>";
   //           print_r($rresult);
   //          exit;
           //  $count=$res->rowCount();

           // if($count > 0){
           // $data =$res->fetch(PDO::FETCH_ASSOC);
           //    echo "<pre>";print_r($data);
           //    exit;
           // }


?>




<!-- <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->

<h1 style="color: black ;background-color: gray;padding:15px;margin-top: 0; ">TECHNICAL SKILL</h1>
<a href="add_technical_skill.php"><button class="btnadd">ADD</button></a>

<?php if(isset($_REQUEST['mesg']) && $_REQUEST['mesg']=="success"){ ?>
 <div style="color: green"; class="success" name="success" id="success" ><h3>Data Deleted successfully</h3></div>
 <?php } ?>
 <?php if(isset($_REQUEST['mesg']) && $_REQUEST['mesg']=="failed"){?>
 <div style="color:red"; class="failed" name="failed" id="failed"><h3>Failed to Delete the data.</h3></div>
 <?php }?>



<table border="3" cellpadding="5" cellspacing="5" align="center" >
<tr>
	<th>SI NO.</th>
	<th>TECHNICAL SKILL</th>
	<th>ACTION</th>
</tr>

<?php foreach ($res as $data) 
	# code...


{
?>
<tr>
	<td><?php echo $data['Id'];?></td>
	<td><?php echo $data['technical_skill'];?></td>
   <td><table border="0" cellspacing="10px" cellpadding="0px"
style="margin-left: 100px;margin-bottom: 0px;margin-top:
0px;"><td>

	<a href="edit.php?Id=<?php echo base64_encode($data['Id']); ?>"><button class=" ">Edit</button></a>


</td><td><a onclick="return confirm('are you sure want to delete this?')" href="delete.php?record_status=delete&Id=<?php echo base64_encode($data['Id']); ?>"><button class="
" style="background-color:red">Delete</button></td></table></td>

</tr>
<?php
}?>
</table>



</body>
</form>
</html>



 <?php
include "include/footer.php";                 // (3) Include the footer
?> 