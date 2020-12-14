<?php

// Routes => décrémenter / réserver un vol => avec nos params
// test localhost:3000/endpoint.php?flight_id=3&mail=joanzaf@lilo.org
$flight_id = (int)$_GET['flight_id'];
$mail = $_GET['mail'];
//headers 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Get the data
include "api.php";

if (getPlacesFromFlight($flight_id, "nb_places", $pdo)) { //check si dispo
    updateNumberOfPlaces($flight_id, $pdo); // decrémenter le nombre de place d'un vol
}


$flights = getFlightsByUserMail($mail, $pdo); // array? 

$itemCount = count($flights);


//formatter en JSON et response
http_response_code(200);
echo json_encode($flights);
