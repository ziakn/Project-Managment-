<?php
session_start(); 
include('fypautomationconnection.php');

$studentid=mysql_real_escape_string($_POST['studentid']);
$_SESSION['sid']= $studentid;
 $studentprogressid=mysql_real_escape_string($_POST['studentprogressid']);
 $percentage=mysql_real_escape_string($_POST['percentage']);
$taskmark=($percentage*10)/100;


mysql_query("UPDATE studentprogress SET task_percentage='".$percentage."', task_mark='".$taskmark."', task_completedate = CURDATE() WHERE studentprogress_id=".$studentprogressid);

header('location:studentprogress.php');
session_close(); 
?>