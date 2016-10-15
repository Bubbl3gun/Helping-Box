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
            <form method="post" action="/backend/redirect.php" id="redirect">
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

                                <ul class="nav navbar-nav">
                                    <li class="active">
                                        <a name="helfen" href="javascript:redirect()"  >Helfer</a>
                                    </li>
                                    <li>
                                        <a name="orga" onclick="redirect()" >Organisation</a>
                                    </li>
                                </ul>                           

                            </div>
                        </nav>
                    </div>
                </div>
            </form>
            <h3>Nach Organisationen suchen:</h3></br>
            <div class="list-group">
                <?php
      
                $query = "SELECT id, name, adresse FROM organisation";
                if ($result = $con->query($query)) {

                    while ($row = $result->fetch_assoc()) {
                        echo ' <a href="organisation.php?id=' . $row["id"] . '" class="list-group-item">
                               <h4 class="list-group-item-heading">' . $row["name"] . '</h4>
                    <p class="list-group-item-text">' . $row["adresse"] . '</p>
                               </a>';
                    }
                } else {
                    echo "Im Moment hat sich keine Organisation eingetragen";
                }


                $con->close();
                ?>

            </div>
            <?php
            echo $_POST["userlat"];
            ?>
        </div>
    </body>
</html>