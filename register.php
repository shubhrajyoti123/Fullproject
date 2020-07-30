<?php
$title = "Welcome";                   // (1) Set the title
include "include/header.php"; 
// error_reporting(0);                // (2) Include the header
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="stylefile\design.css">
</head>
<body>
<?php

  $firstnameErr ="";
  $lastnameErr="";
  $usernameErr="";
  $passwordErr="";
  $emailErr = "" ;
  $genderErr ="";
  $mesgErr="";
  $photoErr="";
  $imageErr="";

  $firstname =$lastname=$username=$password= $email = $gender ="";

if(isset($_REQUEST["Register"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
      $firstname = xssCheck($_POST['firstname']);
      $middlename = $_POST['middlename'];
      $lastname = xssCheck($_POST['lastname']);
      $username = xssCheck($_POST['username']);
      $password = xssCheck($_POST['password']);
      $fathername = $_POST['fathername'];
      $mothername = $_POST['mothername'];
     // $gender = $_POST['gender'];
      //$branch = $_POST['branch'];
      $email = xssCheck($_POST['email']);
      $birthday = $_POST['birthday'];
      $address = $_POST['address'];
      $district = $_POST['district'];
      $country = $_POST['country'];

      if(isset($_POST['branch'])){
         $branch = implode(",", $_POST['branch']);
      }
      $query_cnt ="SELECT COUNT(username) as user_cnt                       
              FROM `registration` 
              WHERE username = :username";
      $res = $pdo->prepare($query_cnt);
      $res->bindParam(":username",$username);
      $res->execute();
      //echo $username;exit;
      //$usr_name_chk = $res->rowCount();
      $row = $res->fetch(PDO::FETCH_ASSOC);
      $usr_name_chk = $row['user_cnt'];
    //echo $usr_name_chk;exit;
      if($usr_name_chk >0){
        //header('location:?mesg=user_exist');
        $mesgErr="Username alredy exist";
        $code=0;
        //echo $mesgErr;
        //exit;
      }  

    // echo "<pre>";print_r($_REQUEST);exit;
        if(empty($_POST["firstname"])){
          $firstnameErr = "Required field";
          $code=0;
        }else if(!preg_match("/^[a-zA-Z ]*$/",$firstname)){
          $firstnameErr = "Only letters and white space allowed";
          $code=0;
         }else{
           $firstnameErr="";
           $code=1;
          }
  



        if(empty($_POST["lastname"])){
           $lastnameErr = "Required field";
           $code=0;
        }else if(!preg_match("/^[a-zA-Z ]*$/",$lastname)){
            $lastnameErr = "Only letters and white space allowed";
            $code=0;
         }else{
          $lastnameErr="";
          $code=1;
         }
            

  

        if(empty($_POST["username"])){
          $usernameErr = "Required field";
          $code=0;
        }else if(!preg_match('/^[a-z0-9]{6,10}$/',$username)){
           $usernameErr = "Only letters Numbers are also allowed. ";
           $code=0;
         }else{
           $usernameErr="";
           $code=1;
         }
  
   

        if(empty($_POST["password"])){
           $passwordErr = "Required field";
           $code=0;
        }else if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{4,20}$/',$password)){
          $passwordErr = "Upperletter ,lowerletter , number and a special character must be present.";
          $code=0;
         }else{
           $passwordErr="";
           $code=1;
          }
   
    
  
        if(empty($_POST["gender"])){
          $genderErr = "Required field ";
          //$code=0;
        }else{
            $gender = xssCheck($_POST["gender"]);
            //$code=1;
          }
         } 

        if(empty($_POST["email"])){
        $emailErr = "Required field";
        //$code=0;
        }else{
            // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
           $emailErr = "Invalid email format";
           //$code=0;
        }

   // echo $username;exit;
//echo $username;exit;
//checking username duplication
       

//image upload and validation
    if(isset($_FILES["passportphoto"]["name"]) && $_FILES["passportphoto"]["name"]!=""){
       $passportphoto = $_FILES["passportphoto"]["name"];
       $psprt_size =$_FILES["passportphoto"]['size'];
       //echo $psprt_size;
       //exit;
     // echo $passportphoto;exit;
       $fileExtAry=explode('.',$passportphoto);
    //   //print_r($fileExtAry);exit;
    // //   //echo $fileActualExt = $fileExtAry[1];exit;
      $fileActualExt = strtolower(end($fileExtAry));

       // //Image Extension Checked here
       $exten_image = array('gif','jpg','jpeg','png');

        if(in_array($fileActualExt,$exten_image)==false){


          $photoErr="Wrong extension for image. Only 'gif','jpg','jpeg','png' are accpect.";
          $code=0;
            //echo $photoErr;exit;
          //header('location:register.php?mesg=inv_img');
          //exit;
        }

      if($psprt_size>2000000){

        //header('location:register.php?mesg=vali_img');
        $imageErr="Image size is not valid.";
        $code=0;
         //   // echo $imageErr;
        //exit;
      }
      if($code!=0){
        // echo"here";
        // exit; 
      move_uploaded_file($_FILES["passportphoto"]["tmp_name"],"upload/".$passportphoto);
      }
    }

//echo  $file_name;exit;
if ($usr_name_chk==0 && $code!= 0){
    // echo "here";
    // exit;
  $query = "INSERT INTO REGISTRATION (`firstname`, `middlename`, `lastname`, `username`, `password`, `fathername`, `mothername`, `gender`, `branch`, `email`, `birthday`, `address`, `district`, `country`,`passportphoto`) VALUES (:firstname,:middlename,:lastname,:username,:password,:fathername,:mothername,:gender,:branch,:email,:birthday,:address,:district,:country,:passportphoto)";

    //  echo $query."<br><br><br>";
    //  echo $firstname."<br>";
    //  echo $middlename."<br>";
    //  echo $lastname."<br>";
    // echo $username."<br>";
    // echo $password."<br>";
    // echo $fathername."<br>";
    // echo $mothername."<br>";
    // echo $gender."<br>";
    // echo $branch."<br>";
    // echo $email."<br>";
    // echo $birthday."<br>";
    // echo $address."<br>";
    // echo $district."<br>";
    // echo $country."<br>";
    // exit;
  $rResult = $pdo->prepare($query);
              
                $rResult->bindParam(":firstname", $firstname);
                $rResult->bindParam(":middlename", $middlename);
                $rResult->bindParam(":lastname", $lastname);
                $rResult->bindParam(":username",$username);
                $rResult->bindParam(":password", $password);
                $rResult->bindParam(":fathername", $fathername);
                $rResult->bindParam(":mothername", $mothername);
                $rResult->bindParam(":gender", $gender);
                $rResult->bindParam(":branch", $branch);
                $rResult->bindParam(":email", $email);
                $rResult->bindParam(":birthday", $birthday);
                $rResult->bindParam(":address", $address);
                $rResult->bindParam(":district", $district);
                $rResult->bindParam(":country", $country);
                $rResult->bindParam(":passportphoto", $passportphoto);
               // $rResult->execute();
             // $dberror= $rResult->errorInfo();
             // echo "<pre>";
             // print_r($dberror);exit;
               // $rResult->bindParam(":uploadsign", $uploadsign);
                //$rResult->execute();
                //echo"<pre>";print_r($rResult);exit;

     // $message = ($rResult->execute())? "success" : "failed" ;

     // echo $message;


    if($rResult->execute()){
                  //echo "Successfully inserted";
                  header('location:register.php?mesg=success');
                   exit;
                }else{
                   header('location:register.php?mesg=failed');
                    //echo"Not";
                   exit;
                 }
   }      

}
?>
  <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
 
  <?php if(isset($_REQUEST['mesg']) && $_REQUEST['mesg']=="success"){ ?>
  <div style="color: green"; class="success" name="success" id="success" >Thank you for registration. 
  Registration successfull. </div>
  <?php } ?>
  <?php if(isset($_REQUEST['mesg']) && $_REQUEST['mesg']=="failed"){?>
  <div style="color:red"; class="failed" name="failed" id="failed">Registration failed.Try again</div>
  <?php }?>

  
 
