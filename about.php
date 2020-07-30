<?php
$title = "Welcome";                   // (1) Set the title
include "include\header.php";                 // (2) Include the header
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="stylesheet\design.css">

<style>
  body{
    margin: 0;
    padding: 0:
      }
  .container{
    width: 100%;
    height: auto;
    display: flex;
    align-items: flex-start;
    flex-wrap: wrap;
  }
  .about{
    width: 100%;
    height: 600px;
    background-image: url(photo-1559090336-65e03f0fb62f.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;

  }
  .text{

    font-size: 30px;
    color: #fff;
    font-family: sans-serif;
    text-shadow: 0px 15px 12px #000;
  }
  .line{

width: 200px;
height: 8px;
background-color: #17ff8d;
display: block;
position: relative;
border-radius: 5px;
left: 20%;
box-shadow: 0px 15px 12px 0px #000;
}
.content{

  width: 100%;
  height: auto;
  background-color: #17ff8d;
  font-size: 23px;
  font-family: audiowide;

color: #333;
line-height: 30px;
text-align: center;
}
b{
  font-size: 50px;
  color: #000;
  font-weight: 500px;
}







</style>



</head>
<body>
	<div class="container">
<div class="about">
	<div class="text">
		<h1>About us</h1>
		<div class="line">
			
		</div>
	
</div>
<div class="content">
<p><b>I</b>n state schools each year that a pupil studies is given a number. Primary education starts in Year 1. Most pupils begin their secondary education at the age of 11 (Year 7), but in some HMC schools pupils join the school at 13+ (Year 9). At the age of 16 (the end of Key stage 4 and Year 11), all pupils take a series of exams called the General Certificate of Secondary Education (GCSE), usually in about eight to ten subjects, which must include English and Mathematics. Key Stage 5 is for pupils aged 16-18 (sometimes 19) and most schools take Advanced Level exams after a two-year course.</p>



	</div>

</div>
<?php
include "include/footer.php";                 // (3) Include the footer
?>
</body>
</html>