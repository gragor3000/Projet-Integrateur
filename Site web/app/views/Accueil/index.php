<!DOCTYPE html>
<html>
    <head>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CEGEP Joliette | 420.AA | Outil de Gestion des Stages</title>
        
        <!--Bootstrap 3.3.6 et jQuery 2.2.0-->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <!--Outils maison-->
        <link rel="stylesheet" href="css/default.css">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">C&Eacute;GEP R&eacute;gional de Lanaudi&egrave;re &agrave; Joliette</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Contact</a></li> 
                    <li><a data-toggle="collapse" data-target="#inscription" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Proposer un stage</a></li>
                    <li><tab></tab></li>
                </ul>
            </div>
        </nav>
        <h3>FIXED TOP SPACER</h3>
        <div class="container">
            <!--Présentation-->
            <div class="row" style="vertical-align: middle;">
                <div class="col-md-9">
                    <h2>D&eacute;partement de la Technique en Informatique<br>
                        <small>vous acceuil sur son site de gestion des stages.</small>
                    </h2>
                </div>
            </div>
            <br>
            <form role="form" id="inscription" class="panel panel-default collapse">
                <div class="panel-heading">
                    <div>
                        <h3>Inscription du responsable de projet et description d&eacute;taill&eacute;e du stage propos&eacute;</h3>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Courriel</label>
                                <input type="email" class="form-control" id="email" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" required />
                            <label for="pre">Pr&eacute;nom</label>
                            <input type="text" class="form-control" id="pre" required />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="pass">Mot de passe</label>
                            <input type="password" class="form-control" id="pass" required />
                            <label for="word">Entrer de nouveau</label>
                            <input type="password" class="form-control" id="word" required />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 well form-group">
                            <label for="titre">Titre du projet</label>
                            <input type="email" class="form-control" id="titre" required />
                            <label for="desc">Description</label>
                            <textarea class="form-control" id="desc" required></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
