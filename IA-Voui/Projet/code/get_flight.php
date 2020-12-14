<?php

// réserver un vol => avec nos params
// test localhost:3000/payment.php on récupère par la méthode POST
$flight_id = (int)$_GET['flight_id'];


//headers 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//BDD change
include "api.php";

$response = getFlightById($flight_id, $pdo);

// réponse du serveur

echo json_encode($response);
http_response_code(200);
