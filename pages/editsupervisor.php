<?php
session_start(); 
include('fypautomationconnection.php');

$supervisor_id=mysql_real_escape_string($_POST['supervisor_id']);
$username=mysql_real_escape_string($_POST['user_name']);
$department=mysql_real_escape_string($_POST['department']);
$qualification=mysql_real_escape_string($_POST['qualification']);
$specialization=mysql_real_escape_string($_POST['specialization']);
$email_id=mysql_real_escape_string($_POST['email_id']);
echo $supervisor_id;
echo $username;

echo $department;
echo $qualification;
echo $specialization;
echo $email_id;

mysql_query("UPDATE supervisor SET user_name='".$username."', department='".$department."', qualification='".$qualification."', specialization='".$specialization."', email_id='".$email_id."' WHERE supervisor_id=". $supervisor_id);
header('location:supervisor.php');
session_close(); 
?>