<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tang.shiyun66@gmail.com';
    $mail->Password = 'gvzbdxptomruaxai';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('tang.shiyun66@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = $_POST["nom"];
    $mail->Body = $_POST["message"];

    $mail->send();

    echo 
    "
    <script>
    alert('Send Successfully');
    document.location.href = 'contactform.html';
    </script>

    ";
    
}





?>