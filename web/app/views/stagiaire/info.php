<head>
    <meta charset="windows-1252">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CEGEP Joliette | 420.AA | Outil de Gestion des Stages</title>

    <!--BOOTSTRAP 3.3.6 et JQUERY 2.2.0-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!--OUTILS MAISON-->
    <link rel="stylesheet" href="../../../public/css/default.css">
    <script src="../../../public/js/scripts.js"></script>
</head>
<body>
    <h3>FIXED TOP SPACER</h3>
    <div class="container">
		<!--PRÉSENTATION-->
        <?php if(assigner){ ?>
		<!--PROJET ASSIGNÉ-->
			<div class="row">
				<div class="col-md-12">
					<h2>Information sur le projet assign&eacute;<br />
						<small>Ci-dessous vous trouverez les informations concernant le projet qui vous a &eacute;t&eacute; assign&eacute;. Vous trouverez aussi un formulaire pour remplir votre journal de bord. Les entr&eacute;es au journal s'afficheront en ordre chronologique d&eacute;croissant sous le formulaire.</small>
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<div class="panel panel-default">
						<div class="panel-heading">
							<label for="project">Projet</label><br />
							<p id="project"><?= $data[project]->name; ?></p>
							<label for="project">Description</label><br />
							<p id="project"><?= $data[project]->desc; ?></p>
						</div>
						<div class="panel-body">
							<label for="supervisor">Superviseur</label><br />
							<p id="supervisor"><?= $data[project]->supervisor; ?></p>
							<br />
							<label for="contact">Contact</label><br />
							<p id="contact">
								<?= $data[project]->sup_telephone; ?><br />
								<?= $data[project]->sup_courriel; ?>
							</p>
						</div>
						<div class="panel-footer">
							<label for="cie">Entreprise</label><br />
							<p id="supervisor"><?= $data[project]->cie; ?></p>
							<br />
							<label for="address">Adresse</label><br />
							<p id="address">
								<a href="http://maps.google.com/?q=<?= $data[project]->address; ?>, <?= $data[project]->city; ?>">
									<?= $data[project]->address; ?><br />
									<?= $data[project]->city; ?></p>
								</a>
							<br />
							<label for="contact">Contact</label><br />
							<p id="contact">
								<?= $data[project]->cie_telephone; ?><br />
								<?= $data[project]->cie_courriel; ?>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<form role="form" class="text-right">
						<div class="form-group text-left">
							<label for="entry"><h3>Journal de bord<br/><small>Entrez votre texte pour le journal de bord ci-dessous. Prenez bien soins de vous relire avant de soumettre, car l'entr&eacute;e ne pourra pas &ecirc;tre modifier par la suite.</small></h3></label><br />
							<textarea class="form-control" id="entry" name="entry" style="resize:vertical; height:350px;"></textarea>
						</div>
						<button type="submit" class="btn btn-default" formmethod="action" formaction="#">Soumettre</button>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Journaux pr&eacute;c&eacute;dents</h4>
					</div>
					<div class="panel-body">
						<style>
							timestamp{
								font-weight:bold;
								top-margin:10px;
							}
							text{
								text-align:justify;
							}
						</style>
						<?php include $data[logbook]; ?>
					</div>						
				</div>
			</div>
		<?php } else { ?>
			<!--AUCUN PROJET ASSIGNÉ-->
			<form role="form">
				<div class="row">
					<div class="col-md-12">
						<h2>&Eacute;valuation des projets<br />
							<small>Veuillez &eacute;valuer les projets de 0 (impossible) &agrave; 5 (pr&eacute;f&eacute;rence). Ces &eacute;valuations permetteront aux coordonnateurs de stage d'assigner le stage qui vous conviendra le mieux possible.</small>
						</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-default" formmethod="post" formaction="#">Sauvegarder</button>
					</div>
				</div>
				<br />
				<div class="panel-group">
					<!--LISTER LES PROJETS-->
					<?PHP for $line in $data[project] { ?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-9"><h4><a data-toggle="collapse" href="#test" style="text-decoration:none;"><span class="caret"></span> <b><?= $line[name]; ?>Nom de projet</b></h4></a></div>
									<div class="col-md-3">
										<div class="form-group text-right">
											<h4>0 [ <input type="radio" name="<?= $line->id; ?>" value="0" /> <input type="radio" name="<?= $line->id; ?>" value="1" /> <input type="radio" name="<?= $line->id; ?>" value="2" /> <input type="radio" name="<?= $line->id; ?>" value="3" /> <input type="radio" name="<?= $line->id; ?>" value="4" /> <input type="radio" name="<?= $line->id; ?>" value="5"> ] 5--></h4>
										</div>								
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 well well-sm" style="background:white;">
										<label for="desc">Description et &eacutetapes de r&eacutealisation</label><br /><p id="desc"><?= $line[desc]; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 form-group"><label for="cie">Entreprise</label><br /><span id="cie"><?= $line->cie; ?></span></div>
									<div class="col-md-8 form-group"><label for="address">Adresse</label><br /><span id="address"><a href="http://maps.google.com/?q=<?= $line->address; ?>, <?= $line->city; ?>"><?= $line->address; ?>, <?= $line->city; ?></a></div>
								</div>
							</div>
							<div id="test" class="panel-body panel-collapse collapse">
								<label for="equip">Mat&eacute;riels et logiciels pr&eacute;vus</label><br />
								<p id="equip"><?= $line->equip; ?></p>
								<br />
								<label for="extra">Exigences particuli&egrave;res</label><br />
								<p id="extra"><?= $line->extra; ?></p>
								<br />
								<label for="info">Commentaires et informations compl&eacute;mentaires</label><br />
								<p id="info"><?= $line->info; ?></p>
							</div>
						</div>
					<?PHP } ?>
				</div>
			</form>
		<?PHP } ?>
    </div>
</body>
