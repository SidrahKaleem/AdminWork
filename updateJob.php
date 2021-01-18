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
.error {color: #FF0000;}
input[type=submit] {
  width: 17%;
  background-color: #2F4F4F;
  font-weight:bold;
  font-family:Times New Roman;
  color: white;
  font-size:20px;
  padding: 6px 2px;
  margin: 2px 0;
  border-radius: 4px;
  cursor: pointer;
}
input[type=submit]:hover {
  background-color: #0E6655;
}
input[type=option], select {
  width: 20%;
  padding: 10px 16px;
  margin: 2px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit]:hover {
  background-color: #0E6655;
}
input[type=text], select {
  width: 20%;
  padding: 12px 20px;
  margin: 2px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
 </style>
</head>
<?php
$Err="";
$ck=true;
$tx="";
if(isset($_POST['submit'])){
	
	if (empty($_POST["txt"])) {
    $Err = "Field is required";
	echo "lllllllllllllllllllllllllllll";	
	$ck=false;
	
  }
  else if(!preg_match("/^[a-z A-Z]*$/",$_POST["txt"])) 
	  {
		$Err = "Only Alphabates Allowed"; 
	
	  }
	
  else {
    $tx = $_POST["txt"];
  }
	
$selected_til = $_POST['Color'];  // Storing Selected Value In Variable
$fld=$_POST['field'];
//$tx=$_POST['txt'];

if($ck==true)
{
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
$sqll="Update jobdetails SET $fld='$tx' WHERE Title='$selected_til'";
try{
   $row=$conn->query($sqll);
   
   }
   catch(PDOException $e){
	   echo"connection failed".$e->getMessaage();
   }
   
   $conn=null;


 $Err="Data Updated Sucessfully..!!";  // Displaying Selected Value
}
}
?>
<body>
<div class="main subpage">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
          <li><a href="adminPage.html">Home Page</a></li>
          <li class="active"><a href="updateJob.php"><span>Update Job</span></a></li>
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
		<p><font size="6" face="verdana"> <b> Update Job </b> </font></p>
		<p> <font size="4" face="Trebuchet MS"> Which Job You Want To Upate!" </p>
		 
		<form action="#" method="post">
Select Job Titles <select name="Color">
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
<?php
		   
		   }
		   catch(PDOException $e){
			   echo"connection failed".$e->getMessaage();
		   }
		   ?>
		  <br> Select Field to Update <select name="field">
		   <option value="Title">Title</option>	
			<option value="Department">Department</option>
			<option value="Position">Position</option>
			<option value="Status">Status</option>
			<option value="SalaryMin">Minimum Salary</option>
			<option value="SalaryMax">Maximum Salary</option>
			<option value="JobPosted">Job Posted Date</option>
			<option value="JobLast">Last Date</option>	
			<option value="Gender">Gender</option>
			<option value="AgeMin">Minimum Age</option>
			<option value="AgeMax">AgeMax</option>
			<option value="Location">Location</option>	
			</select>
		   <br> </br>Enter New Value: <input type="text" name="txt" size="7"/> <span class="error"><?php echo $Err;?></span>
		   <?php
		   
		 
		   $conn=null;
	 ?>
	</br> <input type="submit" name="submit" value="Change!" /></br>
</form>

	 
	 
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
