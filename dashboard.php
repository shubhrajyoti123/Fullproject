<?php
$title = "Welcome";                   // (1) Set the title
include "include/header.php";           // (2) Include the header
// echo "<pre>";
// print_r($_SESSION);
// echo $_SESSION['user_id'];exit;


if($_SESSION['user_id'] == ""){
  // echo "here";exit;
  header('location:login.php');
  exit;
}

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

</style>
</head>
<body>
  

<div class="vertical-menu">
  <a class="<?php active('dashboard.php');?>" href="dashboard.php">Dashboard</a>
  <a href="profile.php">Profile</a>
  <a href="technical_skill.php">Technical skill</a>
  <a href="data_table.php">Data table</a>
  <a href="#">Change password</a>
 </div>
<!-- <a href="logout.php">Logout</a> -->


<div class="dash-text">
  <h1 style="color: green;margin-left: 200px;">"HELLO!"</h1>
  <h1 style="margin-left: 200px;"><span><?php echo $_SESSION['fullname'];?></span></h1>
  <h1 style="color:green;margin-left: 200px;">"WELCOME" </h1>
  <h2 style="margin-left: 200px;">TO </h2>
  <h2 style="margin-left: 200px;">SIKHSHA.</h2>
  <h3 style="text-align: center;margin-left:200px;">IT GIVES BETTER KNOWLAGDGE FOR BRIGHTER FUTURE.</h3>
</div>
 
</body>
</html>
<?php
include "include/footer.php";                 // (3) Include the footer
?>