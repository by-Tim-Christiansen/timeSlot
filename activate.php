<?php
$host_name = "********";
$database = "********";
$user_name = "********";
$password = "********";

$connect = mysqli_connect($host_name, $user_name, $password, $database);

$token = $_GET['token'];

$query = mysqli_query($connect, "SELECT email, active FROM timeslots WHERE varificationtoken='$token'");
$number = mysqli_num_rows($query);
$emailArray = mysqli_fetch_array($query);
$email = $emailArray['email'];
$active = $emailArray['active'];

if($number == 1 && $active == 0){

$pdo = new PDO('mysql:host=********;dbname=********', '********', '********');
$statement = $pdo->prepare("UPDATE timeslots SET active = :active WHERE varificationtoken = :varificationtoken");
$one = 1;
$result = $statement->execute(array('active' => $one, 'varificationtoken' => $token));

$tokenLink = "https://notics.de/slotty/v1/qrcheck?token=".$token;

require_once('../../PHPMailer-master/class.phpmailer.php');
require_once('../../PHPMailer-master/class.smtp.php');


$message = "Hallo,<br />mit dieser Mail erhälst du den QR-Code für deinen Besuch.
<br /><br /><img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=".$tokenLink."'><br /><br />Du kannst damit rechnen, dass du diesen bei bei deinem Besuch vorzeigen musst. Bitte halte ihn deshalb beim Zutritt griffbereit.";


$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->SMTPSecure = "tls";
$mail->Host = "********";  // specify main and backup server
$mail->Port = 587;
$mail->Username = "********";  // SMTP username
$mail->Password = "********"; // SMTP password

$mail->From = "********";
$mail->FromName = "********";
$mail->AddAddress($email);
$mail->CharSet ="UTF-8";

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "DEIN QR";
$mail->Body    = $message;


if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}








} else {
  echo'<meta http-equiv="refresh" content="0; URL=index.php">';
}


?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="utf-8">
  <title>timeSlot</title>
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css" />
</head>

<body id="index-bg">
<div class="container header">
  <div class="d-flex flex-row justify-content-between">
    <div class="flex-item">
    </div>
    <div class="flex-item">
      <a href="./index.php" class="logo">timeSlot</a>
    </div>
    <div class="flex-item">
    </div>
  </div>
</div>

<div class="container h-100 pl-8 pr-8 d-flex align-items-center">
  <div>
    <div class="card-body text-center">
      <h1>Vielen Dank für deine Bestätigung</h1>
      <p class="sub-p">In kürze erhälst du deinen QR-Code per Mail</p>
    </div>
  </div>
</div>

<!-- <div class="container footer p-1">
  <a href="">Impressum</a> | <a href="">Datenschutz</a>
</div> -->
</body>

</html>
