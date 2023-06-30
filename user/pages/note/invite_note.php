<?php

 $note_id = $_GET['note_id'];

$select = "SELECT*FROM notestable WHERE id = $note_id";
$data = mysqli_query($connection, $select);
$row = mysqli_fetch_array($data);
 $notes = $row['notes'];
 $email = $_GET['email'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kumarnaresh03061999@gmail.com';                     //SMTP username
    $mail->Password   = 'hnppdgkkohyodngk';   //generated code by gmail app password        //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('kumarnaresh03061999@gmail.com', 'Naresh kumar');
    $mail->addAddress($email, 'reciver');     //Add a recipient //$email = reciver email get from form and $name also 
  
    //Attachments
    //$mail->addAttachment($file, $filename);    //Optional name $file file chosen in frontend side and if you want to change to file name then $filename value fill only

  //  Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'Notes :'.$notes;
    


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>