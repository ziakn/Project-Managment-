<?php
session_start(); 
include('fypautomationconnection.php');
echo "hiiiiiiiiiiiiiiii";

       
       $supervisorid=$_SESSION['supervisor_id'];
$result=mysql_query("SELECT COUNT(supervisor_id1) AS total FROM prefrenceone WHERE supervisor_id1 ='$supervisorid' AND status1 =1"); // this query is for supervisor to get ist priority studen project
$row = mysql_fetch_array($result);
echo "yourist".$row1= $row['total'];      
$result=mysql_query("SELECT COUNT(supervisor_id2) AS total FROM prefrencetwo WHERE supervisor_id2 ='$supervisorid' AND status2 =1");  
$row = mysql_fetch_array($result);
echo "your2nd".$row2= $row['total'];  
$result=mysql_query("SELECT COUNT(supervisor_id3) AS total FROM prefrencethree WHERE supervisor_id3 ='$supervisorid' AND status3 =1");
$row = mysql_fetch_array($result);
echo "your3rd".$row3= $row['total'];  
 echo "total".$total=$row1+$row2+$row3;
if($total>10)
{
mysql_query("UPDATE prefrencetwo SET status2=3 WHERE status2 IS NULL AND supervisor_id2=". $supervisorid);

mysql_query("UPDATE prefrenceone SET status1=3 WHERE status1 IS NULL AND supervisor_id1=". $supervisorid);
mysql_query("UPDATE prefrencethree SET status3=3 WHERE status3 IS NULL AND supervisor_id3=". $supervisorid);
echo "<script>

alert('your qouta is complete');
window.location.href='adminprojectrequest.php';
</script>";
}
else{
echo $prefrencetwo_id=mysql_real_escape_string($_POST['prefrencetwo_id']);
echo $prefrencetwo_id;
echo $student_id=mysql_real_escape_string($_POST['student_id2']);

echo $prefrenceone_id;
mysql_query("UPDATE prefrencetwo SET status2=1 WHERE prefrencetwo_id=". $prefrencetwo_id);

mysql_query("UPDATE prefrenceone SET status1=2 WHERE status1 IS NULL AND student_id1=". $student_id);
mysql_query("UPDATE prefrencethree SET status3=2 WHERE status3 IS NULL AND student_id3=". $student_id);
    header('location:adminprojectrequest.php');
}
    

?>