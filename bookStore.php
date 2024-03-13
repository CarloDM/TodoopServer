<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Controlla se la richiesta è una POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ricevi i dati dalla richiesta POST
    $json_data = file_get_contents('php://input');
    // Decodifica i dati JSON ricevuti
    $data = json_decode($json_data, true);

    if($data !== null){
        // salvare libro in base a suo id, l id del book sarà il nome del file
        $file_name = $data['id'] . '.json';

        $file_path = 'store/books/' . $file_name ;
        // Scrivi i dati JSON nel file
        $result = file_put_contents($file_path, $json_data);
        // Verifica se la scrittura nel file è avvenuta con successo
        if ($result !== false) {
          echo json_encode(array('success' => true, 'message' => 'Dati book salvati con  successo.'));
        } else { // <---  se $result restituisce false 
          echo json_encode(array('success' => false, 'message' => 'Errore durante il salvataggio dei dati.'));
        };

      }else{ // <---  se la data è Null 
        echo json_encode(array('success' => false, 'message' => 'Dati non validi.'));
      };

}else{ // <---  se la richiesta non è una POST
  echo json_encode(array('success' => false, 'message' => 'Richiesta non valida.'));
};


?>