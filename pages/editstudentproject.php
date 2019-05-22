<?php
session_start(); 
include('fypautomationconnection.php');

$student_id=mysql_real_escape_string($_POST['student_id']);
$username=mysql_real_escape_string($_POST['user_name']);
$program=mysql_real_escape_string($_POST['program']);
$section=mysql_real_escape_string($_POST['section']);
$title=mysql_real_escape_string($_POST['title']);
$description=mysql_real_escape_string($_POST['description']);
$area=mysql_real_escape_string($_POST['area']);
$pre_requisite=mysql_real_escape_string($_POST['pre_requisite']);
echo $student_id;
echo $username;

echo $program;
echo $section;
echo $title;
echo $description;
echo $area;
echo $pre_requisite;

mysql_query("UPDATE student SET student_name='".$username."', program='".$program."', section='".$section."', title='".$title."', description='".$description."', area='".$area."', pre_requisite='".$pre_requisite."'  WHERE student_id=". $student_id);
header('location:studentproject.php');
session_close(); 
?>