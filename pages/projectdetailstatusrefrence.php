<?php
session_start(); 
include('fypautomationconnection.php');
echo "hiiiiiiiiiiiiiiii";

 

       echo $studentid=mysql_real_escape_string($_POST['student_id']);

echo $supervisorid=mysql_real_escape_string($_POST['supervisor_id']);
if($supervisorid==NULL)
{
echo "noooo";
}
if(!empty($studentid&&$supervisorid))
{
mysql_query("UPDATE prefrenceone SET status1=2 WHERE status1 IS NULL AND student_id1=". $studentid);

mysql_query("UPDATE prefrencetwo SET status2=2 WHERE status2 IS NULL AND student_id2=". $studentid);
mysql_query("UPDATE prefrencethree SET status3=2 WHERE status3 IS NULL AND student_id3=". $studentid);

mysql_query("UPDATE prefrenceone SET status1=1 WHERE supervisor_id1='$supervisorid' AND student_id1=". $studentid);
mysql_query("UPDATE prefrencetwo SET status2=1 WHERE supervisor_id2='$supervisorid' AND student_id2=". $studentid);
mysql_query("UPDATE prefrencethree SET status3=1 WHERE supervisor_id3='$supervisorid' AND student_id3=". $studentid);
header('location:projectprogress.php');
}
?>