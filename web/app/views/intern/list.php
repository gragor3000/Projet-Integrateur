<html><head>
    <meta name="description" content="Ce site a pour objectif de permettre aux entreprises de soumettre des projets de stage à destination des étudiants en technique informatique et à ceux-ci de soumettre leur journal de bord. Il permet aussi aux coordonnateurs de gerer les comptes d'accès et de soumettre des documents d'évaluation.">
    <title>CEGEP de Joliette | 420.AA | Gesion de Stage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="..\..\..\public\css\default.css" rel="stylesheet" type="text/css">
  </head><body>
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span>420.AA | Gestion de Stage | Stagiaire</span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-user"></i> Nom de l'utilisateur <i class="fa fa-caret-down"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="#"><i class="fa fa-fw fa-briefcase"></i> Projet de stage</a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-fw fa-book"></i> Journal de Bord</a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-fw fa-pencil"></i> Évaluations</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#"><i class="fa fa-fw fa-key"></i> Changer de mot de passe</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#"><i class="fa fa-fw fa-sign-out"></i> Déconnexion</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="section section-info">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1>Évaluation des projets de stage</h1>
              <p>Sur cette page vous trouverez les différents projets de stage qui vous
                sont suggéré. Vous devez les noter de 0 (Impossible) à 5 (Préférence) pour
                faciliter l'assignation d'un projet de stage par votre coordonnateur. Vous
                pourrez en tout temps modifier votre sélection avant qu'un projet de stage
                vous soit assigner.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="section">
        <div class="container">
		<div id="carousel-projects" data-interval="false" class="carousel slide">
		  <div class="carousel-inner">
			<div class="item active">
			  <div class="row">
				<div class="col-md-6">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h3 class="panel-title">Nom du projet</h3>
					</div>
					<div class="scrollable-project">
					<div class="panel-body">
					  <b>Description</b>
					  <p>Description du projet.</p>
					</div>
					<div class="panel-body">
					  <b>Matériels et logiciels prévus</b>
					  <p>Description du projet.</p>
					</div>
					<div class="panel-body">
					  <b>Exigences particulières</b>
					  <p>Description du projet.</p>
					</div>
					<div class="panel-body">
					  <b>Commentaires et informations complémentaires</b>
					  <p>Description du projet.</p>
					</div>
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="well">
					<div class="row">
					  <div class="col-md-12">
						<b>Nom de l'entreprise</b>
						<p>Entreprise Inc.</p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-6">
						<b>Numéro de téléphone</b>
						<p>(450)555-5555 #1234</p>
					  </div>
					  <div class="col-md-6">
						<b>Adresse courriel</b>
						<p>contact@entreprise.tld</p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-8">
						<b>Adresse de l'entreprise</b>
						<p>555 rue Entreprise, local 555</p>
					  </div>
					  <div class="col-md-4">
						<b>Ville</b>
						<p>Joliette</p>
					  </div>
					</div>
				  </div>
				  <div class="well">
					<div class="row">
					  <div class="col-md-7">
						<b>Nom du superviseur</b>
						<p>Prenom Nom</p>
					  </div>
					  <div class="col-md-5">
						<b>Titre</b>
						<p>Coordonnateur</p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-6">
						<b>Numéro de téléphone</b>
						<p>(450)555-5555 #1234</p>
					  </div>
					  <div class="col-md-6">
						<b>Adresse courriel</b>
						<p>contact@entreprise.tld</p>
					  </div>
					</div>
				  </div>
				  <form role="form" class="well form-inline text-right">
					<div class="form-group">
					  <label for="rateProject">Évaluation du projet de stage :</label>
					  <select class="form-control" id="rateProject">
						<option>0 - Impossible</option>
						<option>1 - Complication</option>
						<option>2 - Difficile</option>
						<option>3 - Acceptable</option>
						<option>4 - Favorable</option>
						<option>5 - Préférence</option>
					  </select>
					  <a class="btn btn-primary"><i class="fa fa-fw fa-star"></i></a>
					</div>
				  </form>
				</div>
			  </div>
			</div>
			<div class="item">
			  <div class="row">
				<div class="col-md-6">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h3 class="panel-title">Nom du projet</h3>
					</div>
					<div class="scrollable-project">
					<div class="panel-body">
					  <b>Description</b>
					  <p>Description du projet.</p>
					</div>
					<div class="panel-body">
					  <b>Matériels et logiciels prévus</b>
					  <p>Description du projet.</p>
					</div>
					<div class="panel-body">
					  <b>Exigences particulières</b>
					  <p>Description du projet.</p>
					</div>
					<div class="panel-body">
					  <b>Commentaires et informations complémentaires</b>
					  <p>Description du projet.</p>
					</div>
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="well">
					<div class="row">
					  <div class="col-md-12">
						<b>Nom de l'entreprise</b>
						<p>Entreprise Inc.</p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-6">
						<b>Numéro de téléphone</b>
						<p>(450)555-5555 #1234</p>
					  </div>
					  <div class="col-md-6">
						<b>Adresse courriel</b>
						<p>contact@entreprise.tld</p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-8">
						<b>Adresse de l'entreprise</b>
						<p>555 rue Entreprise, local 555</p>
					  </div>
					  <div class="col-md-4">
						<b>Ville</b>
						<p>Joliette</p>
					  </div>
					</div>
				  </div>
				  <div class="well">
					<div class="row">
					  <div class="col-md-7">
						<b>Nom du superviseur</b>
						<p>Prenom Nom</p>
					  </div>
					  <div class="col-md-5">
						<b>Titre</b>
						<p>Coordonnateur</p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-6">
						<b>Numéro de téléphone</b>
						<p>(450)555-5555 #1234</p>
					  </div>
					  <div class="col-md-6">
						<b>Adresse courriel</b>
						<p>contact@entreprise.tld</p>
					  </div>
					</div>
				  </div>
				  <form role="form" class="well form-inline text-right">
					<div class="form-group">
					  <label for="rateProject">Évaluation du projet de stage :</label>
					  <select class="form-control" id="rateProject">
						<option>0 - Impossible</option>
						<option>1 - Complication</option>
						<option>2 - Difficile</option>
						<option>3 - Acceptable</option>
						<option>4 - Favorable</option>
						<option>5 - Préférence</option>
					  </select>
					  <a class="btn btn-primary"><i class="fa fa-fw fa-star"></i></a>
					</div>
				  </form>
				</div>
			  </div>
			</div>
			<div class="item">
			  <div class="row">
				<div class="col-md-6">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h3 class="panel-title">Nom du projet</h3>
					</div>
					<div class="scrollable-project">
					<div class="panel-body">
					  <b>Description</b>
					  <p>Description du projet.</p>
					</div>
					<div class="panel-body">
					  <b>Matériels et logiciels prévus</b>
					  <p>Description du projet.</p>
					</div>
					<div class="panel-body">
					  <b>Exigences particulières</b>
					  <p>Description du projet.</p>
					</div>
					<div class="panel-body">
					  <b>Commentaires et informations complémentaires</b>
					  <p>Description du projet.</p>
					</div>
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="well">
					<div class="row">
					  <div class="col-md-12">
						<b>Nom de l'entreprise</b>
						<p>Entreprise Inc.</p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-6">
						<b>Numéro de téléphone</b>
						<p>(450)555-5555 #1234</p>
					  </div>
					  <div class="col-md-6">
						<b>Adresse courriel</b>
						<p>contact@entreprise.tld</p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-8">
						<b>Adresse de l'entreprise</b>
						<p>555 rue Entreprise, local 555</p>
					  </div>
					  <div class="col-md-4">
						<b>Ville</b>
						<p>Joliette</p>
					  </div>
					</div>
				  </div>
				  <div class="well">
					<div class="row">
					  <div class="col-md-7">
						<b>Nom du superviseur</b>
						<p>Prenom Nom</p>
					  </div>
					  <div class="col-md-5">
						<b>Titre</b>
						<p>Coordonnateur</p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-6">
						<b>Numéro de téléphone</b>
						<p>(450)555-5555 #1234</p>
					  </div>
					  <div class="col-md-6">
						<b>Adresse courriel</b>
						<p>contact@entreprise.tld</p>
					  </div>
					</div>
				  </div>
				  <form role="form" class="well form-inline text-right">
					<div class="form-group">
					  <label for="rateProject">Évaluation du projet de stage :</label>
					  <select class="form-control" id="rateProject">
						<option>0 - Impossible</option>
						<option>1 - Complication</option>
						<option>2 - Difficile</option>
						<option>3 - Acceptable</option>
						<option>4 - Favorable</option>
						<option>5 - Préférence</option>
					  </select>
					  <a class="btn btn-primary"><i class="fa fa-fw fa-star"></i></a>
					</div>
				  </form>
				</div>
			  </div>
			</div>
			</div>
		  </div>
		  <a class="left carousel-control" href="#carousel-projects" data-slide="prev"><i class="icon-prev  fa fa-angle-left text-inverse"></i></a>
		  <a class="right carousel-control" href="#carousel-projects" data-slide="next"><i class="icon-next fa fa-angle-right text-inverse"></i></a>
		</div>
      </div>
    </div>
    <footer class="section section-primary">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <a href="http://www.cegep-lanaudiere.qc.ca/joliette" target="_new" class="text-inverse"><b class="text-uppercase">Cégep Régional <i class="text-lowercase">de</i> Lanaudière</b> <i>à Joliette</i></a>
            <br>
            <a href="http://www.cegep-lanaudiere.qc.ca/joliette/programmes/techniques-de-linformatique" target="_new" class="text-inverse"><small>420.AA | Technique de l'informatique</small></a>
          </div>
          <div class="col-sm-6 text-right">
            <p>Ce site a été conçu dans le cadre du cours de Projet Intégrateur par :
              <br>
              <i>Samuel Baker, Marc Lauzon, Michael Légaré &amp; Patrick Limoge</i>
            </p>
          </div>
        </div>
      </div>
    </footer>
  

</body></html>