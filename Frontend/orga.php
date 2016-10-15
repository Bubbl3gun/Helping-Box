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
          <script src="organisation.js"></script>
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
                            </button> <a class="navbar-brand" href="#">HelpingBox</a>
                        </div>
                        <div class="collapse navbar-collapse" id="collapsediv">
                            <form method="post" action="helfen.php" id="redirect">
                                <input type='hidden' id="userlat" name='userlat'>
                                <input type='hidden' id="userlong" name='userlong'>
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a name="helfen" href="javascript:redirectHelfer();" >Helfer</a>
                                    </li>
                                    <li class="active">
                                        <a name="orga" href="orga.php">Organisation</a>
                                    </li>
                                </ul>                           
                            </form>
                        </div>
                    </nav>
                   <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" id="name" placeholder="Name der Organistation">
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="adresse" class="form-control" id="adresse" placeholder="Adresse">
                        </div>
                        <div class="form-group">
                            <label for="ansprechpartner">Ansprechpartner</label>
                            <input type="ansprechpartner" class="form-control" id="ansprechpartner" placeholder="Ansprechpartner">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Beispiel@info.de">
                        </div>
                        <div class="form-group">
                            <label for="telefonnummer">Telefonnummer</label>
                            <input type="telefonnummer" class="form-control" id="telefonnummer" placeholder="0123456789">
                        </div>
                        <label for="gesucht">Was wird gebraucht?</label>
                        <div class="form-group">
                            <label><input type="checkbox" id="addoption" value="">Klamotten</label>
                            <input type="hidden" id="addoptiontext" for="ex1" col-xs-2 id="gesucht" placeholder="Socken, Shirts, ..."</label>
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" id="addoption2" value="">Option 2</label>
                            <input type="hidden" id="addoptiontext2" for="ex1"  col-xs-2 id="gesucht" placeholder="Test"</label>
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" id="addoption3" value="">Option 3</label>
                            <input type="hidden" id="addoptiontext3" for="ex1" col-xs-2 id="gesucht" placeholder="Test"</label>
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" id="addoption4" value="">Option 4 </label>
                            <input type="hidden" id="addoptiontext4" for="ex1" col-xs-2 id="gesucht" placeholder="Test"</label>
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" id="addoption5" value="">Option 5</label>
                            <input type="hidden" id="addoptiontext5" for="ex1" col-xs-2 id="gesucht" placeholder="Test"</label>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-default">Senden</button>
                    </form>
                </div>
            </div>
        </div>

    </body>






</html>
