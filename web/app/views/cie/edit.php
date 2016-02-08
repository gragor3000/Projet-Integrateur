<?php include "menu.php"; ?>
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
							<label class="control-label" for="pjtName">Titre du projet</label>
							<input class="form-control" id="pjtName" placeholder="Projet de stage" type="text" required />
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
									<textarea class="form-control" id="pjtDesc" required></textarea>
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
									<textarea class="form-control" id="pjtTools"></textarea>
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
									<textarea class="form-control" id="pjtSkills"></textarea>
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
									<textarea class="form-control" id="pjtInfo"></textarea>
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
							<div class="form-group col-md-7">
								<label for="pjtSupName">Nom du superviseur</label>
								<input class="form-control" id="pjtSupName" placeholder="Prénom Nom" type="text" required />
							</div>
							<div class=" form-group col-md-5">
								<label for="pjtSupTitle">Titre</label>
								<input id="pjtSupTitle" class="form-control" placeholder="Coordonnateur" type="text" required />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label for="pjtSupTel">Numéro de téléphone</label>
								<input id="pjtSupTel" class="form-control" placeholder="(450)555-5555 #1234" type="text" required />
							</div>
							<div class="col-md-6">
								<label for="pjtSupEmail">Adresse courriel</label>
								<input id="pjtSupEmail" class="form-control" placeholder="contact@entreprise.tld" type="email" required />
							</div>
						</div>
					</div>
					<div class="well">
						<a class="btn btn-block btn-primary">Modifier</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>