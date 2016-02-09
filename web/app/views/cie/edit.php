<!--
2016-02-08 Marc Lauzon.
=======================
HTML/CSS complété.
FORMULAIRE complété.
PHP/JS complété.
-->
<?php
	//Générer un token d'identification.
	$token = md5(uniqid(rand(), TRUE));
	$_SESSION['form_token'] = $token;
	$_SESSION['form_timer'] = time();
?>
<div class="section section-info">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Éditer un projet de stage</h1>
				<p>Sur cette page vous pouvez éditer un projet de stage ayant déja été soumis au département de technique de l'informatique. Celui-ci devra être autorisé avant d'être proposé aux stagiaires. Vous pouvez modifier autant de fois que désiré avant qu'il soit accepté. Une fois accepté il ne sera plus possible de le modfier.</p>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="container">
		<form class="form-vertical" role="form">
			<div class="row">
				<div class="col-md-6">
					<div class="well well-sm">
						<div class="form-group">
							<label class="control-label" for="title">Titre du projet</label>
							<input class="form-control" id="title" name="title" placeholder="Projet de stage" type="text" required value="<?= (isset($data['project']->title)) ? $data['project']->title : ''; ?>"/>
						</div>
					</div>
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#colDesc">Description</a>
								</h4>
							</div>
							<div id="colDesc" class="panel-collapse collapse in">
								<div class="panel-body">
									<textarea class="form-control" id="desc" name="desc" required><?= (isset($data['project']->title)) ? $data['project']->desc : ''; ?></textarea>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#colTools">Matériel et logiciels prévus</a>
								</h4>
							</div>
							<div id="colTools" class="panel-collapse collapse">
								<div class="panel-body">
									<textarea class="form-control" id="equip" name="equip"><?= (isset($data['project']->equip)) ? $data['project']->equip : ''; ?></textarea>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#colSkills">Exigences particulières</a>
								</h4>
							</div>
							<div id="colSkills" class="panel-collapse collapse">
								<div class="panel-body">
									<textarea class="form-control" id="extra" name="extra"><?= (isset($data['project']->extra)) ? $data['project']->extra : ''; ?></textarea>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#colInfo">Commentaires et informations complémentaires</a>
								</h4>
							</div>
							<div id="colInfo" class="panel-collapse collapse">
								<div class="panel-body">
									<textarea class="form-control" id="info" name="info"><?= (isset($data['project']->info)) ? $data['project']->info : ''; ?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="well">
						<div class="row">
							<div class="col-md-12">
								<b>Nom de l'entreprise</b>
								<p id="name"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<b>Numéro de téléphone</b>
								<p id="tel"></p>
							</div>
							<div class="col-md-6">
								<b>Adresse courriel</b>
								<p id="email"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<b>Adresse de l'entreprise</b>
								<p id="address"></p>
							</div>
							<div class="col-md-4">
								<b>Ville</b>
								<p id="city"></p>
							</div>
						</div>
					</div>
					<div class="well">
						<div class="row">
							<div class="form-group col-md-7">
								<label for="supName">Nom du superviseur</label>
								<input class="form-control" id="supName" name="supName" placeholder="Prénom Nom" type="text" <?= (isset($data['project']->supName)) ? $data['project']->supName : ''; ?> required />
							</div>
							<div class=" form-group col-md-5">
								<label for="supTitle">Titre</label>
								<input class="form-control" id="supTitle" name="supTitle"  placeholder="Coordonnateur" type="text" <?= (isset($data['project']->supTitle)) ? $data['project']->supTitle : ''; ?> required />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label for="supTel">Numéro de téléphone</label>
								<input class="form-control" id="supTel" name="supTel" placeholder="(450)555-5555 #1234" type="text" <?= (isset($data['project']->supTel)) ? $data['project']->supTel : ''; ?> />
							</div>
							<div class="col-md-6">
								<label for="supEmail">Adresse courriel</label>
								<input class="form-control" id="supEmail" name="supEmail" placeholder="contact@entreprise.tld" type="email" <?= (isset($data['project']->supEmail)) ? $data['project']->supEmail : ''; ?> />
							</div>
						</div>
					</div>
					<div class="well">
						<button name="editProject" value="<?= $_SESSION['form_token']; ?>" class="btn btn-block btn-primary">Modifier</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>