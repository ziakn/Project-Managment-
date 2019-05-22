<?php
session_start(); 
include('fypautomationconnection.php');

// these data came from supervisor.php page ,, when click on add button in popup modal...

$name=mysql_real_escape_string($_POST['name']);
$department=mysql_real_escape_string($_POST['department']);
$qualification=mysql_real_escape_string($_POST['qualification']);
$specialization=mysql_real_escape_string($_POST['specialization']);
$email=mysql_real_escape_string($_POST['email']);
                // paswword will generate randomly
$uppercase="ABCDEFGHIJKLMNOPQRSTUVWXYZ";                           // to pick upper case
$lowercase="abcdefghijklmnopqrstuvwxyz";                           //to pick lowercase
$number="0123456789";                                              //to pick number
$generate_uppercase=substr(str_shuffle($uppercase),0,2);           // shuffle uppercase 
$generate_lowercase=substr(str_shuffle($lowercase),0,2);            //shuffle lowwer case
$generate_number=substr(str_shuffle($number),0,2);                  //shuffle number
$mixed="$generate_uppercase$generate_lowercase$generate_number";    // consective all
$password=substr(str_shuffle($mixed),0,6);                          // shuffle all
//error_reporting(0); echo "$password";
$adminid=$_SESSION['admin_id'];                                       // forein key of admin table in supervisor table...
if(!empty($name&&$department&&$qualification&&$specialization&&$email&&$adminid))
{
    mysql_query("INSERT INTO supervisor(user_name,department,qualification,specialization,email_id,password,admin_id)VALUES('$name','$department','$qualification','$specialization','$email','$password','$adminid')");
    	// coding for emails....
    	require 'PHPMailer/PHPMailerAutoload.php';

			$mail = new PHPMailer;

			$mail->isSMTP();                                   // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                            // Enable SMTP authentication
			$mail->Username = 'ziakn03@gmail.com';          // SMTP username
			$mail->Password = 'muhammad1'; // SMTP password
			$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                 // TCP port to connect to

			$mail->setFrom('ziakn03@gmail.com', 'IMsciences');
			$mail->addReplyTo('ziakn03@gmail.com', 'IMsciences');
			$mail->addAddress($email);   // Add a recipient
			$mail->addCC('cc@example.com');
			$mail->addBCC('bcc@example.com');

			$mail->isHTML(true);  // Set email format to HTML

			$bodyContent = '<h1>Insstitute Of management sciences peshawar</h1>';
			$bodyContent .= 'Your Password is '.$password;

			$mail->Subject = 'FYP Automation';
			$mail->Body    = $bodyContent;

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}


    header("location:supervisor.php");
}


 header("location:supervisor.php");



//the else statmnt is to retreive data while coordinaotr click on the supervisor link in sidebar menu...







	session_close();

?>