<div class="container">
<h1>Register Here</h1>
<p>Please fill in this form to create an account.</p>
<p><span class="error">* required field</span></p>
    
<h3>Full Name:</h3>
<input type="text" name="firstname"  value="<?php if(isset($_REQUEST['firstname'])){echo $_REQUEST['firstname'];}?>" placeholder="Firstname">
<span class="error">* <?php echo $firstnameErr;?></span><br><br><br>

<input type="text" name="middlename" value="<?php  if(isset($_REQUEST['middlename'])){ echo $_REQUEST['middlename'];}?>"  placeholder="Middle Name"><br><br><br>
    
<input type="text" name="lastname" value="<?php if(isset($_REQUEST['lastname'])){ echo $_REQUEST['lastname'];}?>" placeholder="Lastname">
    <span class="error">* <?php echo $lastnameErr;?></span><br><br><br>
    
<h3>USER Name:</h3>
<input type="text" name="username" value="<?php echo $username;?>">
<span class="error">* <?php echo $usernameErr;?> <?php echo $mesgErr;?> </span><br><br><br>
<h3>PASSWORD:</h3>
<input type="password" name="password" value="<?php echo $password;?>">
<span class="error">*<?php echo $passwordErr;?></span><br><br><br>
<h3>Father Name:</h3>
<input type="text" name="fathername" value="<?php if(isset($_REQUEST['fathername'])){ echo $_REQUEST['fathername'];}?>"><br>
<h3>Mother Name:</h3>
<input type="text" name="mothername" value="<?php if(isset($_REQUEST['mothername'])){ echo $_REQUEST['mothername'];}?>"><br>
<h3>Gender:</h3>
<input type="radio" name="gender"<?php if (isset($gender) && $gender=="male") echo "checked";?> value="male" > Male<br><br>
<input type="radio" name="gender"<?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female<br><br>
<input type="radio" name="gender"<?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"> Other<span class="error">* <?php echo $genderErr;?></span>
<br><br>
<h3>Branch:</h3><input type="checkbox" name="branch[]" value="cse">CSE
                    <input type="checkbox" name="branch[]" value="me">ME
                    <input type="checkbox" name="branch[]" value="it" >IT
                    <input type="checkbox" name="branch[]" value="ece" >ECE
                    <input type="checkbox" name="branch[]" value="ee" >EE
                    <input type="checkbox" name="branch[]" value="ce" >CE<br><br><br>
