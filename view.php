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
  width: 17%;
  background-color: #2F4F4F;
  font-weight:bold;
  font-family:Times New Roman;
  color: white;
  font-size:20px;
  padding: 6px 2px;
  margin: 8px 0;
  border-radius: 4px;
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
          <li class="active"><a href="viewJobs.php"><span>View Jobs</span></a></li>
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
		<p><font size="6" face="verdana"> <b> View Job </b> </font></p>
		<p> <font size="4" face="Trebuchet MS"> Select Job to Show Details..!! </p>
		 
		<form action="#" method="post">
		Job Titles <select name="Color">
		  <?php 
	$d="mysql:dbname=jobportal";
	$username="root";
	$password="";
	try
	{
	 $conn= new PDO ($d , $username,$password);
	 $conn-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
	echo"connection failed".$e->getMessage(); 
	}
	
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
		   </select>
<input type="submit" name="submit" value="Show!" />
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
$sql="SELECT Title, Department, Position, Status, SalaryMin, SalaryMax, JobPosted, JobLast, Experience, Gender, AgeMin, AgeMax, Location FROM jobdetails WHERE Title='$selected_val'";
$rowcount=0;
try{
   $rows=$conn->query($sql);
   foreach($rows as $row){
	   
   
	   $rowcount++;
	   
	  echo  "<br><b>Job Title:</b> &nbsp;".$row["Title"]."<br></br><b>Department:</b> &nbsp;".$row["Department"]."<br></br> <b>Job Status:</b> &nbsp;".$row["Status"]."<br></br> <b>Minimum Salary:</b> &nbsp;".$row["SalaryMin"].
	 " &nbsp;&nbsp;&nbsp;<b>Maximum Salary: </b>".$row["SalaryMax"]."<br><br><b>Experience:</b>&nbsp;".$row["Experience"]."<br><br><b>Gender:&nbsp;</b>".$row["Gender"]."<br><br><b>Minimum Age: </b>&nbsp;".$row["AgeMin"]
	 ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Maximum Age:</b>&nbsp;&nbsp;".$row["AgeMax"]."<br><br><b>Location:</b>&nbsp;".$row["Location"]."<br><br><b>Job Posted:</b>&nbsp;".$row["JobPosted"]."<br><br><b>Last Date to Apply:</b>&nbsp;".$row["JobLast"];
   }
   
   }
   catch(PDOException $e){
	   echo"connection failed".$e->getMessaage();
   }
   if($rowcount==0)
	   echo"NO DATA";
   echo"</table>";
   $conn=null;
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
