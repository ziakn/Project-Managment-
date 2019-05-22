<?php 
session_start(); 
include('fypautomationconnection.php');

		  $_SESSION['admin_name']; 
         $adminid= $adminid=$_SESSION['admin_id']; 
         $supervisorid= $_SESSION['supervisor_id']; 
		
	echo	$currentpassword=$_POST['currentpassword'];
	echo	$newpassword=$_POST['newpassword'];
	echo	$confirmpassword=$_POST['confirmpassword'];
		$result=mysql_query("SELECT * FROM admin WHERE admin_id = '$adminid'");
		$row=mysql_fetch_array($result);
		$password=$row['password'];
		if($currentpassword==$password){
		if($newpassword==$confirmpassword){
			mysql_query("UPDATE admin SET password='$newpassword' WHERE admin_id='$adminid'");
			mysql_query("UPDATE supervisor SET password='$newpassword' WHERE supervisor_id='$supervisorid'");	
			echo "<script>alert('Update Sucessfully'); window.location='admin.php'</script>";
		}
		else{
			echo "<script>alert('Your New and Confirm Password is not match'); window.location='adminchangepassword.php'</script>";
		}
		}
		else
		{
		echo "<script>alert('Your current password  is wrong'); window.location='adminchangepassword.php'</script>";
		}
	?>