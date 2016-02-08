<?php include="menu.php"; ?>
<div class="section section-info">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Formulaire d'entrevue</h1>
				<p>Sur cette page vous pourrez évaluer votre entretien d'embauche avec un
              stagiaire potentiel.</p>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="container">
		<form role="form">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="row">
						<div class="form-group col-md-6">
							<label class="control-label" for="intIntern">Nom de l'interviewé</label>
							<select class="form-control" id="intIntern" required /></select>
					</div>
					<div class="form-group col-md-6">
						<label class="control-label" for="intTimestamp">Date et heure d'arrivé</label>
						<input class="form-control" id="intTimestamp" placeholder="YYYY-MM-DD --:--" type="datetime-local" required />
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label class="control-label" for="intDept">Service / Département</label>
						<input class="form-control" id="intDept" type="text" required />
					</div>
					<div class="form-group col-md-6">
						<label class="control-label" for="intTimestamp">Poste concerné</label>
						<input class="form-control" id="intTimestamp" type="text" required />
					</div>
				</div>
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
									<td>Communication orale</td>
									<td>
										<select class="form-control" required>
											<option>Excellent</option>
											<option>Très bien</option>
											<option>Acceptable</option>
											<option>Insatisfait</option>
											<option>Médiocre</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Enthousiasme et motivation</td>
									<td>
										<select class="form-control" required>
											<option>Excellent</option>
											<option>Très bien</option>
											<option>Acceptable</option>
											<option>Insatisfait</option>
											<option>Médiocre</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Assurance et confiance en soi</td>
									<td>
										<select class="form-control" required>
											<option>Excellent</option>
											<option>Très bien</option>
											<option>Acceptable</option>
											<option>Insatisfait</option>
											<option>Médiocre</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Présentation soignée</td>
									<td>
										<select class="form-control" required>
											<option>Excellent</option>
											<option>Très bien</option>
											<option>Acceptable</option>
											<option>Insatisfait</option>
											<option>Médiocre</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Qualité des réponses</td>
									<td>
										<select class="form-control" required>
											<option>Excellent</option>
											<option>Très bien</option>
											<option>Acceptable</option>
											<option>Insatisfait</option>
											<option>Médiocre</option>
										</select>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label class="control-label" for="intComment">Commentaires</label>
						<textarea class="form-control" id="intComment"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label class="control-label" for="intComment">Responsable de l'entrevue</label>
						<input class="form-control" id="intComment" placeholder="Prénom Nom" type="text" required />
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<a class="btn btn-block btn-primary">Soumettre</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>