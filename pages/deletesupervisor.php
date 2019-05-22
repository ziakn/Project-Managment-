<?php
session_start(); 
include('fypautomationconnection.php');
echo "hiiiiiiiiiiiiiiii";
echo $supervisor_id=mysql_real_escape_string($_POST['supervisor_id']);
mysql_query('DELETE FROM supervisor WHERE supervisor_id='. $supervisor_id);
    header('location:supervisor.php');
?>