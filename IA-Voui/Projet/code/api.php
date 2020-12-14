<?php


// get a flight
$pdo = new PDO('mysql:host=localhost;dbname=flights', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

function login(string $mail, $pdo)
{
    $sql = "SELECT * FROM users WHERE mail=:mail";
    $request = $pdo->prepare($sql);
    $request->execute([
        "mail" => $mail
    ]);

    return $request->fetch();
}

//Db functions
function getAllFlightsByOrigin(string $origin, $pdo)
{
    $sql = "SELECT * FROM flights WHERE origin=:origin";
    $request = $pdo->prepare($sql);
    $request->execute([
        "origin" => $origin
    ]);
    return $request->fetchAll();
}


function getFlightById(int $id, $pdo)
{
    $sql = "SELECT * FROM flights WHERE id=:id";
    $request = $pdo->prepare($sql);
    $request->execute([
        "id" => $id
    ]);
    return $request->fetch();
}


//Updating : decrement when paying a flight / save reseervation ids on next connexion/ 

function getPlacesFromFlight(int $id, string $param, $pdo)
{
    $sql = "SELECT * FROM  flights  WHERE id=:id AND nb_places>0";
    $request = $pdo->prepare($sql);
    $request->execute([
        "id" => $id
    ]);
    return $request->fetch();
}

function updateNumberOfPlaces(int $id, $pdo)
{
    $sql = "UPDATE  flights SET nb_places=nb_places-1 WHERE id=:id";
    $request = $pdo->prepare($sql);
    $request->execute([
        "id" => $id
    ]);
    return $request;
}

function getFlightsByUserMail(string $mail, $pdo)
{
    $sql = "SELECT * FROM  users 
            LEFT JOIN flights
                On users.id_reservation = flights.id
            WHERE users.mail=:mail AND users.id_reservation IS NOT NULL";
    $request = $pdo->prepare($sql);
    $request->execute([
        "mail" => $mail
    ]);

    return $request->fetchAll();
}


function addReservationToUser(string $mail, int $id, $pdo)
{
    $sql = "INSERT INTO users (mail, id_reservation) VALUES (:mail, :id)";
    $request = $pdo->prepare($sql);
    $request->execute([
        "mail" => $mail,
        "id" => $id
    ]);
    return $request;
}
//make the response 
 



//format a response