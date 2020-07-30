<?php
$title = "Welcome";                   // (1) Set the title
include "include/header.php";
if($_SESSION['user_id'] == ""){
  // echo "here";exit;
  header('location:login.php');
  exit;
}
?>
<html>
<head>
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
table {
  border-collapse: collapse;
  margin-left: 300px;
  margin-bottom: 100px;
 }

</style>
</head>
<body>
 <div class="vertical-menu">
  <a class="" href="dashboard.php">Dashboard</a>
  <a class="<?php active('profile.php');?>" href="profile.php">Profile</a>
  <a class="" href="data_table.php">Data table</a>
  <a href="#">Change password</a>
</div> 

<?php
   //$mesgErr="";
  $query_profile ="SELECT * FROM `registration` WHERE Id = :Id";
   $res = $pdo->prepare($query_profile);


   $res->bindParam(":Id",$_SESSION['user_id']);
          
            $res->execute();

           //  $rresult= $res->fetch(PDO::FETCH_LAZY);
            //echo "<pre>";
            //print_r($res);
            //exit;
            //$count=$res->rowCount();

           //if($count > 0){
           $data =$res->fetch(PDO::FETCH_ASSOC);
           $a=$data["branch"];
           $b=explode(",",$a);
            //echo "<pre>";print_r($data);
            // exit;
           
           //echo $data['passportphoto'];exit;
?>

<?php
if(isset($_REQUEST['update'])&& $_SERVER["REQUEST_METHOD"] == "POST"){
// if(isset($_REQUEST["updat"])){
  $passportphoto=$_FILES["passportphoto"]["name"];
$tmp_name=$_FILES["passportphoto"]["tmp_name"];
$path="upload/".$passportphoto;
$file1=explode(".",$passportphoto);
 // print_r($file1);exit;

$ext=$file1[1];


// print_r($link);exit;

$allowed= array("jpg","png","gif");
if(in_array($ext,$allowed)){
  move_uploaded_file($tmp_name, $path);


  }


   //   $Id = isset($_SESSION['user_id']);
   //  $passportphoto = xssCheck($_POST['passportphoto']);
   // $query_update = "UPDATE `registration` SET`passportphoto`=:passportphoto WHERE `Id`=:Id";
   //  $result = $pdo->prepare($query_update);
   // $result->bindParam(":Id",$_SESSION['user_id']);
   //  $result->bindParam(":passportphoto",$passportphoto);
   //  $result->execute();


   //   if($result->execute()){
   //    echo "good";
   //   }else{
   //    echo "bad";
   //   }
       // $dberror= $result->errorInfo();
       //      echo "<pre>";
       //    print_r($dberror);exit;


 
     $Id =   xssCheck($_SESSION['user_id']);   
     $firstname = xssCheck($_POST['firstname']);
      $middlename =xssCheck($_POST['middlename']);
      $lastname = xssCheck($_POST['lastname']);
      $username = xssCheck($_POST['username']);
      $fathername =xssCheck($_POST['fathername']);
      $mothername =xssCheck($_POST['mothername']);
      $gender =$_POST['gender'];

      $branch=$_POST['branch'];
      $branch=implode(",",$branch);
     
      $email = xssCheck($_POST['email']);
      $birthday =xssCheck($_POST['birthday']);
      $address =xssCheck($_POST['address']);
      $district =xssCheck($_POST['district']);
      $country =$_POST['country'];
       $passportphoto =$_POST['passportphoto'];
        $passportphoto=implode(",",$file1);
     
$query_update = "UPDATE `registration` SET `firstname`=:firstname ,`middlename`=:middlename,`lastname`=:lastname,`username`=:username,`fathername`=:fathername,`mothername`=:mothername,`gender`=:gender,`branch`=:branch,`email`=:email,`birthday`=:birthday,`address`=:address,`district`=:district,`country`=:country,`passportphoto`=:passportphoto  WHERE `Id`=:Id";
  $result = $pdo->prepare($query_update);

            $result->bindParam(":Id",$_SESSION['user_id']);
            $result->bindParam(":firstname", $firstname);
            $result->bindParam(":middlename", $middlename);
            $result->bindParam(":lastname", $lastname);
            $result->bindParam(":username",$username);
            $result->bindParam(":fathername", $fathername);
            $result->bindParam(":mothername", $mothername);
            $result->bindParam(":gender",$gender);
            $result->bindParam(":branch", $branch);
            $result->bindParam(":email", $email);
            $result->bindParam(":birthday", $birthday);
            $result->bindParam(":address", $address);
            $result->bindParam(":district", $district);
            $result->bindParam(":country", $country); 
             $result->bindParam(":passportphoto",$passportphoto);
             $result->execute();
            // $count=$result->rowCount();
           // if ($count > 0) {
        
           //$result->execute();
           //  $dberror= $result->errorInfo();
           // echo "<pre>";
           // print_r($dberror);exit;
           

            if( $result->execute()){
          
            header('location:profile.php?mesg=success');
            }else{
            header('location:profile.php?mesg=failed');

           }
// $dberror = $result->errorInfo();
     // $rresult= $result->fetch(PDO::FETCH_LAZY);
     //        echo "<pre>";
     //        rint_r($rresult);
     //        exit;
  //$count=$result->rowCount();
// print_r($dberror);exit;
  
//    echo'data updated';exit;
//   }else{
//    echo'Error data updated';exit;
//   }
   
    }
        
    
 



