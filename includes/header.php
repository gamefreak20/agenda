<html>
	<head>
		<title>
			Site
		</title>
    <link rel="stylesheet" type="text/css" href="includes/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <script src="js/ajax.js"></script>
    <script src="js/script.js"></script>

    <script type="text/javascript">
      $(function() {
        $('[data-toggle="popover"]').popover()
      })
      $(function() {
        $('.example-popover').popover({
          container: 'body'
        })
      })
    </script>
    <?php

    session_start();

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
    error_reporting(E_ERROR | E_PARSE);

		require_once('includes/ini.php');

    if ($_SESSION['Rechtenn'] !== 'Admin' && $_SESSION['Rechtenn'] !== 'Member' && $_SESSION['Rechtenn'] !== 'Kijker' && $_SESSION['Rechtenn'] !== 'Mod' && $_SESSION['Rechtenn'] !== 'Helper'){

      header('location: https://81322.ict-lab.nl/site/');
      exit();

    }

    $idtoken1 = $_SESSION['id'];

    $querytoken1 = "SELECT * FROM `eigen_inlog_inlogtoken` WHERE userid = '$idtoken1'";
    $resultaattoken1 = mysqli_query($mysqli, $querytoken1);
    $rowtoken1 = mysqli_fetch_array($resultaattoken1);

    $inlogtoken1 = $rowtoken1['inlogtoken'];
    $inlogtoken2 = $_SESSION['logintoken'];

    if ($inlogtoken1 !== $inlogtoken2){
      //echo $inlogtoken1."<br>".$inlogtoken2;
      header('location:https://81322.ict-lab.nl/site/');
      exit();
    }

    $sqlban = "SELECT * FROM eigen_inlog_ban WHERE userid = '$idtoken1' AND voorbij = '0';";
    $resultaatban = mysqli_query($mysqli, $sqlban);
    if (mysqli_num_rows($resultaatban) === 0){

    } else {
      header('location: https://81322.ict-lab.nl/site/banned.php');
      exit();
    }

    ?>

</header>
<body>
