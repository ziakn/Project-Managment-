<?php
session_start(); 
include('fypautomationconnection.php');
echo "hiiiiiiiiiiiiiiii";
 $prefrenceone_id=mysql_real_escape_string($_POST['prefrenceone_id']);
 $reason=mysql_real_escape_string($_POST['reason1']);

echo $prefrenceone_id;
echo $reason;
mysql_query("UPDATE prefrenceone SET status1 = 0, reason1 ='".$reason."' WHERE prefrenceone_id=". $prefrenceone_id);

   header('location:adminprojectrequest.php');
?>