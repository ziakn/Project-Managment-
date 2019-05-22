<?php
session_start(); 
include('fypautomationconnection.php');

$email=mysql_real_escape_string($_POST['email']);

if(!empty($email))
{
    $result=mysql_query("SELECT * FROM supervisor WHERE email_id = '$email' ");
    $row = mysql_fetch_array($result);
    if($row!==false)
    {
      $email=$row['email_id'];                        // here get the user id of admin for foreign key
       $password=$row['password'];
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
      $bodyContent .= 'Your Forgotton Password is '.$password;

      $mail->Subject = 'FYP Automation';
      $mail->Body    = $bodyContent;

      if(!$mail->send()) {
         echo "<script>alert('Your Email not found !! cheak your email'); window.location='login.html'</script>";
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          echo "<script>alert('Your  Password has been succefully send !! cheak your email'); window.location='login.html'</script>";
      }
         
       header("location:login.html");
       // echo " $username";
   }
 }
   else
   {
    echo "empty";
   }
   ?>