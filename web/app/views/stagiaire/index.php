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
        <div class="row" style="vertical-align: middle;">
            <div class="col-md-12">
                <h2>&Eacute;valuation des projets<br />
                    <small>Veuillez &eacute;valuer les projets de 0 (impossible) &agrave; 5 (pr&eacute;f&eacute;rence).</small>
                </h2>
            </div>
        </div>
		<?PHP if(assigner){ INCLUDE "project.php"; INCLUDE "logbook.php";} else { ?>
        <br />
		<!--AUCUN PROJET ASSIGNÉ-->
		<form role="form" class="panel-group">
			<?PHP for $line in $data[project] { ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-9"><h4><a data-toggle="collapse" href="#test" style="text-decoration:none;"><span class="caret"></span> <b><?= $line[name]; ?>Nom de projet</b></h4></a></div>
						<div class="col-md-3">
							<div class="form-group text-right">
								<h4>0 [ <input type="radio"> <input type="radio"> <input type="radio"> <input type="radio"> <input type="radio"> <input type="radio"> ] 5</h4>
								<h4><!--0 [ <input type="radio" name=<?= $line[id]; ?> value="0" /> <input type="radio" name=<?= $line[id]; ?> value="1" /> <input type="radio" name=<?= $line[id]; ?> value="2" /> <input type="radio" name=<?= $line[id]; ?> value="3" /> <input type="radio" name=<?= $line[id]; ?> value="4" /> <input type="radio" name=<?= $line[id]; ?> value="5"> ] 5--></h4>
							</div>								
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 well well-sm" style="background:white;">
							<label for="desc">Description et &eacutetapes de r&eacutealisation</label><br /><p id="desc"><?= $line[desc]; ?>Desciption</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 form-group"><label for="cie">Entreprise</label><br /><span id="cie"><?= $line[cie]; ?>Compagnie</span></div>
						<div class="col-md-5 form-group"><label for="address">Adresse</label><br /><span id="address"><?= $line[address]; ?>555 rue de Lanaudière</div>
						<div class="col-md-3 form-group"><label for="city">Ville</label><br /><span id="city"><?= $line[city]; ?>Saint-Jean-sur-Richelieu</div>
					</div>
				</div>
				<div id="test" class="panel-body panel-collapse collapse">
					<label for="equip">Mat&eacute;riels et logiciels pr&eacute;vus</label><br />
					<p id="equip"><?= $line[equip]; ?>Equipement</p>
					<br />
					<label for="extra">Exigences particuli&egrave;res</label><br />
					<p id="extra"><?= $line[extra]; ?>Extra</p>
					<br />
					<label for="info">Commentaires et informations compl&eacute;mentaires</label><br />
					<p id="info"><?= $line[info]; ?>Information</p>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-9"><h4><a data-toggle="collapse" href="#test" style="text-decoration:none;"><span class="caret"></span> <b><?= $line[name]; ?>Nom de projet</b></h4></a></div>
						<div class="col-md-3">
							<div class="form-group text-right">
								<h4>0 [ <input type="radio"> <input type="radio"> <input type="radio"> <input type="radio"> <input type="radio"> <input type="radio"> ] 5</h4>
								<h4><!--0 [ <input type="radio" name=<?= $line[id]; ?> value="0" /> <input type="radio" name=<?= $line[id]; ?> value="1" /> <input type="radio" name=<?= $line[id]; ?> value="2" /> <input type="radio" name=<?= $line[id]; ?> value="3" /> <input type="radio" name=<?= $line[id]; ?> value="4" /> <input type="radio" name=<?= $line[id]; ?> value="5"> ] 5--></h4>
							</div>								
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 well well-sm" style="background:white;">
							<label for="desc">Description et &eacutetapes de r&eacutealisation</label><br /><p id="desc"><?= $line[desc]; ?>Desciption</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 form-group"><label for="cie">Entreprise</label><br /><span id="cie"><?= $line[cie]; ?>Compagnie</span></div>
						<div class="col-md-5 form-group"><label for="address">Adresse</label><br /><span id="address"><?= $line[address]; ?>555 rue de Lanaudière</div>
						<div class="col-md-3 form-group"><label for="city">Ville</label><br /><span id="city"><?= $line[city]; ?>Saint-Jean-sur-Richelieu</div>
					</div>
				</div>
				<div id="test" class="panel-body panel-collapse collapse">
					<label for="equip">Mat&eacute;riels et logiciels pr&eacute;vus</label><br />
					<p id="equip"><?= $line[equip]; ?>Equipement</p>
					<br />
					<label for="extra">Exigences particuli&egrave;res</label><br />
					<p id="extra"><?= $line[extra]; ?>Extra</p>
					<br />
					<label for="info">Commentaires et informations compl&eacute;mentaires</label><br />
					<p id="info"><?= $line[info]; ?>Information</p>
				</div>
			</div>
			<?PHP } ?>
		</form>
		<?PHP } ?>
    </div>
</body>
