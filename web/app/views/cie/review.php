<!--
2016-02-08 Marc Lauzon.
=======================
HTML/CSS complété.
FORMULAIRE complété.
PHP à faire.
-->
<?php
	//Générer un token d'identification.
	$token = md5(uniqid(rand(), TRUE));
	$_SESSION['form_token'] = $token;
	$_SESSION['form_timer'] = time();
?>
<?php include="menu.php"; ?>
<div class="section section-info">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Formulaire d'évaluation</h1>
				<p>Sur cette page vous pourrez évaluer trois champs de compétences du stagiaire à la fin de son stage.</p>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="container">
<<<<<<< HEAD
		<form name="cieRev" role="form">
=======
		<form role="form" name="Review"">
>>>>>>> origin/master
			<div class="row">
				<div class="col-md-12">
					<div class="row well">
						<div class="form-group col-md-4">
							<label class="control-label">Nom du stagiaire</label>
							<p style="margin-top:7px;"><?= $data['intern']; ?></p>
						</div>
						<div class="form-group col-md-6">
							<label class="control-label">Titre du projet</label>
							<p style="margin-top:7px;"><?= $data['title']; ?></p>
						</div>
						<div class="form-group col-md-2">
							<label class="control-label">Date</label>
							<p style="margin-top:7px;"><?= $data['date']; ?></p>
						</div>
					</div>
					<h3 class="page-header">Comportement et éthique nécessaire à l'exercice de la profession.</h3>
					<h4>Examiner les habiletés et les comportements liés à l'exercice des fonctions de travail.</h4>
					<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Appliquer les exigences liées à l'éthique professionnelle</td>
										<td>
											<select id="cieRev1.1.1" name="cieRev1.1.1" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev1.1.1']) && $data['cieRev1.1.1']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev1.1.1']) && $data['cieRev1.1.1']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev1.1.1']) && $data['cieRev1.1.1']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev1.1.1']) && $data['cieRev1.1.1']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev1.1.1']) && $data['cieRev1.1.1']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Appliquer la règlementation en mise en place</td>
										<td>
											<select id="cieRev1.1.2" name="cieRev1.1.2" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev1.1.2']) && $data['cieRev1.1.2']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev1.1.2']) && $data['cieRev1.1.2']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev1.1.2']) && $data['cieRev1.1.2']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev1.1.2']) && $data['cieRev1.1.2']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev1.1.2']) && $data['cieRev1.1.2']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Manifester de la persévérance dans les tâches à accomplir</td>
										<td>
											<select id="cieRev1.1.3" name="cieRev1.1.3" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev1.1.3']) && $data['cieRev1.1.3']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev1.1.3']) && $data['cieRev1.1.3']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev1.1.3']) && $data['cieRev1.1.3']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev1.1.3']) && $data['cieRev1.1.3']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev1.1.3']) && $data['cieRev1.1.3']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="control-label" for="cieRev1">Commentaires et suggestions</label>
							<textarea class="form-control" id="cieRev1" name="cieRev1" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>><?= (isset($data['cieRev1'])) ? $data['cieRev1'] : ''; ?></textarea>
						</div>
					</div>
					<h3 class="page-header">Conception et développement d'une application.</h3>
					<h4>Établir le cadre général de l'application.</h4>
					<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Préciser l'idée directrice du projet et communiquer efficacement avec tout autre participant du projet.</td>
										<td>
											<select id="cieRev2.1.1" name="cieRev2.1.1" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev2.1.1']) && $data['cieRev2.1.1']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev2.1.1']) && $data['cieRev2.1.1']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev2.1.1']) && $data['cieRev2.1.1']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev2.1.1']) && $data['cieRev2.1.1']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev2.1.1']) && $data['cieRev2.1.1']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<h4>Programmer l'application.</h4>
					<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Valider correctement le fonctionnement du programme.</td>
										<td>
											<select id="cieRev2.2.1" name="cieRev2.2.1" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev2.2.1']) && $data['cieRev2.2.1']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev2.2.1']) && $data['cieRev2.2.1']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev2.2.1']) && $data['cieRev2.2.1']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev2.2.1']) && $data['cieRev2.2.1']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev2.2.1']) && $data['cieRev2.2.1']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Archiver toute l'information relative au programme.</td>
										<td>
											<select id="cieRev2.2.2" name="cieRev2.2.2" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev2.2.2']) && $data['cieRev2.2.2']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev2.2.2']) && $data['cieRev2.2.2']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev2.2.2']) && $data['cieRev2.2.2']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev2.2.2']) && $data['cieRev2.2.2']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev2.2.2']) && $data['cieRev2.2.2']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<h4>Produire la documentation relative à l'application.</h4>
					<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Créer l'aide en ligne appropriée.</td>
										<td>
											<select id="cieRev2.3.1" name="cieRev2.3.1" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev2.3.1']) && $data['cieRev2.3.1']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev2.3.1']) && $data['cieRev2.3.1']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev2.3.1']) && $data['cieRev2.3.1']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev2.3.1']) && $data['cieRev2.3.1']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev2.3.1']) && $data['cieRev2.3.1']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Rédiger de façon claire et complète les instructions d'utilisation de l'application.</td>
										<td>
											<select id="cieRev2.3.2" name="cieRev2.3.2" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev2.3.2']) && $data['cieRev2.3.2']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev2.3.2']) && $data['cieRev2.3.2']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev2.3.2']) && $data['cieRev2.3.2']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev2.3.2']) && $data['cieRev2.3.2']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev2.3.2']) && $data['cieRev2.3.2']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="control-label" for="cieRev2">Commentaires et suggestions</label>
							<textarea class="form-control" id="cieRev2" name="cieRev2" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'readonly' : ''; ?>><?= (isset($data['cieRev2'])) ? $data['cieRev2'] : ''; ?></textarea>
						</div>
					</div>
					<h3 class="page-header">Mise en oeuvre d'une application.</h3>
					<h4>Planifier la mise en oeuvre.</h4>
					<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Choisir la stratégie appropriée au contexte et déterminer les ressources humaines et matérielles nécessaires.</td>
										<td>
											<select id="cieRev3.1.1" name="cieRev3.1.1" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev3.1.1']) && $data['cieRev3.1.1']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev3.1.1']) && $data['cieRev3.1.1']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev3.1.1']) && $data['cieRev3.1.1']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev3.1.1']) && $data['cieRev3.1.1']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev3.1.1']) && $data['cieRev3.1.1']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Déterminer les étapes et les procédures de la mise en oeuvre et établir un échéancier réaliste des travaux.</td>
										<td>
											<select id="cieRev3.1.2" name="cieRev3.1.2" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev3.1.2']) && $data['cieRev3.1.2']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev3.1.2']) && $data['cieRev3.1.2']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev3.1.2']) && $data['cieRev3.1.2']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev3.1.2']) && $data['cieRev3.1.2']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev3.1.2']) && $data['cieRev3.1.2']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Communiquer efficacement l'information pertinente aux personnes concernées.</td>
										<td>
											<select id="cieRev3.1.3" name="cieRev3.1.3" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev3.1.3']) && $data['cieRev3.1.3']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev3.1.3']) && $data['cieRev3.1.3']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev3.1.3']) && $data['cieRev3.1.3']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev3.1.3']) && $data['cieRev3.1.3']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev3.1.3']) && $data['cieRev3.1.3']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<h4>Mettre en place l'environnement.</h4>
					<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Adapter l'environnement matériel aux exigences de l'application, installer et configurer correctement l'application.</td>
										<td>
											<select id="cieRev3.2.1" name="cieRev3.2.1" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev3.2.1']) && $data['cieRev3.2.1']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev3.2.1']) && $data['cieRev3.2.1']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev3.2.1']) && $data['cieRev3.2.1']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev3.2.1']) && $data['cieRev3.2.1']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev3.2.1']) && $data['cieRev3.2.1']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<h4>Valider la qualité de la mise en oeuvre.</h4>
					<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Exécuter rigoureusement les tests de fonctionnement de l'application dans le contexte de production et solutionner efficacement les difficultés.</td>
										<td>
											<select id="cieRev3.3.1" name="cieRev3.3.1" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev3.3.1']) && $data['cieRev3.3.1']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev3.3.1']) && $data['cieRev3.3.1']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev3.3.1']) && $data['cieRev3.3.1']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev3.3.1']) && $data['cieRev3.3.1']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev3.3.1']) && $data['cieRev3.3.1']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Gérer le stress.</td>
										<td>
											<select id="cieRev3.3.2" name="cieRev3.3.2" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev3.3.2']) && $data['cieRev3.3.2']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev3.3.2']) && $data['cieRev3.3.2']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev3.3.2']) && $data['cieRev3.3.2']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev3.3.2']) && $data['cieRev3.3.2']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev3.3.2']) && $data['cieRev3.3.2']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<h4>Assurer le suivi de la mise en oeuvre.</h4>
					<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Communiquer de l'information pertinente aux personnes en cause.</td>
										<td>
											<select id="cieRev3.4.1" name="cieRev3.4.1" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev3.4.1']) && $data['cieRev3.4.1']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev3.4.1']) && $data['cieRev3.4.1']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev3.4.1']) && $data['cieRev3.4.1']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev3.4.1']) && $data['cieRev3.4.1']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev3.4.1']) && $data['cieRev3.4.1']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Analyser et solutionner les problèmes découlant de la mise en oeuvre.</td>
										<td>
											<select id="cieRev3.4.2" name="cieRev3.4.2" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev3.4.2']) && $data['cieRev3.4.2']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev3.4.2']) && $data['cieRev3.4.2']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev3.4.2']) && $data['cieRev3.4.2']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev3.4.2']) && $data['cieRev3.4.2']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev3.4.2']) && $data['cieRev3.4.2']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<h4>Produire le guide d'exploitation.</h4>
					<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Présenter l'information pertinente sur les caractéristiques des installations, des configurations et sur les procédures de mise en production de l'application.</td>
										<td>
											<select id="cieRev3.5.1" name="cieRev3.5.1" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev3.5.1']) && $data['cieRev3.5.1']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev3.5.1']) && $data['cieRev3.5.1']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev3.5.1']) && $data['cieRev3.5.1']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev3.5.1']) && $data['cieRev3.5.1']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev3.5.1']) && $data['cieRev3.5.1']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Appliquer rigoureusement les règles de rédaction et de présentation.</td>
										<td>
											<select id="cieRev3.5.2" name="cieRev3.5.2" class="form-control" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRev3.5.2']) && $data['cieRev3.5.2']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRev3.5.2']) && $data['cieRev3.5.2']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRev3.5.2']) && $data['cieRev3.5.2']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRev3.5.2']) && $data['cieRev3.5.2']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRev3.5.2']) && $data['cieRev3.5.2']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="control-label" for="cieRev3">Commentaires et suggestions</label>
							<textarea class="form-control" id="cieRev3" name="cieRev3" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'readonly' : ''; ?>><?= (isset($data['cieRev3'])) ? $data['cieRev3'] : ''; ?></textarea>
						</div>
					</div>
					<h3 class="page-header">Informations complémentaires</h3>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="control-label" for="cieRevBest">Points forts</label>
							<textarea class="form-control" id="cieRevBest" name="cieRevBest" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'readonly' : ''; ?>><?= (isset($data['cieRevBest'])) ? $data['cieRevBest'] : ''; ?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="control-label" for="cieRevLess">Points à améliorer</label>
							<textarea class="form-control" id="cieRevLess" name="cieRevLess" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'readonly' : ''; ?>><?= (isset($data['cieRevLess'])) ? $data['cieRevLess'] : ''; ?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="control-label" for="cieRevOther">Autres remarques</label>
							<textarea class="form-control" id="cieRevOther" name="cieRevOther" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'readonly' : ''; ?>><?= (isset($data['cieRevOther'])) ? $data['cieRevOther'] : ''; ?></textarea>
						</div>
					</div>
					<h4>Appréciation globale du séjour.</h4>
					<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Avez-vous apprécié travailler avec le stagiaire assigné à votre projet?</td>
										<td>
											<select class="form-control" id="cieRevLike" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="4" <?= (isset($data['cieRevLike']) && $data['cieRevLike']="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['cieRevLike']) && $data['cieRevLike']="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['cieRevLike']) && $data['cieRevLike']="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['cieRevLike']) && $data['cieRevLike']="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['cieRevLike']) && $data['cieRevLike']="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Reprendriez-vous un finissant ou une finissante de la technique?</td>
										<td>
											<select class="form-control" id="cieRevAgain" <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="oui" <?= (isset($data['cieRevLike']) && $data['cieRevLike']="oui") ? 'selected' : ''; ?>>Oui</option>
												<option value="non" <?= (isset($data['cieRevLike']) && $data['cieRevLike']="non") ? 'selected' : ''; ?>>Non</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Reprendriez-vous le même étudiant?</td>
										<td>
											<select class="form-control" id="cieRevSame <?= (isset($data['readOnly']) && $data['readOnly']) ? 'disabled' : ''; ?>>
												<option value="oui" <?= (isset($data['cieRevSame']) && $data['cieRevSame']="oui") ? 'selected' : ''; ?>>Oui</option>
												<option value="non" <?= (isset($data['cieRevSame']) && $data['cieRevSame']="non") ? 'selected' : ''; ?>>Non</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<br />
					<?php if(!$data['readOnly']) { ?>
						<div class="well col-md-6 col-md-offset-3">
							<div class="row">
								<div class="col-md-12">
									<i>
										<p>Nous tenons à vous rappeler que le présent projet de fin d'études est une activité pédagogique dans le cade du programme d'Informatique de Gestion.</p>
										<p>Comme pour tous les autres cours, le projet fera donc l'objet d'une évaluation. Les coordonnateurs en demeurent les principaux responsables. Toutefois, une partie de cette évaluation sera faite en fonction de votre perception de la performance globale du stagiaire que vous accuueillez.</p>
										<p>Nous vous demandons de remplir ce document ves la toute fin du projet de façon à pouvoir en discuter avec le coordonnateur lors de sa dernière visite en milieu de travail.</p>
									</i>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<div class="form-group checkbox">
										<label class="checkbox-inline">
											<input type="checkbox" required />J'ai lu et compris les informations ci-dessus.</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button name="submit" value="<?= $_SESSION['form_token']; ?>" class="btn btn-block btn-primary">Soumettre</button>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</form>
	</div>
</div>