<?php
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
   echo "chk data";
  //header("Location: adminPage.html");   
?>