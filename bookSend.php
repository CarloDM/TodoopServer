<?php
header("Access-Control-Allow-Origin: *");


  // var_dump($_SERVER);

  
  $id = $_GET['id'];

  // arrivare al file .json identificato
  $file_path = 'store/books/'. $id .'.json';

  // recupera i dati JSON nel file
  $result = file_get_contents($file_path);

  // rispondi alla chiamata con l'oggetto salvato
  echo $result;

?>