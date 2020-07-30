<!DOCTYPE html>
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

	

</body>
</html>