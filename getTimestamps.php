<?php

header("Access-Control-Allow-Origin: *");

$storeDir = 'store/';
$stats = scandir($storeDir);
$booksDir = 'store/books/';
$books = scandir($booksDir);
$response = [];
foreach($stats as $file){
  if(pathinfo($file, PATHINFO_EXTENSION) == 'json'){
    $content = file_get_contents($storeDir . $file);
    $contentDec = json_decode($content, true);
    $response[$file] = $contentDec['lastTimeStamp'];
  }
};

foreach($books as $book){
  if(pathinfo($book, PATHINFO_EXTENSION) == 'json'){
    $content = file_get_contents($booksDir  . $book);
    $contentDec = json_decode($content, true);
    $response['books'][] =  [$book => $contentDec['lastTimeStamp']];
  }
}


// var_dump($response);

echo json_encode($response);


?>