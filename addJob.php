<!DOCTYPE>
<html>
<head>
<style>
.error {color: #FF0000;}
.submit {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
input[type=submit] {
  width: 20%;
  background-color: #2F4F4F;
  font-weight:bold;
  font-family:Times New Roman;
  color: white;
  font-size:20px;
  padding: 1px 2px;
  margin: 8px 0;
  border-radius: 2px;
  cursor: pointer;
}
input[type=reset] {
  width: 20%;
  background-color: #2F4F4F;
  font-weight:bold;
  font-family:Times New Roman;
  color: white;
  font-size:20px;
  padding: 1px 2px;
  margin: 8px 0;
  border-radius: 2px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #0E6655;
}
input[type=reset]:hover {
  background-color: #0E6655;
}
</style>
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
<?php
// define variables and set to empty values
$titleErr = $depErr = $genderErr = $posErr = $msErr = $xsErr = $expErr = $maErr = $xaErr =$locErr= $appErr=$postErr=$catErr= $desErr="";
$jobtitle = $department = $gender = $comment = $position = $minsalary=$maxsalary= $experience= $Description= $Categories=$minage=$maxAge= $Location=$posted=$apply="";
$ck=true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["jobtitle"])) {
    $titleErr = "Title is required";
	$ck=false;
  }
  else if(!preg_match("/^[a-z A-Z]*$/",$_POST["jobtitle"])) 
	  {
		$titleErr = "Only Alphabates Allowed";  
	  }
  else {
    $jobtitle = test_input($_POST["jobtitle"]);
  }
  
  
  if (empty($_POST["department"])) {
    $depErr = "Department is required";
	$ck=false;
  }
  else if(!preg_match("/^[a-z A-Z]*$/",$_POST["department"])) 
	  {
		$depErr = "Only Alphabates Allowed";  
	  }
	
  else {
    $department = test_input($_POST["department"]);
  }
    //position
  if (empty($_POST["position"])) {
    $posErr= "Position is required";
	$ck=false;
  }
  else if(!preg_match("/^[0-9]*$/",$_POST["position"])) 
	  {
		$posErr = "Only Numbers Allowed";  
	  }
  else {
    $position = test_input($_POST["position"]);
  }
    //Description
  if (empty($_POST["Description"])) {
    $desErr="Description is required";
	$ck=false;
  } 
 
  else {
    $Description = test_input($_POST["Description"]);
	
  }
    //Categories
  if (empty($_POST["Categories"])) {
    $catErr = "Categories is required";
	$ck=false;
  }
  else if(!preg_match("/^[a-z A-Z]*$/",$_POST["Categories"])) 
	  {
		$catErr = "Only Alphabates Allowed";  
	  }
	
  else {
    $Categories = test_input($_POST["Categories"]);
  }
  //minsalary

  if (empty($_POST["minsalary"])) {
    $msErr="Salary is required";
	$ck=false;
  }
