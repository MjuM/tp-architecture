<?php
include "api.php";

$pdo = new PDO("mysql:host=localhost;dbname=flights", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);



if (!empty($_GET['mail'])) {
    $connection = login($_GET['mail'], $pdo);
    $user_id = $connection->id; //object
    $user_name = "joan";
    header('Location: home.php?valid=true&mail=' . $_GET['mail']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Authentification</title>
</head>

<body>

    <div id="login_form">
        <h1>Flight API</h1>
        <form action="index.php">
            <p>E-mail : <input type="text" name="mail" id="mail"></p>
            <input type="submit" value="Se connecter">
            <input type="hidden" name="valid">
        </form>



    </div>

</body>

</html>