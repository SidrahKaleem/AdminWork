<!DOCTYPE html>
<html>
  <head> <title> Job Portal </title>
  <style type="text/css">
.main{
 position: relative;
  width: 400px;
  height: 170px;
 
}
.submain
{
 position: absolute;
  top: 55px;
  right: 0;
  left: 280px;
  width: 200px;
  height: 100px;
}
.mainbar{
position: absolute;
  top: 80px;
  right: 0;
  left: 421px;
  width: 200px;
  height: 20px;
}
.heading{
font-size:20px;
font-weight:bold;
position: absolute;
top: 85px;
 right: 0;
 left: 430px;
 width: 200px;
 height: 20px;
}
.subhead{
font-size:20px;
font-weight:bold;
position: absolute;
top: 159px;
 right: 0;
 left: 590px;
 width: 250px;
 height: 20px;
}
.txtx{
font-size:15px;
font-weight:bold;
position: absolute;
top: 250px;
 right: 0;
 left: 530px;
 width: 300px;
 height: 20px;
}
.end{
font-size:22px;
font-weight:bold;
font-family:verdana;
position: absolute;
top: 430px;
 right: 0;
 left: 460px;
 width: 300px;
 height: 30px;
	
}
.submit {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
input[type=submit] {
  width: 60%;
  background-color: #2F4F4F;
  font-weight:bold;
  font-family:Times New Roman;
  color: white;
  font-size:25px;
  padding: 10px 20px;
  margin: 8px 0;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #0E6655;
}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
a:link {
    color: orange;
}
a:hover {
    color: blue;
}

 </style>
  </head>
  <body>
  <div class="main">
  <img src="images/main_bg.jpg" width="1350" height="640">
  </div>
<div class="submain">
<img src="images/hbg_bg.jpg" width="800">
</div>
<div class="mainbar">
<img src="images/search_bg.gif" width="515">
</div>
<div class="heading">
<h2> <font color="white" face="verdana">Job Portal </font></h2>
</div>
<div class="subhead">
<h3> <font color="black" face="verdana"> Forgot Password </h3></font>
</div>
<div class="txtx">
<table> 
<form method="post">
<tr><td><font size="5"/>Enter Name:</td> <td> <input type="text" name="adminName" size="10"/><td></tr>
<tr><td colspan="2" align="center"><br><input type="submit" name="submit" value="Enter"/></td></tr>
</form>
</table>
</div>
<div class="end">
<?php
if(isset($_POST['submit'])){
$name = $_POST['adminName'];  

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
$sql="SELECT Name FROM admin ";
$val1=0;
$val2=1;
$rowcount=0;
try{
   $rows=$conn->query($sql);
   foreach($rows as $row){
	   
   
	   $rowcount++;
	   
	  if($row["Name"]== $name)
	  {
		$val1=1;
	  }
	  else{
	  $val2=2;
	  }
   }
   
   }
   catch(PDOException $e){
	   echo"connection failed".$e->getMessaage();
   }
   if($val1==1)
   {
	 $sql="SELECT Password FROM admin WHERE Name='$name' ";
	 $rowcount=0;

try{
		$rows=$conn->query($sql);
		foreach($rows as $row){
	   $rowcount++;
	echo "Your Password is: &nbsp;".$row["Password"];
		}
	      
   }
   catch(PDOException $e){
	   echo"connection failed".$e->getMessaage();
   }
   }
   else
   echo "Incorrect Name";
$conn=null;}
 ?>
 </br> </br><a href="interface.php"> Back to Login </a>
 </div>
</html>