<?php

// réserver un vol => avec nos params
// test localhost:3000/payment.php on récupère par la méthode POST
$flight_id = (int)$_POST['flight_id'];
$mail = $_POST['mail'];

//headers 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//BDD change
include "api.php";

if (getPlacesFromFlight($flight_id, "nb_places", $pdo)) { //check si dispo

    updateNumberOfPlaces($flight_id, $pdo); // decrémenter le nombre de place d'un vol
    $nb_insertion = addReservationToUser($mail, $flight_id, $pdo);   // insérer un vol réservé

    // réponse du serveur
    $response = getFlightsByUserMail($mail, $pdo); //retourner la réponse
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(400);
    echo json_encode(["message" => "not enough places remaining"]);
}