?>



<h2  align="center">USER DETAILS</h2>

<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
  
<table width="1000"  border="2" cellpadding="15" cellspacing="50" align="center">
    
    <tr><th>Firstname:</th>   <td><input type="text" name="firstname"value="<?php if (is_array($data)){
      $firstname=$data['firstname'];
      echo $data['firstname'];}?>"></td></tr>

    <tr><th>Middlename:</th>  <td><input type="text" name="middlename"value="<?php if (is_array($data)){
      $middlename=$data['middlename']; echo $data['middlename'];} ?>"></td></tr>
       
    <tr><th>Lastname:</th><td><input type="text" name="lastname"value="<?php if (is_array($data)){
      $lastname=$data['lastname'];
      echo $data['lastname'];}?>"></td></tr>
       <tr><th>Username:</th> <td><input type="text" name="username"value="<?php if (is_array($data)){
      $username=$data['username'];
      echo $data['username'];}?>" ><br><br><br>
      </td></tr>
      
    <tr><th>Fathername:</th>  <td><input type="text" name="fathername"value="<?php if (is_array($data)){
      $fathername=$data['fathername'];  echo $data['fathername'];}?>"></td></tr>
    <tr><th>Mothername:</th>  <td><input type="text" name="mothername"value="<?php if (is_array($data)){
      $mothername=$data['mothername'];echo $data['mothername'];} ?>"></td></tr>
    <tr><th>Gender:<?php $data['gender']; ?></th> <td>
      <input type="radio" name="gender"value="male"
      <?php
       if ( $data['gender']=="male"){
        echo"checked";
        } ?>
      >Male
      <input type="radio" name="gender"value="female"
      <?php
       if ( $data['gender']=="female"){
        echo"checked";
        } 
      ?>>Female
      <input type="radio" name="gender"value="other"
      <?php
       if ( $data['gender']=="other"){
        echo"checked";
        } 
        
      ?>>Other
    </td></tr>

<tr><th>Branch:</th> <td>
      <input type="checkbox" name="branch[]" value="CSE"
       <?php
       if (in_array("CSE",$b)){
        echo"checked";
        } 
        
      ?>>CSE
      <input type="checkbox" name="branch[]" value="ME"
     <?php
       if (in_array("ME",$b)){
        echo"checked";
        } 
      ?>>ME
      <input type="checkbox" name="branch[]" value="IT"
       <?php
       if (in_array("IT",$b)){
        echo"checked";
        } 
        ?>>IT
      <input type="checkbox" name="branch[]" value="ECE"
     <?php
       if (in_array("ECE",$b)){
        echo"checked";
        } 
        ?>>ECE
      <input type="checkbox" name="branch[]" value="EE"
    <?php
       if (in_array("EE",$b)){
        echo"checked";
        } 
      ?>>EE
      <input type="checkbox" name="branch[]" value="CE"
      <?php
       if (in_array("CE",$b)){
        echo"checked";
        } 
      ?>>CE
    <tr><th>Email:</th> <td><input type="text" name="email"value="<?php if (is_array($data)){
      $email=$data['email'];
      echo $data['email'];}?>"></td></tr>
    <tr><th>Birthday:</th><td><input type="date" name="birthday"value="<?php if (is_array($data)){
      $birthday=$data['birthday'];
      echo $data['birthday'];}?>"></td></tr>

    <tr><th>Address:</th><td><input type="text" name="address"value="<?php if ($data){
      $address=$data['address'];  echo $data['address'];}?>"></td></tr>
        <tr><th>District:</th>    
        <td><input type="text" name="district"value="<?php if (is_array($data)){
      $district=$data['district'];  echo $data['district'];}?>"></td></tr></td></tr>


    <tr><th>Country:</th><td>
      <select id="country" name="country">
      <option value="australia"<?php if($data["country"]=='australia'){echo "selected";} ?>>Australia</option>
      <option value="canada"<?php if($data["country"]=='canada'){echo "selected";} ?>>Canada</option>
      <option value="india"<?php if($data["country"]=='india'){echo "selected";} ?>>India</option>
      <option value="usa"<?php if($data["country"]=='usa'){echo "selected";} ?>>USA</option>
      </select>
      </td></tr> 

      <tr><th>Passphoto photo</th><td><input type="text" name="passportphoto" value="<?php
      echo $data['passportphoto'];?>">
<br>
 <form method="post" enctype="multipart/form-data"> 
File Update<input type="file" name="passportphoto"><br> <br>
  <!-- <input type="submit" name="updat" value="update"> -->
</form> 
</td></tr> 

<table> 
 <tr><th></th><td><button type="submit" name="update" id= "update" class="">UPDATE</button></td></tr>
</table>
</form>


</body>
</html>
<?php
include "include/footer.php";                 // (3) Include the footer
?>