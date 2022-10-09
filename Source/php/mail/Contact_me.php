<?php
if(isset($_POST['submit'])){
    include "Config.php";
    $mail->addAddress($_POST['email'],$_POST['name']); 
    $mail->addCC('SelfEducation2022@outlook.com', 'Self Education');
    $mail->Subject="Communication or help";
    $mail->Body    = $_POST['message'];
    $mail->send();
}
