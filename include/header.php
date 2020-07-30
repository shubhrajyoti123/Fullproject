<?php
session_start();
include "include/config.php";    // (2) Include the config.php
include "include/function.php";
?>  
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="stylesheet\design.css">
   <title><?php echo $title; ?></title>
 <?php
function active($current_page){
  $uri_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $uri = end($uri_array);  
  if($current_page == $uri){
      echo 'active'; //class name in css 
  } 
}


?>

</head>
<body>
  <div class="header">
  <h1>SIKHSHA</h1>
  <p>IT GIVES BETTER KNOWLAGDGE FOR BRIGHTER FUTURE.</p>
</div>
<div class="topnav">
  <a  class="<?php active('home.php');?>" href="home.php">Home</a>


<?php if(isset($_SESSION['user_id']) == ""){?>

  <a class="<?php active('register.php');?>" href="register.php">Registration</a>
  <a class="<?php active('login.php');?>"href="login.php">Login</a>
 <?php } ?> 


  <a class="<?php active('about.php');?>" href="about.php">About us </a>

   <?php if(isset($_SESSION['user_id'])!=""){?>
  <a class=""href="dashboard.php"><span> Welcome <?php echo $_SESSION['fullname'];?></span></a>
  <a class="<?php active('logout.php');?>" href="logout.php">Logout </a>

<?php } ?> 


</div>







<!-- end header -->