<?php

require_once('includes/header.php');
?>
<div id="kalender">
  <style>

  	.transparant{
  		color: rgba(0,0,0,0.5);
  	}
  	.transparant-background{
  		background-color: rgba(220,220,220,0.5);
  	}
  	.transparant-border{
  		border-color: rgba(200,200,200,0.5);
  	}


  </style>
  <!-- <form action="#" method="get">
    dag: <input type="text" name="dag">
    maand: <input type="text" name="maand">
    jaar: <input type="text" name="jaar">
    <input type="submit" name="submit">
  </form> -->
  <button class="btn btn-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Settings <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAASsSURBVGhD7dlZ6G5TGMfxv3keDgqZXQnnJFOGXCniAlGUIWSKknNhKolMZUi4MEdyQ5E5UzLPFwplChlS5inz+P2mVc95PHvb79A5vTm/+tTpv9a7917vu/faz1pnbmn6syq2LKyJmcrR+KtwAWYqF6MayD2YqdyHaiDvYabyNqqB/Ik1sERzEFb+55+9WQm/oxqIdsWQHIgh5xsp58GLeA3z/UNPtkW++Oh49GUe7oB9H8LUBtMG0fyEU7AMcryIixD7Z/djU1TZAx8g9p/KYPIgogexAcze8IS/ouqb+ay8iMOxLJbHuei6JScazF6oDhp9ihfS30b1Bp5Pf6tciLGyHJ5EddDF7TO0X3+sbI5vUR28y4+4G6fhCPjLHgKfq5vwOarP9dkPE8eLqQ6efYhjYZ3VF39pn6mXUR0nuw5Ty22oTiIf3EuwCkaJs96R+AHVcfUWVsPUsg4+Rj7RzzgUOVvhVNyMB3ArzsfucJaK2R4fIR/bGXAnTDV+e68gnshf4jDEbIdHEftlzlIHIMaX7DeI/b7E1MsZy5N4Enk7xRyHoe8RXY0V0LI/cp+zMNXked5bIT4TDiK2D3ULYpztYvsXiIOdKJYT3kbxBM5OLd7jvyC2j+IEtGyNPxDb98VEWRu74QbEA/ueiFNs3zNh3WS7s0/VLquDuAR+BrH9EeyJQS/E1eG3fDkeRjVDNXGV5+xU9fkOTq0x+6DruPEX9kVa9ZETwFO4FidjCywSZ43qg5XT0XIGqj7VlGx2xm/I/e9Fi3dBbu9yIhbJKAPxTd9iyZHbX0dfbkf+jCvKFsui3N5looFYO7VUa/M70RfL9fwZ67kWZ8Pc3mWigRyMFt/Yuf059MXaKX/GSaFlQ+T2LhMNZCFa3KfK7U6fPgtVNsJXyJ95HC07Ird3+ddArKVcuPjQuWVTfaixfmrpejC957dBzMZ4FlX/OIEcg6pP8zUc+FVYgN44r3uRvqycx+OBXORYihsLQGun2N5YUHrrnYMbkWup2G8TtDi9x/Y3cTZck2yGsVPtirieaKlqpFFcipb14As3tuf30UTJ37qLoriLYgEY24dyvR9rtisQ2/211sLUchLiCXQUWlaEBWDu0+clOEO1WGflmu16TDVeaN5vcmW3A2LcfPuvNbnf8mWI2zvuh72D2M9Bde1/jR0H8iriiWQ57zMU0+o2Z0CLRR9yvwRnGksaZ68YZ8xqt8ZpOv5iU4nfYD5RY4HoAz9OvJ3yLxE9hrw0HjuW0Hk9UnFR5IUNibOTD/aQdcyZmDjr4hNUJ6j4Vnc94QvO95D3uM+Ct4jPky87b7k8xfZx+dxVKQzOXagOvri9i7H//7HacMhcW/TtSw3h7VXVX5m34ljxlnAXvDqofEh3wfrw7fw9qn5dnIZ9T1h2uIx1d7/qp/fhOmXsdA3GC3CajfEN7X5Vrs0yayfLDvcEYqwUXL7m52fiQbTEwVgw5s21HGe5eCGZBWBfnPnaZqCDmKhQzHEwlvlDdjLsky8+GrKz7v9DupKc6iDGibsd1SC0xC9ulDyNahAuimYq16AayBOYqTj7VAO5EjMVp0tL+sxNjqX5H2Ru7m+jerZU7WfjmQAAAABJRU5ErkJggg==" width="20%">
    </button>
    <div class="collapse" id="collapseExample">
      <div class="card card-body">
        <form action="#" method="get" accept-charset="utf-8">
          jaartelling:
          <?php
          if ($_GET['jaartelling'] == "he"){
          ?>
          <select name="jaartelling">
            <option value="he">he</option>
            <option value="Chr">n.Chr.</option>
          </select>
          <?php
          } else {
          ?>
          <select name="jaartelling">
            <option value="Chr">n.Chr.</option>
            <option value="he">he</option>
          </select>
          <?php
          }
          ?>
          <input type="submit" name="submit">
        </form>
      </div>
    </div>
    <br>
  <?php

  $dag2 = mysqli_real_escape_string($mysqli, $_GET['dag']);
  $dag2 = htmlspecialchars($dag2, ENT_QUOTES);

  if ($_GET['jaartelling'] == "" || !isset($_GET['jaartelling']) || $_GET['jaartelling'] == NULL){
    $jaartelling = "Chr";
  } else {
    $jaartelling = mysqli_real_escape_string($mysqli, $_GET['jaartelling']);
    $jaartelling = htmlspecialchars($jaartelling, ENT_QUOTES);
  }

  if ($_GET['maand'] == "" || !isset($_GET['maand']) || $_GET['maand'] == NULL){
    $maand = date('m');
  } else {
    $maand = mysqli_real_escape_string($mysqli, $_GET['maand']);
    $maand = htmlspecialchars($maand, ENT_QUOTES);
  }
  if ($_GET['jaar'] == "" || !isset($_GET['jaar']) || $_GET['jaar'] == NULL){
    $jaar = date('Y');
  } else {
    $jaar = mysqli_real_escape_string($mysqli, $_GET['jaar']);
    $jaar = htmlspecialchars($jaar, ENT_QUOTES);
    if ($jaartelling == "he") {
      $jaar = $jaar - 10000;
    }
  }
  $alGedaan = true;

  if ($jaartelling == "he"){
    $jaarGeven = $jaar + 10000;
  } else {
    $jaarGeven = $jaar;
  }

  $datumMaandTerug2 = $maand - 1;
  $datumMaandHeen = $maand + 1;

  $datumMaandVandaag = $maand;

  if($datumMaandTerug2 == 0){
    $datumMaandTerug2 = 12;
    $jaarTerug = $jaarGeven - 1;
  } else {
    $jaarTerug = $jaarGeven;
  }
  if($datumMaandHeen == 13){
    $datumMaandHeen = 1;
    $jaarHeen = $jaarGeven + 1;
  } else {
    $jaarHeen = $jaarGeven;
  }

  switch ($datumMaandHeen) {
    case '1':
        $datumMaandHeenDag = "Januari";
      break;
    case '2':
        $datumMaandHeenDag = "Februari";
      break;
    case '3':
        $datumMaandHeenDag = "Maart";
      break;
    case '4':
        $datumMaandHeenDag = "April";
      break;
    case '5':
        $datumMaandHeenDag = "Mei";
      break;
    case '6':
        $datumMaandHeenDag = "Juni";
      break;
    case '7':
        $datumMaandHeenDag = "Juli";
      break;
    case '8':
        $datumMaandHeenDag = "Augustus";
      break;
    case '9':
        $datumMaandHeenDag = "September";
      break;
    case '10':
        $datumMaandHeenDag = "Oktober";
      break;
    case '11':
        $datumMaandHeenDag = "November";
      break;
    case '12':
        $datumMaandHeenDag = "December";
      break;

    default:
        $datumMaandHeenDag = $datumMaandHeen;
      break;
  }

  switch ($datumMaandVandaag) {
    case '1':
        $datumMaandVandaagDag = "Januari";
      break;
    case '2':
        $datumMaandVandaagDag = "Februari";
      break;
    case '3':
        $datumMaandVandaagDag = "Maart";
      break;
    case '4':
        $datumMaandVandaagDag = "April";
      break;
    case '5':
        $datumMaandVandaagDag = "Mei";
      break;
    case '6':
        $datumMaandVandaagDag = "Juni";
      break;
    case '7':
        $datumMaandVandaagDag = "Juli";
      break;
    case '8':
        $datumMaandVandaagDag = "Augustus";
      break;
    case '9':
        $datumMaandVandaagDag = "September";
      break;
    case '10':
        $datumMaandVandaagDag = "Oktober";
      break;
    case '11':
        $datumMaandVandaagDag = "November";
      break;
    case '12':
        $datumMaandVandaagDag = "December";
      break;

    default:
        $datumMaandVandaagDag = $datumMaandVandaag;
      break;
  }

  switch ($datumMaandTerug2) {
    case '1':
        $datumMaandTerug = "Januari";
      break;
    case '2':
        $datumMaandTerug = "Februari";
      break;
    case '3':
        $datumMaandTerug = "Maart";
      break;
    case '4':
        $datumMaandTerug = "April";
      break;
    case '5':
        $datumMaandTerug = "Mei";
      break;
    case '6':
        $datumMaandTerug = "Juni";
      break;
    case '7':
        $datumMaandTerug = "Juli";
      break;
    case '8':
        $datumMaandTerug = "Augustus";
      break;
    case '9':
        $datumMaandTerug = "September";
      break;
    case '10':
        $datumMaandTerug = "Oktober";
      break;
    case '11':
        $datumMaandTerug = "November";
      break;
    case '12':
        $datumMaandTerug = "December";
      break;

    default:
        $datumMaandTerug = $datumMaandTerug;
      break;
  }

  echo "<div style='float: left'><a href='index.php?maand={$datumMaandTerug2}&jaar={$jaarTerug}&jaartelling={$jaartelling}'><button style='padding-left: 50px; padding-right: 50px;'><--".$datumMaandTerug."</button></a></div>";
  echo "<div style='margin-left: 40%; margin-right: 40%; width: 20%;'>".$datumMaandVandaagDag."-{$jaarGeven}</div>";
  echo "<div style='float: right'><a href='?maand={$datumMaandHeen}&jaar={$jaarHeen}&jaartelling={$jaartelling}'><button style='padding-left: 50px; padding-right: 50px;'>".$datumMaandHeenDag."--></button></a></div>";
  ?>
  <div class="container" style="text-align: center;">
    <div class="row" style="text-align: center;">
  <?php
  $number = cal_days_in_month(CAL_GREGORIAN, $maand, $jaar);
  for ($z=0; $z < 7; $z++) {
    switch ($z) {
      case 0:
          $dayy = "maandag";
        break;
      case 1:
          $dayy = "Dinsdag";
        break;
      case 2:
          $dayy = "Woensdag";
        break;
      case 3:
          $dayy = "Donderdag";
        break;
      case 4:
          $dayy = "Vrijdag";
        break;
      case 5:
          $dayy = "Zaterdag";
        break;
      case 6:
          $dayy = "Zondag";
        break;

      default:
          $dayy = "Error";
        break;
    }
  ?>
      <div class="col-sm" style="text-align: center;">
        <div class="card2" style="width: 120%; height: 10%; border: none; text-align: center;">
          <div class="card-body" style="text-align: center;">
            <p class="card-text"></p>
            <button type="button" class="close datumvraag float-right" aria-label="Close">
            </button>
            <p class="card-text datumletter transparant" style="text-align: center;"><?php echo $dayy;?></p>
          </div>
        </div>
      </div>
  <?php
  }
  ?>
    </div>
  </div>
  <div class="container">

  <?php
  $dag = 0;
  for ($i=0; $i < $number; $i++) {

    $ii = $i+1;

    $time = $jaar."-".$datumMaandVandaag."-".$ii;
    $timestamp = strtotime($time);
    $day = date('D', $timestamp);

    switch ($day) {
      case 'Mon':
          $dayNummer = 0;
        break;
      case 'Tue':
          $dayNummer = 1;
        break;
      case 'Wed':
          $dayNummer = 2;
        break;
      case 'Thu':
          $dayNummer = 3;
        break;
      case 'Fri':
          $dayNummer = 4;
        break;
      case 'Sat':
          $dayNummer = 5;
        break;
      case 'Sun':
          $dayNummer = 6;
        break;

      default:
          $dayNummer = 0;
        break;
    }
    if ($alGedaan){
      ?>
      <div class="row">
      <?php
      $maandd = $maand - 1;
      if ($maandd == 0){
        $maandd = 12;
        $jaarr = $jaar + 1;
      } else {
        $jaarr = $jaar;
      }
      $number2 = cal_days_in_month(CAL_GREGORIAN, $maandd, $jaarr);
      $number3 = $number2 - $dayNummer + 1;
      for ($d=0; $d < $dayNummer; $d++) {
        ?>
        <div class="col-sm transparant-border">
          <div class="card2 transparant-background transparant-border" style="width: 120%;">
            <div class="card-body">
              <p class="card-text"></p>
              <p class="card-text float-left border-top border-right datumletter transparant transparant-border"><?php echo $number3;?></p>
            </div>
          </div>
        </div>
        <?php
        $dag++;
        $number3++;
      }
    } else if($dag == 0){
      ?>
      <div class="row">
    <?php
    }
    $alGedaan = false;

  ?>

      <div class="col-sm">
  			<div onclick="openDag(<?php echo $ii ?>, <?php echo $datumMaandVandaag ?>, <?php echo $jaar ?>, '<?php echo $jaartelling ?>')" class='a-normal'>
  	 <?php
      if ($ii == $dag2){
  		?>
  		<div class="card2 border-warning" style="width: 120%;">
  		<?php
  	  } else if(date('Y') == $jaar && date('m') == $maand && date('d') == $ii){
        ?>
        <div class="card2 border-primary" style="width: 120%;">
        <?php
        } else {
        ?>
        <div class="card2" style="width: 120%;">
          <?php
          }
          ?>
          <div class="card-body overflow-hidden">
            <p class="card-text">Some quick example text to build on the card title and sadsad asd sad as d...</p>
            <button type="button" class="close datumvraag float-right" aria-label="Close">
              <span aria-hidden="true" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">?</span>
            </div>
            <p class="card-text float-left border-top border-right datumletter"><?php echo $ii;?></p>
          </div>
        </div>
      </div>
  	</button>

  <?php
  if ($dag == 0) {
    ?>
    <?php
    $dag++;
  } else if ($dag == 6) {

    ?>
  </div>
    <?php
    $dag = 0;

  } else {
    $dag++;
  }

  }
  $dayAfterMonth = 0;
  if ($dag != 0) {
    $dag2 = 7 - $dag;
    for ($l=0; $l < $dag2; $l++) {
  	  $dayAfterMonth++;
      ?>
      <div class="col-sm">
          <div class="card2 transparant" style="width: 120%;">
            <div class="card-body transparant-border transparant-background">
              <p class="card-text transparant-border transparant-background"></p>
              <p class="card-text float-left border-top border-right datumletter transparant"><?php echo $dayAfterMonth; ?></p>
            </div>
          </div>
        </div>
      <?php
    }
  }

   ?>
  </div>
</div>
</div>
<div id="overview">

</div>
