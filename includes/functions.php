<?php

// Pakt ip van gebruiker

function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

// Maakt een random string aan

function generateRandomString($length) {

  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';

  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;

}

function veiligUserInput($input, $mysqli){

  $input2 = mysqli_real_escape_string($mysqli, $input);
  $input2 = htmlspecialchars($input2, ENT_QUOTES);

  return $input2;

}

function stringLeeg($input){

  if ($input == "" || $input == NULL || !isset($input) || empty($input) || is_null($input)){
    return true;
  } else {
    return false;
  }

}

function intLeeg($input){

  if ($input == "" || $input == NULL || !isset($input) || empty($input) || is_null($input) || !is_numeric($input)){
    return true;
  } else {
    return false;
  }

}

 ?>
