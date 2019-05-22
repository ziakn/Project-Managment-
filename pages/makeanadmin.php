<?php
session_start(); 
include('fypautomationconnection.php');
echo "hiiiiiiiiiiiiiiii";
echo $supervisor_id=mysql_real_escape_string($_POST['supervisor_id']);
 echo $admin_id=$_SESSION['admin_id'];

 // this is the coding to for make an supervisor to admin.....
 $result=mysql_query("SELECT * FROM supervisor WHERE supervisor_id = '$supervisor_id' AND admin_id = '$admin_id'");
  $row = mysql_fetch_array($result);
   if(!empty($supervisor_id&&$admin_id))
    {
    	echo $supervisor_id= $row['supervisor_id'];
    	echo $user_name= $row['user_name'];
    	echo $department= $row['department'];
    	echo $qualification= $row['qualification'];
    	echo $specialization= $row['specialization'];
    	echo $email_id= $row['email_id'];
    	echo $password= $row['password'];
      
     mysql_query("UPDATE admin SET admin_name='".$user_name."', department='".$department."', qualification='".$qualification."', specialization='".$specialization."', email_id='".$email_id."', password='".$password."', supervisor_id='".$supervisor_id."'  WHERE admin_id=". $admin_id);
       header("location:login.html");
       // echo " $username";
   }
//mysql_query('DELETE FROM supervisor WHERE supervisor_id='. $supervisor_id);
//    header('location:login.html');
?>