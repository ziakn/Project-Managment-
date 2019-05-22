<?php
session_start(); 
include('fypautomationconnection.php');
echo "hiiiiiiiiiiiiiiii";
 $prefrencethree_id=mysql_real_escape_string($_POST['prefrencethree_id']);
 $reason=mysql_real_escape_string($_POST['reason3']);

echo $prefrenceone_id;
echo $reason;
mysql_query("UPDATE prefrencethree SET status3 = 0, reason3 ='".$reason."' WHERE prefrencethree_id=". $prefrencethree_id);

   header('location:projectrequest.php');
?>