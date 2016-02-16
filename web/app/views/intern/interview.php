<div class="section">
	<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="row">
					<div class="form-group col-md-6">
						<label class="control-label" for="intTimestamp">Date et heure d'arrivé</label>
						<p style="margin-top:7px;"><?= (isset($data['interview'])) ? $data['interview']->date : ''; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label class="control-label" for="intDept">Service / Département</label>
						<p style="margin-top:7px;"><?= (isset($data['interview'])) ? $data['interview']->department : ''; ?></p>
					</div>
					<div class="form-group col-md-6">
						<label class="control-label" for="intPos">Poste concerné</label>
						<p style="margin-top:7px;"><?= (isset($data['interview'])) ? $data['interview']->position : ''; ?></p>
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
											<option value="4" <?= (isset($data['interview']) && $data['interview']->communication="4") ? 'selected' : ''; ?>>Excellent</option>
											<option value="3" <?= (isset($data['interview']) && $data['interview']->communication="3") ? 'selected' : ''; ?>>Très bien</option>
											<option value="2" <?= (isset($data['interview']) && $data['interview']->communication="2") ? 'selected' : ''; ?>>Acceptable</option>
											<option value="1" <?= (isset($data['interview']) && $data['interview']->communication="1") ? 'selected' : ''; ?>>Insatisfait</option>
											<option value="0" <?= (isset($data['interview']) && $data['interview']->communication="0") ? 'selected' : ''; ?>>Médiocre</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Enthousiasme et motivation</td>
									<td>
											<option value="4" <?= (isset($data['interview']) && $data['interview']->motivation="4") ? 'selected' : ''; ?>>Excellent</option>
											<option value="3" <?= (isset($data['interview']) && $data['interview']->motivation="3") ? 'selected' : ''; ?>>Très bien</option>
											<option value="2" <?= (isset($data['interview']) && $data['interview']->motivation="2") ? 'selected' : ''; ?>>Acceptable</option>
											<option value="1" <?= (isset($data['interview']) && $data['interview']->motivation="1") ? 'selected' : ''; ?>>Insatisfait</option>
											<option value="0" <?= (isset($data['interview']) && $data['interview']->motivation="0") ? 'selected' : ''; ?>>Médiocre</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Assurance et confiance en soi</td>
									<td>
											<option value="4" <?= (isset($data['interview']) && $data['interview']->selfesteem="4") ? 'selected' : ''; ?>>Excellent</option>
											<option value="3" <?= (isset($data['interview']) && $data['interview']->selfesteem="3") ? 'selected' : ''; ?>>Très bien</option>
											<option value="2" <?= (isset($data['interview']) && $data['interview']->selfesteem="2") ? 'selected' : ''; ?>>Acceptable</option>
											<option value="1" <?= (isset($data['interview']) && $data['interview']->selfesteem="1") ? 'selected' : ''; ?>>Insatisfait</option>
											<option value="0" <?= (isset($data['interview']) && $data['interview']->selfesteem="0") ? 'selected' : ''; ?>>Médiocre</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Présentation soignée</td>
									<td>
											<option value="4" <?= (isset($data['interview']) && $data['interview']->appearance="4") ? 'selected' : ''; ?>>Excellent</option>
											<option value="3" <?= (isset($data['interview']) && $data['interview']->appearance="3") ? 'selected' : ''; ?>>Très bien</option>
											<option value="2" <?= (isset($data['interview']) && $data['interview']->appearance="2") ? 'selected' : ''; ?>>Acceptable</option>
											<option value="1" <?= (isset($data['interview']) && $data['interview']->appearance="1") ? 'selected' : ''; ?>>Insatisfait</option>
											<option value="0" <?= (isset($data['interview']) && $data['interview']->appearance="0") ? 'selected' : ''; ?>>Médiocre</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Qualité des réponses</td>
									<td>
											<option value="4" <?= (isset($data['interview']) && $data['interview']->answers="4") ? 'selected' : ''; ?>>Excellent</option>
											<option value="3" <?= (isset($data['interview']) && $data['interview']->answers="3") ? 'selected' : ''; ?>>Très bien</option>
											<option value="2" <?= (isset($data['interview']) && $data['interview']->answers="2") ? 'selected' : ''; ?>>Acceptable</option>
											<option value="1" <?= (isset($data['interview']) && $data['interview']->answers="1") ? 'selected' : ''; ?>>Insatisfait</option>
											<option value="0" <?= (isset($data['interview']) && $data['interview']->answers="0") ? 'selected' : ''; ?>>Médiocre</option>
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
						<p style="margin-top:7px;"><?= (isset($data['interview'])) ?  $data['interview']->comments : ''; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label class="control-label" for="intInterviewer">Responsable de l'entrevue</label>
						<p style="margin-top:7px;"><?= (isset($data['interview'])) ?  $data['interview']->interviewer : ''; ?></p>
					</div>
				</div>			
			</div>
	</div>
</div>
