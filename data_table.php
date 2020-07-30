<?php
$title = "Welcome";                   // (1) Set the title
include "include/header.php";   
?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<?php
if(isset($_REQUEST['record_status']) && $_REQUEST['record_status']=='delete'){
$Id =base64_decode($_REQUEST['Id']);
$sql = 'DELETE FROM `technical_skill` WHERE Id=:Id';
 $result = $pdo->prepare($sql);
 $result->bindParam(":Id",$Id);
if($result->execute()){

             
                echo "data deleted";
               }else{
              echo "failed to delete";
            }
 // $dberror= $result->errorInfo();
 //                echo "<pre>";
 //                 print_r($dberror);exit;
}

?>


  
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
table{
    margin-top: 20px;
    margin-bottom: 5px;
}
input[type=text], select, textarea {
  margin-top: 0px;
  margin-left:250px; 
  width: 50%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
.savebtn{
  width: 10%;
  margin-right: 500px;
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
  <div class="vertical-menu">
  <a class="<?php active('dashboard.php');?>" href="dashboard.php">Dashboard</a>
  <a href="profile.php">Profile</a>
  <a class="<?php active('technical_skill.php');?>" href="technical_skill.php">Technical skill</a>
  <a class="<?php active('data_table.php');?>"href="data_table.php">DataTable</a>
  <a href="#">Change password</a>
</div>
<?php 
$query_technical_skill ="SELECT * FROM technical_skill";
   $res = $pdo->query($query_technical_skill);
?>
<table id="result" class="display" width="50%"  border="1" cellpadding="5" cellspacing="5" align="center">
<thead>

<tr>
<th>Sl_No.</th>
<th>Technicalskill</th>
<th>ACTION</th>
</tr>
</thead>
<?php foreach ($res as $data) 
{
?>
<tr>
<td><?php echo ($data['Id']);?></td>

<td><?php echo ($data['technical_skill']);?></td>
<td><table border="0" cellspacing="5px" cellpadding="0px"
style="margin-left: 100px;margin-bottom: 0px;margin-top:0px;"><td>
<a href="javascript:void(0)" onclick="editRecord(<?php echo $data['Id']; ?>)"><button  class="editRec" name ="editRec">Edit</button></a>
</td><td><a onclick="return confirm('are you sure want to delete this?')" href="data_table.php?record_status=delete&Id=<?php echo base64_encode($data['Id']); ?>"><button class="
" style="background-color:red">Delete</button></a></td></table></td>
</tr>
<?php
} ?>
</table>
<div id="formedit" class="formedit " style="display:none;">
<form  method = "post" >
<h3 style="margin-top: 5px;margin-left: 10px; text-align:center;">Sl.No:</h3>
<input type="text" id="rid" name="rid" value="">
<h1 style="margin-top: 5px;margin-left: 20px;">Technical Skill:</h1>
<input type="text" id="technical_skill" name="technical_skill" value="">
<a><button type="submit" name="update" id= "update" class="savebtn">UPDATE</button></a>
</form>
</div>
 
 <script>
//$(document).ready(function(){
function editRecord(rec_id){ 
   // alert (rec_id);
   //var edit_id = rec_id;
   // alert(edit_id);
   //return false;
   //$('#rid').val(rec_id);
  $.ajax({
         url:'ajax_controllerf.php',
         method:'post',
         data:{operation:'showRecord',EID:rec_id},
         success:function(response){
          //alert(response);
          //return false;
          // console.log(data);
         var data =  JSON.parse(response);
        //console.log(data['Id']);
         $('#rid').val(data['Id']);
         $('#technical_skill').val(data['technical_skill']);
      }
  });
$("#formedit").show();
}

$("#update").click(function(){
      var Id =$('#rid').val();
      var technical_skill =$('#technical_skill').val();
  
    //var result = $("#formedit").serializeArray();
    //alert(result);
    $.ajax({
        url:"ajax_controllerf.php",
        method:"post",
        data:{rec_id:Id,oper:'updateRecord',technical_S:technical_skill},
       success:function(response){
   $( ".savebtn" ).load( "data_table.php" );
      // window.location ('data_table.php');

    // alert(response);
}
    });
        
  });
</script>

</body>
</html>