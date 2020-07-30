<?php
$title = "Welcome";                   // (1) Set the title
include "include/header.php";
//include "include/config.php";                 // (2) Include the header
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="stylefile\laystyle.css">
<style>
  .password{
    padding-bottom: 100px;
  }
  </style>
</head>
<body>
<?php
//session_start();
  if(isset($_POST['login'])){// && $_SERVER["REQUEST_METHOD"] == "POST"){
   //echo "hh";exit;
   // Getting username and password
        $username=$_POST['username'];
        $password=$_POST['password'];
    //data on the basis of username and password 
    $query_login ="SELECT * FROM `registration` WHERE username = :username  and password = :password";
    $res = $pdo->prepare($query_login);
    $res->bindParam(":username", $username);
    $res->bindParam(":password", $password);
    $res->execute();
    $count=$res->rowCount();
    if ($count > 0) {
      $row =$res->fetchAll(PDO::FETCH_ASSOC);
      //echo "<pre>";print_r($row);
      //exit;
      //echo $row[0]['Id'];exit;
      $_SESSION['user_id']=$row[0]['id'];
      $fullname=$row[0]['firstname']." ".$row[0]['middlename']." ".$row[0]['lastname'];
      $_SESSION['fullname']=$fullname;
      $_SESSION['username']=$row[0]['username'];
      $_SESSION['password']=$row[0]['password'];
      //echo $_SESSION['fullname'];exit;
      //echo $_SESSION['username'];exit;
      //echo $_SESSION['password'];exit;
    if(!empty($_POST["remember"])) {
        setcookie ("user_login",$_SESSION["username"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("userpassword",$_SESSION["password"],time()+ (10 * 365 * 24 * 60 * 60));
    }else{
        if(isset($_COOKIE["user_login"])) {
            setcookie ("user_login","");    
        if(isset($_COOKIE["userpassword"])) {
            setcookie ("userpassword","");
        }    
     }
    }  
    header('location:dashboard.php');
      // exit;
      //echo"<pre>";print_r($row);
     // exit;
    }else{
      echo" record not found";
      //exit;
      header('location:register.php');
    }
}
?>

<h2>Login Here</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  </div>

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" name="username" id="username" placeholder="Enter Username"value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" required>

    <label for="password"><b>Password</b></label>
    <input type="password" name="password" id="password" placeholder="Enter Password" value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>"required>
        
    <button type="submit" name="login" id="login">Login</button>
    <label>
      <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["user_login"])) { ?>  <?php } ?> > Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
   <span class="password">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>
<?php
include "include/footer.php";                 // (3) Include the footer
?>