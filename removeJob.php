<!DOCTYPE>
<html>
<head>
<title>JOB Portal</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-titillium-600.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
<style type="text/css">
input[type=submit] {
  width: 15%;
  background-color: #2F4F4F;
  font-weight:bold;
  font-family:Times New Roman;
  color: white;
  font-size:18px;
  padding: 1px 2px;
  margin: 8px 0;
  border-radius: 2px;
  cursor: pointer;
}
input[type=submit]:hover {
  background-color: #0E6655;
}
input[type=option], select {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
 </style>
</head>
<body>
<div class="main subpage">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
          <li><a href="adminPage.html">Home Page</a></li>
          <li class="active"><a href="removeJob.php"><span>Remove Jobs</span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="logo">
        <h1>JOB Portal<h1>
      </div>
      <div class="clr"></div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
		<p><font size="6" face="verdana"> <b> Remove Job </b> </font></p>
		<p> <font size="4" face="Trebuchet MS"> Which Job You Want To Remove!!!" </p>
		Job Titles <br>
		<form  method="post">
<select name="Color">
		  <?php 
	$d="mysql:dbname=jobportal";
	$username="root";
	$password="";
	try{
	 $conn= new PDO ($d , $username,$password);
	 $conn-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
	echo"connection failed".$e->getMessage(); }
	$sql="SELECT Title FROM jobdetails ";
	$rowcount=0;
	try{
	$rows=$conn->query($sql);
	foreach($rows as $row){
	   $rowcount++;?>
	   			   <option value="<?php echo $row["Title"]; ?>"> <?php echo $row["Title"];?></option>			   
		   <?php
		   }
		   ?>
		   </select> <br> </br>
<input type="submit" name="submit" value="DELETE!" />
</form>
<?php
		   
		   }
		   catch(PDOException $e){
			   echo"connection failed".$e->getMessaage();
		   }
		   
		   if($rowcount==0)
			   echo"NO DATA";
		   $conn=null;
	 ?>
<?php
if(isset($_POST['submit'])){
$selected_val = $_POST['Color'];  // Storing Selected Value In Variable


  $d="mysql:dbname=jobportal";
  $username="root";
  $password="";
  try{
     $conn= new PDO ($d , $username,$password);
	 $conn-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
	   echo"connection failed".$e->getMessage();
	 }
//query
$sql="DELETE FROM jobdetails WHERE Title='$selected_val'";
try{
   $row=$conn->query($sql);
   
   }
   catch(PDOException $e){
	   echo"connection failed".$e->getMessaage();
   }
   
   $conn=null;


echo "You have Deleted :" .$selected_val;  // Displaying Selected Value
}
?>
	 
	 
      </div>
      <div class="sidebar">
        <div class="gadget">
          <h2 class="star"><span>Administration</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <li><a href="addJob.php"> <font size="3" face="verdana"><strong>Add Jobs</strong></a></li>
            <li><a href="removeJob.php"><strong>Remove Jobs</strong></a></li>
			<li><a href="viewJobs.php"><strong>View Jobs</strong></a></li>
			<li><a href="updateJob.php"><strong>Update Job</strong></a></li>
            <li><a href="viewUser.php"><strong>View Users</strong></a></li>
            <li><a href="RemoveUser.php"><strong>Remove Users</strong></a></li>
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</html>
