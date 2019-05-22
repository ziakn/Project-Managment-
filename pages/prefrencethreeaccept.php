<?php
session_start(); 
include('fypautomationconnection.php');
echo "hiiiiiiiiiiiiiiii";
echo $prefrencethree_id=mysql_real_escape_string($_POST['prefrencethree_id']);
echo $prefrencethree_id;
echo $student_id=mysql_real_escape_string($_POST['student_id3']);
       $supervisorid=$_SESSION['supervisor_id'];
$result=mysql_query("SELECT COUNT(supervisor_id1) AS total FROM prefrenceone WHERE supervisor_id1 ='$supervisorid' AND status1 = 1"); // this query is for supervisor to get ist priority studen project
$row = mysql_fetch_array($result);
echo "yourist".$row1= $row['total'];      
$result=mysql_query("SELECT COUNT(supervisor_id2) AS total FROM prefrencetwo WHERE supervisor_id2 ='$supervisorid' AND status2 =1");  
$row = mysql_fetch_array($result);
echo "your2nd".$row2= $row['total'];  
$result=mysql_query("SELECT COUNT(supervisor_id3) AS total FROM prefrencethree WHERE supervisor_id3 ='$supervisorid' AND status3 =1");
$row = mysql_fetch_array($result);
echo "your3rd".$row3= $row['total'];  
 echo "total".$total=$row1+$row2+$row3;
if($total > 6)
{
mysql_query("UPDATE prefrencetwo SET status2=3 WHERE status2 IS NULL AND supervisor_id2=". $supervisorid);

mysql_query("UPDATE prefrenceone SET status1=3 WHERE status1 IS NULL AND supervisor_id1=". $supervisorid);
mysql_query("UPDATE prefrencethree SET status3=3 WHERE status3 IS NULL AND supervisor_id3=". $supervisorid);
echo "<script>

alert('your qouta is complete. Exceeding from 6 project');
window.location.href='projectrequest.php';
</script>";


}
else{

mysql_query("UPDATE prefrencethree SET status3=1 WHERE prefrencethree_id=". $prefrencethree_id);

mysql_query("UPDATE prefrenceone SET status1=4 WHERE status1 IS NULL AND student_id1=". $student_id);
mysql_query("UPDATE prefrencetwo SET status2=4 WHERE status2 IS NULL AND student_id2=". $student_id);
    header('location:projectrequest.php');
}
?>