<?php
include '../backend/db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title>Helping Box</title>
        <meta name="description" content="Ein interaktiver Wegweiser für die ersten Schritte mit Brackets.">
        <link rel="stylesheet" href="main.css">
        <script src="index.js"></script>
    </head>
    <body>
        <div class="page-header"><h1>Helping-Box<small> Denen helfen, die Hilfe brauchen</small></h1></div>

        <div class="container-fluid">


            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapsediv">
                                <span class="sr-only">Navigation </span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                            </button> <a class="navbar-brand" href="index.html">HelpingBox</a>
                        </div>

                        <div class="collapse navbar-collapse" id="collapsediv">
                            <form method="post" action="helfen.php" id="redirect">
                                <input type='hidden' id='userlat' name='userlat'>
                                <input type='hidden' id="userlong" name='userlong'>
                                <ul class="nav navbar-nav">
                                    <li class="active">
                                        <a name="helfen" href="javascript:redirectHelfer();">Helfer</a>
                                    </li>
                                    <li>
                                        <a name="orga" href='orga.php' >Organisation</a>
                                    </li>
                                </ul>                           
                            </form>
                        </div>
                    </nav>
                </div>
            </div>

            <h3>Nach Organisationen suchen:</h3></br>
            <div class="list-group">
                <?php

                function geoToAddress($lat, $long) {
                    $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long";
                    $curlData = file_get_contents($url);
                    $address = json_decode($curlData);
                    $a = $address->results[0];
                    return explode(",", $a->formatted_address);
                }

                function getDistance($from, $to) {
                   
                    $from = urlencode($from[0]. " ".  $from[1]);
                    $to = urlencode($to);
                    $data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=de-DE");
                    $data = json_decode($data);
                    $time = 0;
                    $distance = 0;
                    foreach ($data->rows[0]->elements as $road) {
                        $time += $road->duration->text;
                        $distance += $road->distance->text;
                    }
                    $str = $distance . " km (ca. " . $time . " min)";
                    return $str;
                }

                $query = "SELECT id, name, adresse FROM organisation";
                if ($result = $con->query($query)) {

                    while ($row = $result->fetch_assoc()) {
                        echo ' <a href="organisation.php?id=' . $row["id"] . '" class="list-group-item">
                               <h4 class="list-group-item-heading">' . $row["name"] . '<p class="text-right">' . getDistance(geoToAddress($_POST["userlat"], $_POST["userlong"]), $row["adresse"]) . '</p></h4>
                    <p class="list-group-item-text">' . $row["adresse"] . '</p>
                               </a>';
                    }
                } else {
                    echo "Im Moment hat sich keine Organisation eingetragen";
                }

                $con->close();
                ?>

            </div>

        </div>
    </body>
</html>