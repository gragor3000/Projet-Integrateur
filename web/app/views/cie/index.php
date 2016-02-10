<!--
2016-02-08 Marc Lauzon.
=======================
HTML/CSS complété.
FORMULAIRE complété.
PHP complété. [sauf exception voir 'actions']
-->
<div class="section section-info">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Survol des projets de stage</h1>
				<p>Sur cette page vous trouverez les différents projets de stage que vous avez soumis. Celui-ci pourra être éditer ou supprimer s'il n'a pas encore été accepté par les coordonnateurs du département de technique de l'informatique. Une fois accepté, les options seront remplacées par un message, puis par le nom du stagiaire assigné lorsque le projet aura été jumelé.</p>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="container">
		<div id="carousel-projects" data-interval="false" class="carousel slide">
			<div class="carousel-inner">
				<?php $count = 0; foreach($project in $data['project']){ ?>
				<div class="item <?php if($count == 0) echo('active'); ?>">
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><?= $project['title']; ?></h3>
								</div>
								<div class="scrollable-project">
									<div class="panel-body">
										<b>Description</b>
										<p><?= $project['desc']; ?></p>
									</div>
									<div class="panel-body">
										<b>Matériels et logiciels prévus</b>
										<p><?= $project['equip']; ?></p>
									</div>
									<div class="panel-body">
										<b>Exigences particulières</b>
										<p><?= $project['extra']; ?></p>
									</div>
									<div class="panel-body">
										<b>Commentaires et informations complémentaires</b>
										<p><?= $project['info']; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="well">
								<div class="row">
									<div class="col-md-12">
										<b>Nom de l'entreprise</b>
										<p><?= $project['name']; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<b>Numéro de téléphone</b>
										<p><?= $project['tel']; ?></p>
									</div>
									<div class="col-md-6">
										<b>Adresse courriel</b>
										<p><?= $project['email']; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<b>Adresse de l'entreprise</b>
										<p><?= $project['address']; ?></p>
									</div>
									<div class="col-md-4">
										<b>Ville</b>
										<p><?= $project['city']; ?></p>
									</div>
								</div>
							</div>
							<div class="well">
								<div class="row">
									<div class="col-md-7">
										<b>Nom du superviseur</b>
										<p><?= $project['supName']; ?></p>
									</div>
									<div class="col-md-5">
										<b>Titre</b>
										<p><?= $project['supTitle']; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<b>Numéro de téléphone</b>
										<p><?= $project['supTel']; ?></p>
									</div>
									<div class="col-md-6">
										<b>Adresse courriel</b>
										<p><?= $project['supEmail']; ?></p>
									</div>
								</div>
							</div>
							<form role="form" class="form-inline text-center well">
								<div class="form-group">
								<!-- MODIFIER SELON LE STATUS -->
									<a class="btn btn-primary" formaction="cie/editProject/<?= $project['name']; ?>" formmethod="post"><i class="fa fa-fw fa-edit"></i> Éditer</a>
									<a class="btn btn-primary" formaction="cie/delProject/<?= $project['ID']; ?>" formmethod="post"><i class="fa fa-fw fa-eraser"></i> Supprimer</a>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<a class="left carousel-control" href="#carousel-projects" data-slide="prev"><i class="icon-prev  fa fa-angle-left"></i></a>
		<a class="right carousel-control" href="#carousel-projects" data-slide="next"><i class="fa fa-angle-right icon-next"></i></a>
	</div>
</div>