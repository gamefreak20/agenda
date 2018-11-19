<?php

session_start();
require_once('includes/config.php');

if ($_GET['maand_'] == "" || $_GET['maand_'] == NULL || !isset($_GET['maand_']) || empty($_GET['maand_']) || is_null($_GET['maand_'])){
  $maand = date("m");
} else {
  $maand = mysqli_real_escape_string($mysqli, $_GET['maand_']);
  $maand = htmlspecialchars($maand, ENT_QUOTES);
}

if($_GET['jaar_'] == "" || $_GET['jaar_'] == NULL || !isset($_GET['jaar_']) || empty($_GET['jaar_']) || is_null($_GET['jaar_'])){
  $jaar = date("Y");
} else {
  $jaar = mysqli_real_escape_string($mysqli, $_GET['jaar_']);
  $jaar = htmlspecialchars($jaar, ENT_QUOTES);
}

if($_GET['jaartelling_'] == "" || $_GET['jaartelling_'] == NULL || !isset($_GET['jaartelling_']) || empty($_GET['jaartelling_']) || is_null($_GET['jaartelling_'])){
  $jaartelling = "Chr";
} else {
  $jaartelling = mysqli_real_escape_string($mysqli, $_GET['jaartelling_']);
  $jaartelling = htmlspecialchars($jaartelling, ENT_QUOTES);
}

$dag = mysqli_real_escape_string($mysqli, $_GET['dag']);
$dag = htmlspecialchars($dag, ENT_QUOTES);

$maand = preg_replace('/\s+/', '', $maand);
$jaar = preg_replace('/\s+/', '', $jaar);
$jaartelling = preg_replace('/\s+/', '', $jaartelling);
$dag = preg_replace('/\s+/', '', $dag);

$maand = str_replace(' ', '', $maand);
$jaar = str_replace(' ', '', $jaar);
$jaartelling = str_replace(' ', '', $jaartelling);
$dag = str_replace(' ', '', $dag);

if ($jaartelling == "he") {
  $echteJaar = $jaar-10000;
} else {
  $echteJaar = $jaar;
}

$userid = $_SESSION['id'];
//echo $userid." ".$dag." ".$maand." ".$echteJaar;

// $query = "SELECT `tijdvan`,`titel`,`tijdtot`,`bericht`,`jaar`,`maand`,`dag` FROM `agenda_afspraken` WHERE `userid`=? AND `dag`=? AND `maand`=? AND `jaar`=?";
// $stmt = mysqli_stmt_init($mysqli);
// if (!mysqli_stmt_prepare($stmt, $query)) {
//   echo "SQL statement error2";
// } else {
//   mysqli_stmt_bind_param($stmt, "ssss", $userid, $dag, $maand, $echteJaar);
//   mysqli_stmt_execute($stmt);
//   $resultaat = mysqli_stmt_get_result($stmt);
// }

  $query = "SELECT `tijdvan`,`titel`,`tijdtot`,`bericht`,`jaar`,`maand`,`dag` FROM `agenda_afspraken` WHERE `userid`= '$userid' AND `dag`= '$dag' AND `maand`= '$maand' AND `jaar`= '$jaar'";
  $resultaat = mysqli_query($mysqli, $query);

  if (mysqli_num_rows($resultaat) === 0){

    $Niks = "Niks";
  echo json_encode($Niks);

  } else {

  while ($row = mysqli_fetch_assoc($resultaat)) {
    $data[] = $row;
  }
  echo json_encode($data);
}

?>