else if(!preg_match("/^[0-9]*$/",$_POST["minsalary"])) 
	  {
		$msErr = "Only Numbers Allowed";  
	  }
  else {
    $minsalary = test_input($_POST["minsalary"]);
  }
  //maxsalary
    if (empty($_POST["maxsalary"])) {
    $xsErr="Salary is required";
	$ck=false;
  } 
  else if(!preg_match("/^[0-9]*$/",$_POST["maxsalary"])) 
	  {
		$xsErr = "Only Numbers Allowed";  
	  }
  else {
    $maxsalary = test_input($_POST["maxsalary"]);
  }
  //experience
    if (empty($_POST["experience"])) {
    $expErr="Experience is required";
	$ck=false;
  } 
  else if(!preg_match("/^[0-9]*$/",$_POST["experience"])) 
	  {
		$expErr = "Only Numbers Allowed";  
	  }
  else {
    $experience = test_input($_POST["experience"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  if (empty($_POST["minage"])) {
    $maErr="Age is required";
	$ck=false;
  }
	else if(!preg_match("/^[0-9]*$/",$_POST["minage"])) 
	  {
		$maErr = "Only Numbers Allowed";  
	  }
  else {
    $minage = test_input($_POST["minage"]);
  }
  
    if (empty($_POST["maxAge"])) {
    $xaErr="Age is required";
	$ck=false;
  }
else if(!preg_match("/^[0-9]*$/",$_POST["maxAge"])) 
	  {
		$xaErr = "Only Numbers Allowed";  
	  }
  else {
    $maxage = test_input($_POST["maxAge"]);
  }
  
  
  //location
  if (empty($_POST["Location"])) {
    $locErr="Location is required";
	$ck=false;
  } 
  else if(!preg_match("/^[a-z A-Z]*$/",$_POST["Location"])) 
	  {
		$locErr = "Only Alphabates Allowed";  
	  }
  else {
    $Location = test_input($_POST["Location"]);
	
  }
  
  
  if (empty($_POST["posted"])) {
    $postErr="Date is required";
	$ck=false;
  } else {
    $posted = test_input($_POST["posted"]);
	
  }
  if (empty($_POST["apply"])) {
    $appErr="Date is required";
	$ck=false;
  } else {
    $apply = test_input($_POST["apply"]);
	
  }
  
  if($ck==false)
  {
  }
  else
  {
	  //$ck=true;
	   //header("Location: addJobProcess.php"); 

$title=$_POST['jobtitle'];
$dep=$_POST["department"];
$position=$_POST["position"];
$status=$_POST["status"];
$minsalary=$_POST["minsalary"];
$maxsalary=$_POST["maxsalary"];
$experience=$_POST["experience"];
$gender=$_POST["gender"];
$minage=$_POST["minage"];
$maxage=$_POST["maxAge"];
$posted=$_POST["posted"];
$apply=$_POST["apply"];
$Location=$_POST["Location"];


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
$sql="INSERT INTO jobdetails(Title,Department,Position,Status,SalaryMin,SalaryMax,JobPosted,JobLast,Experience,Gender,AgeMin,AgeMax,Location) 
VALUES ('$title','$dep','$position','$status','$minsalary','$maxsalary','$posted','$apply','$experience','$gender','$minage','$maxage','$Location')";
$rowcount=0;
try{
   $rows=$conn->query($sql);
   }
   catch(PDOException $e){
	   echo"connection failed".$e->getMessaage();
   }
   $conn=null;
   echo "no data";
  //header("Location: adminPage.html");   

  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  
  return $data;
}
?>
 
<div class="main subpage">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
          <li><a href="adminPage.html">Home Page</a></li>
          <li class="active"><a href="addJob.php"><span>Add Job</span></a></li>
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
		<p><font size="6" face="verdana"> <b> Add Job </b> </font></p>  
      <div style="width: 60em;">
		<font face="Trebuchet MS" size="3">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		<br>
		  Job Title <input type="text" name="jobtitle">
		  <span class="error"> <?php echo $titleErr;?></span>
		  <br><br>
		  Department <input type="text" name="department">
		  <span class="error"> <?php echo $depErr;?></span>
		  <br><br>
		  Position <input type="text" name="position">
		  <span class="error"><?php echo $posErr;?></span>
		  <br><br>
		  Job Status
		  <select name="status" id="status" size="1">
          <option value="FullTime">Full Time</option>
          <option value="PartTime(Evening)">Part Time (Evening)</option>
          <option value="DayTime(Morning)">Day Time (Morning)</option>
        </select>
		</br> </br>
		  Minimum Salary <input type="text" size="3" name="minsalary" /> <span class="error"><?php echo $msErr;?></span>
		  Maximum Salary <input type="text" size="3" name="maxsalary"/> <span class="error"><?php echo $xsErr;?></span>
		  <br> <br>
			Experience<input type="text" name="experience">
		  <span class="error"><?php echo $expErr;?></span>
		  <br><br>
		  Gender:<br>
		  <input type="radio" name="gender" value="Female">Female
		  <input type="radio" name="gender" value="Male">Male
		  <input type="radio" name="gender" value="No Preference">No Preference
		  <span class="error"> <?php echo $genderErr;?></span>
		  <br><br>
		  Minimum Age <input type="text" size="3" name="minage" /> <span class="error"><?php echo $maErr;?></span>
		  Maximum Age <input type="text" size="3" name="maxAge"/> <span class="error"><?php echo $xaErr;?></span>
		  <br> <br>
		  Location
		  <input type="text" name="Location"  size="13"/> <span class="error"><?php echo $locErr;?></span> </br> </br>
		  Categories
		  <input type="text" name="Categories"  size="13"/> <span class="error"><?php echo $catErr;?></span> </br> </br>
		  Description
		  <input type="text" name="Description"  size="43" /> <span class="error"><?php echo $desErr;?></span> </br> </br>
		  Job Posted
		  <input type="date" name="posted" size="10" /> <span class="error"><?php echo $postErr;?></span> </br> </br>
		  Last Date to Apply
		  <input type="date" name="apply" value="" size="10" /> <span class="error"><?php echo $appErr;?></span></br> </br>
        <div style="clear: both;">
          <input type="submit" name="submit" value="Save Details"  />
          <input type="reset" name="resetButton" value="Reset Form" style="margin-right: 20px;" />
        </div> 
      </div>
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

  </body>
</html>
