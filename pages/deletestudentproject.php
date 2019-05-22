<?php
session_start(); 
include('fypautomationconnection.php');
echo "hiiiiiiiiiiiiiiii";
echo $student_id=mysql_real_escape_string($_POST['student_id']);
mysql_query('DELETE FROM student WHERE student_id='. $student_id);
    header('location:studentproject.php');
session_close(); 
?>