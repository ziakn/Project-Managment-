<?php
session_start(); 
include('fypautomationconnection.php');
echo "hiiiiiiiiiiiiiiii";
$date=mysql_real_escape_string($_POST['date']);                   // these are the values to get from student progress page.......
$task=mysql_real_escape_string($_POST['assigntask']);
$studentid=mysql_real_escape_string($_POST['student_id']);
$_SESSION['sid']= $studentid;   // this id send back to previous page for mataing the session...
$supervisorid=$_SESSION['supervisor_id'];
 
echo $date;
echo $assigntask;
echo $studentid;
echo $supervisorid;
mysql_query("INSERT INTO studentprogress(student_id,supervisor_id,task,taskdate,task_percentage,task_mark,task_completedate)VALUES('$studentid',' $supervisorid','$task','$date',0,0,'')");
//mysql_query("INSERT INTO prefrenceone(supervisor_id1,student_id1,admin_id1,status1,reason1)VALUES('$firstsupervisorid','$studentid','$adminid',NULL,'')");
   header('location:studentprogress.php');
?>