<?php
include '../backend/db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$query = "SELECT * FROM organisation WHERE id='" . $_GET["id"] . "'";
if ($result = $con->query($query)) {

    while ($row = $result->fetch_assoc()) {
        $ansprechpartner = $row["ansprechpartner"];
        $telnummer = $row["telefonnummer"];
        $name = $row["name"];
        $adresse = $row["adresse"];
    }
} else {
    echo "Diese Organisation kann nicht gefunden werden";
}

$con->close();
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

        <img src="LOGO.gif"  alt="Slogan" height="150" width="150" class="img-responsive pull-right" >

        <div class="page-header"><h1>Helping-Box<small> Denen helfen, die Hilfe brauchen</small></h1></div>

        <div class="container-fluid">

            <input type='hidden' name='userlat' value=''>
            <input type='hidden' name='userlong' value=''>

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
                                <input type='hidden' id="userlat" name='userlat'>
                                <input type='hidden' id="userlong" name='userlong'>
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a name="helfen" href="javascript:redirectHelfer();" >Helfer</a>
                                    </li>
                                    <li>
                                        <a name="orga" href="orga.php">Organisation</a>
                                    </li>
                                </ul>                           
                            </form>
                        </div>
                    </nav>
                    <h2><?php echo $name; ?></h2>
                    <div class="row"><div class="col-md-6"><div id="map"></div></div><div class="col-md-6"><p>Adresse: <?php echo $adresse; ?> </br>
                            <a target="_blank" href="https://maps.google.at/?daddr=<?php echo $adresse; ?>&om=1">Route starten</a></p>
                            <p>Ansprechpartner: <?php echo $ansprechpartner; ?></p>
                            <p>Telefonnummern: <?php echo $telnummer; ?></p></div></div>


                    <h3>Wir brauchen:</h3><br>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kategorie</th>
                                <th>Gegenstand</th>
                                <th>Bemerkung</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Klamotten</td>
                                <td>Socken</td>
                                <td>Am besten dicke Socken</td>
                            </tr>
                            <tr>
                                <td>Klamotten</td>
                                <td>Jacken</td>
                                <td>Bitte schicken sie uns keine Sommerjacken oder dünnere Jacken, da ja der Winter vor der Tür steht.</td>
                            </tr>
                            <tr>
                                <td>Sonstiges</td>
                                <td>Fahrrad</td>
                                <td>Ein Damenrad fehlt uns noch um einen Ausflug zu machen.</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <script>
                function initMap() {
                    var uluru = {lat: -53.363, lng: 131.044};
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 12
                    });
                    var geocoder = new google.maps.Geocoder();
                    var address = "<?php echo $adresse ?>";
                    geocoder.geocode({'address': address}, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                            var marker = new google.maps.Marker({
                                map: map,
                                position: results[0].geometry.location
                            });
                        } else {
                            alert('Die STraße konnte nicht gefunden werden: ' + status);
                        }
                    });
                }


            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlbG2ho4ssGTw0LNe33lSCJCJ9FScaOaE&callback=initMap">
            </script>
    </body>






</html>
