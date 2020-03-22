<?php

if(isset($_POST['submit'])){

$place = $_POST['place'];

if(!empty($place)){

header('location: results.php?place='.$place);



}
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
    <div class="row">
      <div class="col col-sm-12 text-center mb-5">
        <h1>Einkaufen ohne Warteschlange</h1>
        <p class="sub-p">In Zeiten der Corona-Krise bilden sich vor manchen Supermärkten lange Schlangen. Zieh dir hier ein Ticket, mit dem du in einem fixen Zeitraum einkaufen kannst, ganz ohne Wartezeit.</p>
        <form method="post" class="">
            <input type="number" pattern="\d*" maxlength="5" name="place" placeholder="Deine Postleitzahl" class="input zip form-control">
            <button type="submit" name="submit" value="Suchen" class="submit btn btn-danger landing-btn">Suchen</button>
        </form>
      </div>
    </div>
  </div>

  <!-- <div class="container footer p-1">
    <a href="">Impressum</a> | <a href="">Datenschutz</a>
  </div> -->
  </body>

  </html>
