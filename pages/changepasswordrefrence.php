<?php 
session_start(); 
include('fypautomationconnection.php');

		  
         $supervisorid= $_SESSION['supervisor_id']; 
		
	echo	$currentpassword=$_POST['currentpassword'];
	echo	$newpassword=$_POST['newpassword'];
	echo	$confirmpassword=$_POST['confirmpassword'];
		$result=mysql_query("SELECT * FROM supervisor WHERE supervisor_id = '$supervisorid'");
		$row=mysql_fetch_array($result);
		$password=$row['password'];
		if($currentpassword==$password){
		if($newpassword==$confirmpassword){
			
			mysql_query("UPDATE supervisor SET password='$newpassword' WHERE supervisor_id='$supervisorid'");	
			echo "<script>alert('Update Sucessfully'); window.location='supervisormenu.php'</script>";
		}
		else{
			echo "<script>alert('Your New and Confirm Password is not match'); window.location='changepassword.php'</script>";
		}
		}
		else
		{
		echo "<script>alert('Your current password  is wrong'); window.location='changepassword.php'</script>";
		}
	?>