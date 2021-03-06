<div class="section section-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Formulaire d'évaluation du superviseur</h1>
				<p>Sur cette page vous pourrez visualiser un formulaire d'évaluation du superviseur d'un stagiaire.</p>
            </div>
        </div>
    </div>
</div>
<div class="section">
	<div class="container">
		<form class="form-vertical" role="form">		
			<div class="row">
				<div class="col-md-12">
					<div class="row well">
						<div class="form-group col-md-4">
							<label class="control-label" for="revIntern">Nom du stagiaire</label>
							<input class="form-control" id="revIntern" type="text" value="<?=$data['intern']->name; ?>" readOnly />  
						</div>
						<div class="form-group col-md-6">
							<label class="control-label" for="revTitle">Titre du projet</label>
							<input class="form-control" id="revtitle"  type="text" value="<?=$data['project']->title; ?>" readOnly />
						</div>
						<div class="form-group col-md-2">
						 <label class="control-label" for="revDate">Date</label>
							<input class="form-control" id="revDate" type="text" value="<?=$data['review']->revDate; ?>" readOnly />
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
											<select id="cieRev111" name="cieRev111" class="form-control" disabled >
												<option value="4" <?= ( $data['review']->cieRev111=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ($data['review']->cieRev111=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ($data['review']->cieRev111=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ($data['review']->cieRev111=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ( $data['review']->cieRev111=="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Appliquer la règlementation en mise en place</td>
										<td>
											<select id="cieRev112" name="cieRev112" class="form-control" disabled>
												<option value="4" <?= ( $data['review']->cieRev112=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ( $data['review']->cieRev112=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ( $data['review']->cieRev112=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ($data['review']->cieRev112=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ($data['review']->cieRev112=="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Manifester de la persévérance dans les tâches à accomplir</td>
										<td>
											<select id="cieRev113" name="cieRev113" class="form-control" disabled>
												<option value="4" <?= ($data['review']->cieRev113=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ($data['review']->cieRev113=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ($data['review']->cieRev113=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ($data['review']->cieRev113=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ($data['review']->cieRev113=="0") ? 'selected' : ''; ?>>Non applicable</option>
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
							<textarea class="form-control" id="cieRev1" name="cieRev1" readOnly><?=$data['review']->cieRev1; ?></textarea>
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
											<select id="cieRev211" name="cieRev211" class="form-control" disabled>
												<option value="4" <?= ($data['review']->cieRev211=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ($data['review']->cieRev211=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ($data['review']->cieRev211=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ($data['review']->cieRev211=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ( $data['review']->cieRev211=="0") ? 'selected' : ''; ?>>Non applicable</option>
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
											<select id="cieRev221" name="cieRev221" class="form-control" disabled>
												<option value="4" <?= ($data['review']->cieRev221=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ( $data['review']->cieRev221=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ($data['review']->cieRev221=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ( $data['review']->cieRev221=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ($data['review']->cieRev221=="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Archiver toute l'information relative au programme.</td>
										<td>
											<select id="cieRev222" name="cieRev222" class="form-control" disabled>
												<option value="4" <?= ($data['review']->cieRev222=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ($data['review']->cieRev222=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ($data['review']->cieRev222=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ( $data['review']->cieRev222=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ($data['review']->cieRev222=="0") ? 'selected' : ''; ?>>Non applicable</option>
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
											<select id="cieRev231" name="cieRev231" class="form-control" disabled>
												<option value="4" <?= ($data['review']->cieRev231=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ( $data['review']->cieRev231=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ($data['review']->cieRev231=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ($data['review']->cieRev231=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ( $data['review']->cieRev231=="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Rédiger de façon claire et complète les instructions d'utilisation de l'application.</td>
										<td>
											<select id="cieRev232" name="cieRev232" class="form-control" disabled>
												<option value="4" <?= ($data['review']->cieRev232=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ( $data['review']->cieRev232=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ( $data['review']->cieRev232=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ($data['review']->cieRev232=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ( $data['review']->cieRev232=="0") ? 'selected' : ''; ?>>Non applicable</option>
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
							<textarea class="form-control" id="cieRev2" name="cieRev2" readOnly><?=$data['review']->cieRev2;?></textarea>
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
											<select id="cieRev311" name="cieRev311" class="form-control" disabled>
												<option value="4" <?= ($data['review']->cieRev311=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ($data['review']->cieRev311=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ( $data['review']->cieRev311=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ($data['review']->cieRev311=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ($data['review']->cieRev311=="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Déterminer les étapes et les procédures de la mise en oeuvre et établir un échéancier réaliste des travaux.</td>
										<td>
											<select id="cieRev312" name="cieRev312" class="form-control" disabled>
												<option value="4" <?= ($data['review']->cieRev312=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ($data['review']->cieRev312=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ($data['review']->cieRev312=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ($data['review']->cieRev312=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ( $data['review']->cieRev312=="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Communiquer efficacement l'information pertinente aux personnes concernées.</td>
										<td>
											<select id="cieRev313" name="cieRev313" class="form-control" disabled>
												<option value="4" <?= ($data['review']->cieRev313=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ($data['review']->cieRev313=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ($data['review']->cieRev313=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ($data['review']->cieRev313=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ($data['review']->cieRev313=="0") ? 'selected' : ''; ?>>Non applicable</option>
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
											<select id="cieRev321" name="cieRev321" class="form-control" disabled>
												<option value="4" <?= ( $data['review']->cieRev321=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ( $data['review']->cieRev321=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ( $data['review']->cieRev321=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ( $data['review']->cieRev321=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ( $data['review']->cieRev321=="0") ? 'selected' : ''; ?>>Non applicable</option>
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
											<select id="cieRev331" name="cieRev331" class="form-control" disabled>
												<option value="4" <?= (isset($data['review']) && $data['review']->cieRev331=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['review']) && $data['review']->cieRev331=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['review']) && $data['review']->cieRev331=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['review']) && $data['review']->cieRev331=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['review']) && $data['review']->cieRev331=="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Gérer le stress.</td>
										<td>
											<select id="cieRev332" name="cieRev332" class="form-control" disabled>
												<option value="4" <?= ($data['review']->cieRev332=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ($data['review']->cieRev332=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ($data['review']->cieRev332=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ($data['review']->cieRev332=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ($data['review']->cieRev332=="0") ? 'selected' : ''; ?>>Non applicable</option>
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
											<select id="cieRev341" name="cieRev341" class="form-control" disabled>
												<option value="4" <?= ( $data['review']->cieRev341=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ( $data['review']->cieRev341=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ( $data['review']->cieRev341=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ( $data['review']->cieRev341=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ($data['review']->cieRev341=="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Analyser et solutionner les problèmes découlant de la mise en oeuvre.</td>
										<td>
											<select id="cieRev342" name="cieRev342" class="form-control" disabled>
												<option value="4" <?= (isset($data['review']) && $data['review']->cieRev342=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= (isset($data['review']) && $data['review']->cieRev342=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= (isset($data['review']) && $data['review']->cieRev342=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= (isset($data['review']) && $data['review']->cieRev342=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= (isset($data['review']) && $data['review']->cieRev342=="0") ? 'selected' : ''; ?>>Non applicable</option>
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
											<select id="cieRev351" name="cieRev351" class="form-control" disabled>
												<option value="4" <?= ($data['review']->cieRev351=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ( $data['review']->cieRev351=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ( $data['review']->cieRev351=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ( $data['review']->cieRev351=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ( $data['review']->cieRev351=="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Appliquer rigoureusement les règles de rédaction et de présentation.</td>
										<td>
											<select id="cieRev352" name="cieRev352" class="form-control" disabled>
												<option value="4" <?= ( $data['review']->cieRev352=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ( $data['review']->cieRev352=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ( $data['review']->cieRev352=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ( $data['review']->cieRev352=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ( $data['review']->cieRev352=="0") ? 'selected' : ''; ?>>Non applicable</option>
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
							<textarea class="form-control" id="cieRev3" name="cieRev3" readOnly><?=$data['review']->cieRev3; ?></textarea>
						</div>
					</div>
					<h3 class="page-header">Informations complémentaires</h3>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="control-label" for="cieRevBest">Points forts</label>
							<textarea class="form-control" id="cieRevBest" name="cieRevBest" readOnly><?=$data['review']->cieRevBest; ?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="control-label" for="cieRevLess">Points à améliorer</label>
							<textarea class="form-control" id="cieRevLess" name="cieRevLess" readOnly><?= $data['review']->cieRevLess; ?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="control-label" for="cieRevOther">Autres remarques</label>
							<textarea class="form-control" id="cieRevOther" name="cieRevOther" readOnly><?=$data['review']->cieRevOther; ?></textarea>
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
											<select class="form-control" id="cieRevLike" name="cieRevLike" disabled>
												<option value="4" <?= ( $data['review']->cieRevLike=="4") ? 'selected' : ''; ?>>Excellent</option>
												<option value="3" <?= ( $data['review']->cieRevLike=="3") ? 'selected' : ''; ?>>Satisfaisant</option>
												<option value="2" <?= ( $data['review']->cieRevLike=="2") ? 'selected' : ''; ?>>Acceptable</option>
												<option value="1" <?= ($data['review']->cieRevLike=="1") ? 'selected' : ''; ?>>Insatisfait</option>
												<option value="0" <?= ($data['review']->cieRevLike=="0") ? 'selected' : ''; ?>>Non applicable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Reprendriez-vous un finissant ou une finissante de la technique?</td>
										<td>
											<select class="form-control" id="cieRevAgain" name="cieRevAgain" disabled>
												<option value="oui" <?= ($data['review']->cieRevAgain=="oui") ? 'selected' : ''; ?>>Oui</option>
												<option value="non" <?= ($data['review']->cieRevAgain=="non") ? 'selected' : ''; ?>>Non</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Reprendriez-vous le même étudiant?</td>
										<td>
											<select class="form-control" id="cieRevSame" name="cieRevSame" disabled>
												<option value="oui" <?= ( $data['review']->cieRevSame=="oui") ? 'selected' : ''; ?>>Oui</option>
												<option value="non" <?= ($data['review']->cieRevSame=="non") ? 'selected' : ''; ?>>Non</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</form>
		<form>
					<div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-block btn-primary" formaction="/advisor/ShowInterns/">Revenir à la liste des stagiaires</button>
                        </div>
                    </div>
		</form>
	</div>
</div>