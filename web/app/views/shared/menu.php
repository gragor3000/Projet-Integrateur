<!--DEBUG MENU -->
<?php $acc_type = 3; ?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="home/index">C&Eacute;GEP R&eacute;gional de Lanaudi&egrave;re &agrave; Joliette</a>
        </div>
		<?php switch($_SESSION['role']) { case 2: ?>
		<!--MENU DES STAGIAIRES-->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['name']; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
					<li><a href="/intern/info">Mes infos</a></li>
					<li><a href="/intern/index">Stages</a></li>
					<li><a href="/home/logout">Quitter</a></li>
                </ul>
            </li>
            <li><tab></tab></li>
        </ul>
		<?php break; case 1: ?>
		<!--MENU DES ENTREPRISES-->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['name']; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
					<li><a href="/business/info">Mes infos</a></li>
					<li><a href="/business/projects">Projets</a></li> 
					<li><a href="/home/logout">Quitter</a></li> 
                </ul>
            </li>
            <li><tab></tab></li>
        </ul>
		<?php break; case 0: ?>
		<!--MENU DES COORDONNATEURS-->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['name']; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
					<li><a href="/advisor/info">Mes infos</a></li>
					<li><a href="/advisor/accounts">Comptes</a></li>
					<li><a href="/advisor/companies">Entreprises</a></li>
					<li><a href="/advisor/projects">Projets</a></li> 
					<li><a href="/home/logout">Quitter</a></li> 
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
                                <input type="email" class="form-control" id="email" placeholder="superviseur@compagnie.tld" name="user" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pass"><span class="glyphicon glyphicon-lock"></span></label>
                            <div class="col-sm-10"> 
                                <input type="password" class="form-control" id="pass" placeholder="Mot de passe" name="pass" required />
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