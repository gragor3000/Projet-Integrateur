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
					<h1>Évaluation des projets de stage</h1>
					<p>Sur cette page vous trouverez les différents projets de stage qui vous sont suggéré. Vous devez les noter de 0 (Impossible) à 5 (Préférence) pour faciliter l'assignation d'un projet de stage par votre coordonnateur. Vous pourrez en tout temps modifier votre sélection avant qu'un projet de stage vous soit assigner.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="section">
		<div class="container">
			<a class="left carousel-control" href="#carousel-projects" role="button" data-slide="prev"><i class="icon-left fa fa-3x fa-arrow-circle-left text-success"></i></a>
			<a class="right carousel-control" href="#carousel-projects" role="button" data-slide="next"><i class="icon-right fa fa-3x fa-arrow-circle-right text-success"></i></a>
			<div id="carousel-projects" data-interval="false" class="carousel slide">
				<div class="carousel-inner">
					<?php if($data['projects'] != null){
		$count = 0; foreach ($data['projects'] as $project) { ?>
					<div class="item <?php if ($count == $data["carousel-index"]) echo('active'); ?>">
							<div class="row">
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title"><?= $project->title;?></h3>
										</div>
										<div class="scrollable-project">
											<div class="panel-body">
												<b>Description</b>
												<p><?= $project->descr;?></p>
											</div>
											<div class="panel-body">
												<b>Matériels et logiciels prévus</b>
												<p><?=$project->equip;?></p>
											</div>
											<div class="panel-body">
												<b>Exigences particulières</b>
												<p><?= $project->extra;?></p>
											</div>
											<div class="panel-body">
												<b>Commentaires et informations complémentaires</b>
												<p><?= $project->info;?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="well">
										<div class="row">
											<div class="col-md-12">
												<b>Nom de l'entreprise</b>
												<p><?= $data['cie'][$project->businessID]->name; ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<b>Numéro de téléphone</b>
												<p><?= $data['cie'][$project->businessID]->tel; ?></p>
											</div>
											<div class="col-md-6">
												<b>Adresse courriel</b>
												<p><?= $data['cie'][$project->businessID]->email; ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-8">
												<b>Adresse de l'entreprise</b>
												<p><?= $data['cie'][$project->businessID]->address; ?></p>
											</div>
											<div class="col-md-4">
												<b>Ville</b>
												<p><?= $data['cie'][$project->businessID]->city; ?></p>
											</div>
										</div>
									</div>
									<div class="well">
										<div class="row">
											<div class="col-md-7">
												<b>Nom du superviseur</b>
												<p><?= $project->supName;?></p>
											</div>
											<div class="col-md-5">
												<b>Titre</b>
												<p><?= $project->supTitle;?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<b>Numéro de téléphone</b>
												<p><?= $project->supTel;?></p>
											</div>
											<div class="col-md-6">
												<b>Adresse courriel</b>
												<p><?= $project->supEmail;?></p>
											</div>
										</div>
									</div>
									<form role="form" class="well form-inline text-right">
										<div class="form-group">
											<label for="rateProject">Évaluation du projet de stage :</label>
											<select class="form-control" id="rateProject" name = "rating">
												<option value = 0 <?= (isset($data['ratings'][$project->ID]) && $data['ratings'][$project->ID]->score = 0) ? 'selected' : ''; ?>>0 - Impossible</option>
												<option value = 1 <?= (isset($data['ratings'][$project->ID]) && $data['ratings'][$project->ID]->score = 1) ? 'selected' : ''; ?>>1 - Complication</option>
												<option value = 2 <?= (isset($data['ratings'][$project->ID]) && $data['ratings'][$project->ID]->score = 2) ? 'selected' : ''; ?>>2 - Difficile</option>
												<option value = 3 <?= (isset($data['ratings'][$project->ID]) && $data['ratings'][$project->ID]->score = 3) ? 'selected' : ''; ?>>3 - Acceptable</option>
												<option value = 4 <?= (isset($data['ratings'][$project->ID]) && $data['ratings'][$project->ID]->score = 4) ? 'selected' : ''; ?>>4 - Favorable</option>
												<option value = 5 <?= (isset($data['ratings'][$project->ID]) && $data['ratings'][$project->ID]->score = 5) ? 'selected' : ''; ?>>5 - Préférence</option> 
											</select>
                                                                                        <button type = "submit" class="btn btn-success" name = "id" value = "<?=$project->ID; ?>" class="btn btn-link" formaction = "/intern/index/<?=$count; ?>" formmethod="POST"><i class="fa fa-fw fa-star"></i></button>
										</div>
									</form>
								</div>
							</div>
						</div>	
					<?php $count++; } } ?>
				</div>    
			</div>
		</div>
	</div>
									