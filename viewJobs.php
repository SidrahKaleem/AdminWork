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
</head>
<body>
<div class="main subpage">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
          <li ><a href="adminPage.html">Home Page</a></li>
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
	    <?php

		
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
$sql="SELECT Title,Department,Location FROM jobdetails";
echo"<table  cellspacing=9 cellpadding=13>";
echo "<tr><td>"."<font size=5 face=verdana>Title"."</td><td>"."<font size=5 face=verdana>Department"."</td><td>"." <font size=5 face=verdana>Location"."</td>";
$rowcount=0;
try{
   $rows=$conn->query($sql);
   foreach($rows as $row){
	   
   
	   $rowcount++;
	   
	  echo  "<tr><td>".$row["Title"]."</td><td>".$row["Department"]."</td><td>".$row["Location"]."</td>"; ?> <td> <a href="view.php"> View Details </a></td>
	  <?php
   }
   
   }
   catch(PDOException $e){
	   echo"connection failed".$e->getMessaage();
   }
   if($rowcount==0)
	   echo"NO DATA";
   echo"</table>";
   $conn=null;
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
