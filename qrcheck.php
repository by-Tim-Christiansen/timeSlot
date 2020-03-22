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

      $host_name = "********";
      $database = "********";
      $user_name = "********";
      $password = "********";

      $connect = mysqli_connect($host_name, $user_name, $password, $database);

      $token = $_GET['token'];

      $query = mysqli_query($connect, "SELECT active, visittime, marketname FROM timeslots WHERE varificationtoken='$token'");
      $number = mysqli_num_rows($query);
      $emailArray = mysqli_fetch_array($query);
      $active = $emailArray['active'];
      $visittime = $emailArray['visittime'];
      $marketname = $emailArray['marketname'];}
      ?>
      <h1> <?php
      if($active == 1){

      echo"Der Kunde hat ein bestatätigtes Zeitfenster für Ihren Markt (".$marketname.") für das Zeitfenster von ".$visittime." Uhr.";
      }
      ?> </h1>
    </div>
  </div>
</div>

<!-- <div class="container footer p-1">
  <a href="">Impressum</a> | <a href="">Datenschutz</a>
</div> -->
</body>

</html>
