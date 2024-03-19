<?php 
 use PHPMailer\PHPMailer\PHPMailer; 
  
 require 'vendor/phpmailer/phpmailer/src/Exception.php'; 
 require 'vendor/phpmailer/phpmailer/src/PHPMailer.php'; 
 require 'vendor/phpmailer/phpmailer/src/SMTP.php'; 
         function sendOTP($email,$otp) { 
                 require('vendor/autoload.php'); 
                 $message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp; 
                 $mail = new PHPMailer(); 
                 $mail->IsSMTP(); 
                 $mail->SMTPDebug = 0; 
                 $mail->SMTPAuth = TRUE; 
                 $mail->SMTPSecure = 'tls'; // tls or ssl 
                 $mail->Port     = 587; 
                 $mail->Username = "emailuser064@gmail.com"; 
                 $mail->Password = "vxszlgglrrrmfntk"; 
                 $mail->Host     = "smtp.gmail.com"; 
                 $mail->Mailer   = "smtp"; 
                 $mail->setFrom("emailuser064@gmail.com","Team"); 
                 $mail->AddAddress($email); 
                 $mail->Subject = "OTP to Login"; 
                 $mail->MsgHTML($message_body); 
                 $mail->IsHTML(true);                 
                 $result = $mail->Send(); 
                 return $result; 
         } 
         function sendpres($email,$code) { 
                require('vendor/autoload.php'); 
                $message_body = "Code for password reset is:<br/><br/>" . $code; 
                $mail = new PHPMailer(); 
                $mail->IsSMTP(); 
                $mail->SMTPDebug = 0; 
                $mail->SMTPAuth = TRUE; 
                $mail->SMTPSecure = 'tls'; // tls or ssl 
                $mail->Port     = 587; 
                $mail->Username = "emailuser064@gmail.com"; 
                $mail->Password = "vxszlgglrrrmfntk"; 
                $mail->Host     = "smtp.gmail.com"; 
                $mail->Mailer   = "smtp"; 
                $mail->setFrom("emailuser064@gmail.com","Team"); 
                $mail->AddAddress($email); 
                $mail->Subject = "OTP to Login"; 
                $mail->MsgHTML($message_body); 
                $mail->IsHTML(true);                 
                $result = $mail->Send(); 
                return $result; 
        } 
 ?>