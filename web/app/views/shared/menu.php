<!--DEBUG MENU -->
<?php $acc_type = 3; ?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="acceuil/index">C&Eacute;GEP R&eacute;gional de Lanaudi&egrave;re &agrave; Joliette</a>
        </div>
		<?php switch($acc_type) { case 3: ?>
		<!--MENU DES STAGIAIRES-->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?=$name ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
					<li><a href="Stagiaire/Info">Mes infos</a></li>
					<li><a href="Stagiaire/Index">Stages</a></li>
					<li><a href="Acceuil/Quitter">Quitter</a></li>
                </ul>
            </li>
            <li><tab></tab></li>
        </ul>
		<?php break; case 2: ?>
		<!--MENU DES ENTREPRISES-->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?=$name?><span class="caret"></span></a>
                <ul class="dropdown-menu">
					<li><a href="Superviseur/Info">Mes infos</a></li>
					<li><a href="Superviseur/Projets">Projets</a></li> 
					<li><a href="Acceuil/Quitter">Quitter</a></li> 
                </ul>
            </li>
            <li><tab></tab></li>
        </ul>
		<?php break; case 1: ?>
		<!--MENU DES COORDONNATEURS-->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?=$name ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
					<li><a href="Coordonnateur/Info">Mes infos</a></li>
					<li><a href="Coordonnateur/Comptes">Comptes</a></li>
					<li><a href="Coordonnateur/Entreprises">Entreprises</a></li>
					<li><a href="Coordonnateur/Projets">Projets</a></li> 
					<li><a href="Acceuil/Quitter">Quitter</a></li> 
                </ul>
            </li>
            <li><tab></tab></li>
        </ul>
		<?php break; default: ?>
		<!--MENU DES VISITEURS-->
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
                                <button type="submit" class="btn btn-xs btn-default" formaction="Acceuil/Connexion" formethoed="post">Soumettre</button>
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
		<?php } ?>
    </div>
</nav>