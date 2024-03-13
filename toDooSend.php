<?php

header("Access-Control-Allow-Origin: *");

  $file_path = 'store/userToDoo.json';

  // recupera i dati JSON nel file
  $result = file_get_contents($file_path);

  echo json_decode((json_encode($result)));

?>