<?php
	//Générer un token d'identification.
	$token = md5(uniqid(rand(), TRUE));
	$_SESSION['form_token'] = $token;
	$_SESSION['form_timer'] = time();
?>
<?php if (isset($data['alert'])) { ?>
<div class="col-md-12 alert <?= $data['alert']; ?>" style="position:fixed;z-index:999">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?= $data['message']; ?>
</div>
<?php } ?>
<div class="section section-info">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Soumettre un projet de stage</h1>
				<p>Sur cette page vous pourrez soumettre un projet de stage au département de technique de l'informatique. Celui-ci devra être autorisé avant d'être proposé aux stagiaires. Vous pourrez modifier celui-ci avant qu'il soit accepté. Si le projet est accepté ou refusé par les coordonnateurs, un courriel vous sera envoyé.</p>
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
							<label class="control-label" for="pjtName">Titre du projet</label>
							<input class="form-control" id="pjtName" name="title" placeholder="Projet de stage" type="text" required />
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
									<textarea class="form-control" id="pjtDesc" name="desc" required></textarea>
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
									<textarea class="form-control" id="pjtTools" name="equip"></textarea>
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
									<textarea class="form-control" id="pjtSkills" name="extra"></textarea>
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
									<textarea class="form-control" id="pjtInfo" name="info"></textarea>
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
								<p><?= $data['cie']->name; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<b>Numéro de téléphone</b>
								<p><?= $data['cie']->tel; ?></p>
							</div>
							<div class="col-md-6">
								<b>Adresse courriel</b>
								<p><?= $data['cie']->email; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<b>Adresse de l'entreprise</b>
								<p><?= $data['cie']->address; ?></p>
							</div>
							<div class="col-md-4">
								<b>Ville</b>
								<p><?= $data['cie']->city; ?></p>
							</div>
						</div>
					</div>
					<div class="well">
						<div class="row">
							<div class="form-group col-md-7">
								<label for="pjtSupName">Nom du superviseur</label>
								<input class="form-control" id="pjtSupName" name="supName" placeholder="Prénom Nom" type="text" required />
							</div>
							<div class=" form-group col-md-5">
								<label for="pjtSupTitle">Titre</label>
								<input id="pjtSupTitle" class="form-control" name="supTitle" placeholder="Coordonnateur" type="text" required />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label for="pjtSupTel">Numéro de téléphone</label>
								<input id="pjtSupTel" class="form-control" name="supTel" placeholder="(450)555-5555 #1234" pattern="\(\d{3}\)\d{3}\-\d{4}( #\d{1,4})?" type="text" required />
							</div>
							<div class="col-md-6">
								<label for="pjtSupEmail">Adresse courriel</label>
								<input id="pjtSupEmail" class="form-control" name="supEmail" placeholder="contact@entreprise.tld" type="email" required />
							</div>
						</div>
					</div>
					<div class="well">
						<button name="sendProject" value="<?= $_SESSION['form_token']; ?>" class="btn btn-block btn-primary" formaction="/cie/submit" formmethod="post">Soumettre</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>