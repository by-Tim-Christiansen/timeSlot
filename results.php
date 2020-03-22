<?php
session_start();
$place = $_GET['place'];


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
          <a href="./index.php"class="back-link"><img width="24" src="./pics/back-icon.png" /></img-></a>
        </div>
        <div class="flex-item">
          <a href="./index.php" class="logo">timeSlot</a>
        </div>
        <div class="flex-item">
        </div>
      </div>
    </div>

      <div class="container h-100 pt-5 pb-5">
        <div class="row pt-5 center">
          <div class="col col-sm-12">
            <h1><b>In welchem Markt möchtest du einkaufen?</b></h1>
            <p class="sub-p">Supermärkte im Postleitzahlbereich <b><?php echo"$place"?></b></p>
          </div>

        </div>
        <div class="row">


		  <?php
        $request = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$place.'&type=supermarket&key=AIzaSyBuPRzQ4Inr-i53Z6f20T2V4St1zAsMG-k');
        $json = json_decode($request, true);

        $zero = 0;
        $i = count($json['results']);

        if($i <= 7){
        $number = $i;
        } else{
        $number = 8;
        }

        while ($zero < $number) {
          # Marktname lowercase setzen, um strpos() Case-Sensitivity zu umgehen
          $name = strtolower($json['results'][$zero]['name']);

          # Heading nach Marktnamen absuchen und entsprechendes Logo einfügen
          switch(true) {
            case strpos($name, "rewe") !== false:
              $icon = "./pics/logos/rewe.png";
              break;
            case strpos($name, "edeka") !== false:
              $icon = "./pics/logos/edeka.png";
              break;
            case strpos($name, "lidl") !== false:
              $icon = "./pics/logos/lidl.png";
              break;
            case strpos($name, "aldi") !== false:
              $icon = "./pics/logos/aldi.png";
              break;
            case strpos($name, "penny") !== false:
              $icon = "./pics/logos/penny.png";
              break;
            case strpos($name, "netto") !== false:
              $icon = "./pics/logos/netto.png";
              break;
            case strpos($name, "famila") !== false:
              $icon = "./pics/logos/famila.png";
              break;
            case strpos($name, "real") !== false:
              $icon = "./pics/logos/real.png";
              break;
            case strpos($name, "kaufland") !== false:
              $icon = "./pics/logos/kaufland.png";
              break;
            case strpos($name, "marktkauf") !== false:
              $icon = "./pics/logos/marktkauf.png";
              break;
            case strpos($name, "ullrich") !== false:
              $icon = "./pics/logos/hit-ullrich.png";
              break;
            case strpos($name, "nahkauf") !== false:
              $icon = "./pics/logos/nahkauf.png";
              break;
            default:
              $icon = "./pics/logos/default.png";
          }
        ?>



        <div class="col col-md-12 col-lg-6">
          <div class="card result-wrapper mt-4">
             <div class="card-body p-3">
               <form method="post">
               <div class="media result">
                 <img width="56px" src="<?php echo $icon ?>" class="align-self-center mr-3" alt="...">
                 <div class="media-body align-self-center">
                   <h4 class="m-0 titel"><?php echo $json['results'][$zero]['name']?></h4>
                   <p class="m-0 street"><?php echo str_replace(", Germany", "", $json['results'][$zero]['formatted_address'])?></p>
                   <!--<p class="m-0 id"><?php echo $json['results'][$zero]['place_id']?></p>-->
                 </div>

                 <?php
                 if(isset($_POST[$zero])){
     			        $_SESSION["activMarket"] = $json['results'][$zero]['place_id'];
     					$_SESSION["marketName"] = $json['results'][$zero]['name'];
     					$_SESSION["adress"] = $json['results'][$zero]['formatted_address'];
               echo '<meta http-equiv="refresh" content="0; URL=timeframe.php">';
                 }

                 ?>
                 <button name="<?php echo $zero?>" type="submit" class="ml-1 mr-2 align-self-center btn btn-danger btn-sm">Zeitfenster reservieren</button>
               </div>
               </form>
             </div>
           </div>
        </div>


        <?php
          $zero ++;  }
        ?>

        </div>
      </div>
  </body>

  </html>
