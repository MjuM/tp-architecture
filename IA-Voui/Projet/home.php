<?php


require "api.php";

$pdo = new PDO('mysql:host=localhost;dbname=flights', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

//new PDO('mysql:host=xxx;port=xxx;dbname=xxx', 'xxx', 'xxx')
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>API RESERVATION</title>
    <script>
        //sélectionner un paramètre précis dans l'url en cherchant dans window.location.search
        function obtenirParametre(sVar) {
            return unescape(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + escape(sVar).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
        }

        $(document).on('click', '.book_button', function(e) {
            let getParent = $(this).parent(); //selectionne classe parente du bouton
            let id = getParent.attr('id').replace("no_", ""); //id du parent extrait
            let places_text = getParent.children().eq(2).text() // cible l'info du nb place

            if (places_text.replace(" places", "") > 0) //extrait le nombre, si supérieur à 0 ok
            {

                $.get("get_flight.php", { // appel api avec ajax sur le endpoint "get_flight"
                    "flight_id": id
                }).done(function(flight) {
                    getParent.children().eq(2).text(`${flight.nb_places-1} places`);
                    $('#ajaxify .cart #process') // après l'appel on met à jour l'affichage
                        .append(`
                        <div class = "reserved_flight" id="no_${id}">
                            <p> From ${flight.origin} </p>
                            <p> To ${flight.destination} </p> 
                            <p> ${flight.prix} $ </p> 
                            <p> ${flight.nb_places-1} places </p>  
                        </div>
                                    `);
                })
            } else {
                getParent.css("background-color", "#f37878");
            }

        });


        //build endpoint
        $(document).on('click', '#pay_action', function(e) {
            let current_flights = $("#process").children();
            console.log(window.location.search)


            if (current_flights.length > 0) {
                for (flight of current_flights) {

                    let id = flight.id
                    let res = id.replace("no_", "");

                    $.post("payment.php", {
                            flight_id: res,
                            mail: obtenirParametre('mail')
                        })
                        .done(function(data) {
                            $('#payment')
                                .html("");

                            for (flight of data) {

                                $('#payment')
                                    .append(`
                                    <div class = "reserved_flight" id = "num_${flight.id}">
                                        <p> To ${flight.destination} </p> 
                                        <p> ${flight.prix} $ </p> 
                                        <p> ${flight.nb_places}  places </p>  
                                    </div>
                                    `);
                                console.log("Data Loaded: " + flight.destination);
                            }

                        });

                }

                //effacer après le paiement
                $("#process").html('');
            }

        });

        //undoing ok
        $(document).on('click', '#undo_action', function(e) {
            $('#process')
                .html("");
            console.log("undo cart")
        });
    </script>

</head>

<body>
    <h1>Flights for <?= $_GET['mail'] ?></h1>

    <div id="airports">

        <div class="location">
            <h1>CDG</h1>
            <p id="location"></p>
            <div class="vols">
                <?php
                $flights = getAllFlightsByOrigin("CDG", $pdo);
                //var_dump($flights); //OK get the flights

                foreach ($flights as $flight) {
                ?>
                    <div class="vol" id="no_<?= $flight['id']; ?>">
                        <p> To <?= $flight['destination'] ?></p>
                        <p><?= $flight['prix'] ?> $ </p>
                        <p><?= $flight['nb_places'] ?> places</p>
                        <button class="book_button">Réserver</button>
                    </div>
                <?php
                }
                ?>

            </div>

        </div>

        <div class=" location">
            <h1>JFK</h1>
            <div class="vols">
                <?php
                $flights = getAllFlightsByOrigin("JFK", $pdo);
                foreach ($flights as $flight) {
                ?>
                    <div class="vol" id="no_<?= $flight['id']; ?>">
                        <p> To <?= $flight['destination'] ?></p>
                        <p><?= $flight['prix'] ?> $ </p>
                        <p><?= $flight['nb_places'] ?> places</p>
                        <button class="book_button">Réserver</button>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="location">
            <h1>DTW</h1>
            <div class="vols">
                <?php
                $flights = getAllFlightsByOrigin("DTW", $pdo);
                foreach ($flights as $flight) {
                ?>
                    <div class="vol" id="no_<?= $flight['id']; ?>">
                        <p> To <?= $flight['destination'] ?></p>
                        <p><?= $flight['prix'] ?> $ </p>
                        <p><?= $flight['nb_places'] ?> places</p>
                        <button class="book_button">Réserver</button>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>


    </div>

    <div id="ajaxify">
        <div class="cart">
            <div id="process">

            </div>
            <div class="action">
                <button id="pay_action">Pay</button>
                <button id="undo_action">Undo</button>
            </div>

        </div>

        <div id="payment">
            <?php
            $user_mail = $_GET['mail']; // (int)$_GET['user_id'];
            $reserved_flights = getFlightsByUserMail($user_mail, $pdo);
            foreach ($reserved_flights as $flight) {
            ?>
                <div class="reserved_flight" id="num_<?= $flight['id']; ?>">
                    <p>Dép : <?= $flight['origin'] ?></p>
                    <p>Arr : <?= $flight['destination'] ?></p>
                    <p><?= $flight['prix'] ?> $ </p>
                    <p><?= $flight['nb_places'] ?> places</p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>


    <!--
    <div class="test">
        <form action="">
            <label for="fname">First name:</label>
            <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">
        </form>
        <p>Suggestions: <span id="txtHint"></span></p>
    </div>
    -->

</body>

</html>