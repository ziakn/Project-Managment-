<?php
session_start(); 
include('fypautomationconnection.php');
 $supervisorid =$_SESSION['supervisor_id']; 
$studentid=mysql_real_escape_string($_POST['student_id']);
 
 $result=mysql_query("SELECT SUM(task_mark) AS task_mark, COUNT(task_mark) AS taskcount FROM studentprogress WHERE student_id='$studentid' ");
 while($row = mysql_fetch_array($result))
  {
  	 $totaltaskmark=$row["task_mark"];
  	 $counttask=10*$row["taskcount"];
  }
  $_SESSION['sid']= $studentid;
 // formulaaa..
 $marks=($totaltaskmark/$counttask)*100;
  
mysql_query("INSERT INTO totalmark(supervisor_id,student_id,total_marks)VALUES('$supervisorid','$studentid','$marks')");


   header('location:studentprogress.php');
?>