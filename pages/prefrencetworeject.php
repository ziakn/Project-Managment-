<?php
session_start(); 
include('fypautomationconnection.php');
echo "hiiiiiiiiiiiiiiii";
 $prefrencetwo_id=mysql_real_escape_string($_POST['prefrencetwo_id']);
 $reason=mysql_real_escape_string($_POST['reason2']);

echo $prefrenceone_id;
echo $reason;
mysql_query("UPDATE prefrencetwo SET status2 = 0, reason2 ='".$reason."' WHERE prefrencetwo_id=". $prefrencetwo_id);

   header('location:projectrequest.php');
?>