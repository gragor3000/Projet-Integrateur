<!--DEBUG MENU -->
<?php $acc_type = 0; ?>

<?php switch($acc_type) { case 3: ?>
<!--MENU DES STAGIAIRES-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">C&Eacute;GEP R&eacute;gional de Lanaudi&egrave;re &agrave; Joliette</a> [Stagiaire]
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?=nom,prenom ?><span class="caret"></span></a>
                <ul class="dropdown-menu well">

                </ul>
            </li>
            <li><tab></tab></li>
        </ul>
    </div>
</nav>
<?php break; case 2: ?>
<!--MENU DES SUPERVITEURS-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">C&Eacute;GEP R&eacute;gional de Lanaudi&egrave;re &agrave; Joliette</a> [Superviseur]
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?=nom,prenom ?><span class="caret"></span></a>
                <ul class="dropdown-menu well">

                </ul>
            </li>
            <li><tab></tab></li>
        </ul>
    </div>
</nav>
<?php break; case 1: ?>
<!--MENU DES COORDONNATEURS-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">C&Eacute;GEP R&eacute;gional de Lanaudi&egrave;re &agrave; Joliette</a> [Coordonnateur]
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?=nom,prenom ?><span class="caret"></span></a>
                <ul class="dropdown-menu well">

                </ul>
            </li>
            <li><tab></tab></li>
        </ul>
    </div>
</nav>
<?php break; default: ?>
<!--MENU DES VISITEURS-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">C&Eacute;GEP R&eacute;gional de Lanaudi&egrave;re &agrave; Joliette</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Connexion<span class="caret"></span></a>
                <ul class="dropdown-menu well">
                    <form class="form-horizontal" role="form" id="connexion">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email"><span class="glyphicon glyphicon-user"></span></label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="superviseur@compagnie.tld" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pass"><span class="glyphicon glyphicon-lock"></span></label>
                            <div class="col-sm-10"> 
                                <input type="password" class="form-control" id="pass" placeholder="Mot de passe" required />
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-offset-2 col-md-3">
                                <button type="submit" class="btn btn-xs btn-default">Soumettre</button>
                            </div>
                            <div class="col-md-offset-1 col-md-6">
                                <a href="#"><small>Oubli&egrave;?</small></a>
                            </div>
                        </div>
                    </form>
                </ul>
            </li>
            <li><tab></tab></li>
        </ul>
    </div>
</nav>
<?php } ?>