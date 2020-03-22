<?php

session_start();

error_reporting(0);

if(!isset($_SESSION['activMarket'])){
  header('location: index.php');
}

$id = $_SESSION['activMarket'];
$marketname = $_SESSION['marketName'];
$adress = $_SESSION['adress'];


//echo $id;
//echo $marketname;
//echo $adress;

$request = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?place_id='.$id.'&fields=opening_hours&key=AIzaSyBuPRzQ4Inr-i53Z6f20T2V4St1zAsMG-k');
$json = json_decode($request, true);

?>

  <!DOCTYPE html>
  <html lang="de">

  <head>
    <meta charset="utf-8">
    <title>Virenfreies einkaufen</title>
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
  </head>

  <body>
    <div class="container header">
      <div class="d-flex flex-row justify-content-between">
        <div class="flex-item">
          <a href="./results.php"class="back-link"><img width="24" src="./pics/back-icon.png" /></img-></a>
        </div>
        <div class="flex-item">
          <a href="./index.php" class="logo">timeSlot</a>
        </div>
        <div class="flex-item">
        </div>
      </div>
    </div>

    <div class="container pt-5">
      <div class="row pt-5 center">
        <div class="col col-sm-12">
          <h1><b>Reservierung bei <?php echo $marketname; ?></b></h1>
          <p class="sub-p"><?php echo $adress; ?></p>
        </div>

      </div>
      <form method="post">
        <div class="row center">
          <fieldset>

                  <?php


                  $open = $json['result']['opening_hours']['periods']['3']['open']['time'];
                  $close = $json['result']['opening_hours']['periods']['3']['close']['time'];



                  $host_name = "********";
                  $database = "********";
                  $user_name = "********";
                  $password = "********";

                  $connect = mysqli_connect($host_name, $user_name, $password, $database);

                  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND ");
                  $number = mysqli_num_rows($query);




                  if($open <= "0400" && $close > "0400"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='04:00-05:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot04" value="04:00-05:00">
                          <label class="timeframe-box" for="slot04">04:00-05:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "0500" && $close > "0500"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='05:00-06:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot05" value="05:00-06:00">
                          <label class="timeframe-box" for="slot05">05:00-06:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "0600" && $close > "0600"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='06:00-07:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot06" value="06:00-07:00">
                          <label class="timeframe-box" for="slot06">06:00-07:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "0700" && $close > "0700"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='07:00-08:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot07" value="07:00-08:00">
                          <label class="timeframe-box" for="slot07">07:00-08:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "0800" && $close > "0800"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='08:00-09:00'");
                	  $number = mysqli_num_rows($query);
                	  if($number < 1){
                    echo '<input type="radio" class="radio" name="radioInput" id="slot08" value="08:00-09:00">
                          <label class="timeframe-box" for="slot08">08:00-09:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  }
                  if($open <= "0900" && $close > "0900"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='09:00-10:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot09" value="09:00-10:00">
                          <label class="timeframe-box" for="slot09">09:00-10:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "1000" && $close > "1000"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='10:00-11:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot10" value="10:00-11:00">
                          <label class="timeframe-box" for="slot10">10:00-11:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "1100" && $close > "1100"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='11:00-12:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot11" value="11:00-12:00">
                          <label class="timeframe-box" for="slot11">11:00-12:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "1200" && $close > "1200"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='12:00-13:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot12" value="12:00-13:00">
                          <label class="timeframe-box" for="slot12">12:00-13:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "1300" && $close > "1300"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='13:00-14:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot13" value="13:00-14:00">
                          <label class="timeframe-box" for="slot13">13:00-14:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "1400" && $close > "1400"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='14:00-15:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot14" value="14:00-15:00">
                          <label class="timeframe-box" for="slot14">14:00-15:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "1500" && $close > "1500"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='15:00-16:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot15" value="15:00-16:00">
                          <label class="timeframe-box" for="slot15">15:00-16:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "1600" && $close > "1600"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='16:00-17:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot16" value="16:00-17:00">
                          <label class="timeframe-box" for="slot16">16:00-17:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "1700" && $close > "1700"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='17:00-18:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot17" value="17:00-18:00">
                          <label class="timeframe-box" for="slot17">17:00-18:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "1800" && $close > "1800"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='18:00-19:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id ="slot18" value="18:00-19:00">
                          <label class="timeframe-box" for="slot18">18:00-19:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "1900" && $close > "1900"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='19:00-20:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot19" value="19:00-20:00">
                          <label class="timeframe-box" for="slot19">19:00-20:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "2000" && $close > "2000"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='20:00-21:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot20" value="20:00-21:00">
                          <label class="timeframe-box" for="slot20">20:00-21:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "2100" && $close > "2100"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='21:00-22:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot21" value="21:00-22:00">
                          <label class="timeframe-box" for="slot21">21:00-22:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "2200" && $close > "2200"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='22:00-23:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot22" value="22:00-23:00">
                          <label class="timeframe-box" for="slot22">22:00-23:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "2300" && $close > "2300"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='23:00-00:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot23" value="23:00-00:00">
                          <label class="timeframe-box" for="slot23">23:00-00:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label>';
                  }
                  if($open <= "2400" && $close > "2400"){
                	  $query = mysqli_query($connect, "SELECT marketkey, visittime FROM timeslots WHERE marketkey='$id' AND visittime='00:00-01:00'");
                	  $number = mysqli_num_rows($query);
                    echo '<input type="radio" class="radio" name="radioInput" id="slot24" value="00:00-01:00"><br />
                          <label class="timeframe-box" for="slot24">00:00-01:00<br /><span style="font-size: 0.7em;">bereits '.$number.' Slots reserviert</span></label><br />';
                  }






                    $verificationtoken = "";
                    $laenge= 24;
                    $string="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                  	mt_srand((double)microtime()*1000000);

                  	for ($i=1; $i <= $laenge; $i++) {
                  	$verificationtoken .= substr($string, mt_rand(0,strlen($string)-1), 1);
                  	}



                    if(isset($_POST['submit'])){
                    require_once('../../PHPMailer-master/class.phpmailer.php');
                    require_once('../../PHPMailer-master/class.smtp.php');

                    $email = $_POST['email'];
                    $visittime = $_POST['radioInput'];
                	$visitdate = date('d.m.Y');

                	if(!empty($_POST['radioInput'])){
                    if(!empty($email)){

                      $message = ("Hallo ".$email.",<br />dies ist die Bestätigung deines Zeitfensters von ".$visittime." bei ".$marketname.".<br />Aktiviere es durch den Klick auf folgenden Link.<br />notics.de/slotty/v1/activate.php?token=".$verificationtoken);

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

                    $mail->Subject = "BESTÄTIGUNG DEINES ZEITFENSTERS";
                    $mail->Body    = "$message";
                    ?>
                    </fieldset>
                  </div>
                  <div class="row">
                    <div class="col center">
                      <?php
                      if(!$mail->Send())
                      {
                         echo "Message could not be sent. <p>";
                         echo "Mailer Error: " . $mail->ErrorInfo;
                         exit;
                      }else{
                  	echo"Mail sent!";
                  	echo $email;
                  }

                  $null = 0;

                       $pdo = new PDO('mysql:host=********;dbname=********', '********', '********');
                    $statement = $pdo->prepare("INSERT INTO timeslots (marketkey, visitdate, visittime, email, varificationtoken, active, marketname, adress) VALUES (:marketkey, :visitdate, :visittime, :email, :varificationtoken, :active, :marketname, :adress)");
                    $result = $statement->execute(array('marketkey' => $_SESSION['activMarket'], 'visitdate' => $visitdate, 'visittime' => $visittime, 'email' => $email, 'varificationtoken' => $verificationtoken, 'active' => $null, 'adress' => $adress, 'marketname' => $marketname));
                    echo '<meta http-equiv="refresh" content="0; URL=send.php">';
                  //mysqli_query($connect, "INSERT INTO timeslots (marketkey, visitdate, visittime, email, varificationtoken, active) VALUES ('$id', '$visitdate', '$visittime', '$email', '$verificationtoken', '0')");

                  } else echo"Keine Mailadresse.";
                  } else echo"Keine Zeit ausgewählt.";
                  }
                     ?>
                    </div>
                 </div>
                 <div class="row pb-5">
                    <div class="col center">
                    <input type="email" name="email" placeholder="Email" class="mail input mt-5">
                    <small id="emailHelp" class="form-text text-muted">🔒Wir geben deine Email-Adresse niemals weiter.</small>


                    <input type="submit" name="submit" value="Reservieren" class="submit btn btn-danger mt-3">
                  </div>


        </div>
      </form>
    </div>
  </body>

  </html>