<h3>E-mail:</h3>
<input type="email" name="email" value="<?php if(isset($_REQUEST['email'])){ echo $_REQUEST['email'];}?>">
<span class="error">* <?php echo $emailErr?></span><br><br><br>
<h3>Birthday:</h3>
<input type="date" name="birthday" value="<?php  if(isset($_REQUEST['birthday'])){ echo $_REQUEST['birthday'];}?>"><br><br><br>
<h3>Address:</h3>
<input type="text" name="address" value="<?php  if(isset($_REQUEST['address'])){ echo $_REQUEST['address'];}?>"><br>
<label for="district"><h3>District:</h3></label>
<select id="district" name="district">
      <option value="anugul">Anugul</option>
      <option value="baleswar">Baleswar</option>
      <option value="bhadrak">Bhadrak</option>
      <option value="Kendrapara">Kendrapara</option>
      </select><br>
<label for="country"><h3>country:</h3></label>
      <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="india">India</option>
      <option value="usa">USA</option>
      </select><br><br>

<h3> Passport Photocopy: <input type="file" name="passportphoto"> </h3>
<span class="error">* <?php echo $photoErr;?><?php echo $imageErr;?></span>
 
    <!-- <h3> Upload Signature: <input type="file" name=""></h3><br><br>  -->
<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

<button type="submit" name="Register" id= "Register" class="registerbtn">Register</button>
</div>
<div class="container login">
<p>Already have an account? <a href="login.php">Login</a>.</p>
 </div>




</form>
</body>
</html>

<?php
include "include/footer.php";                 // (3) Include the footer
?>