<div class="section section-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Formulaire d'entrevue</h1>
				<p>Sur cette page vous pourrez visualiser un formulaire d'entrevue d'un stagiaire.</p>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
	 <form id = "form" role="form" METHOD="POST">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="row">    
                        <div class="form-group col-md-6">
                            <label class="control-label" for="intern">Nom de l'interviewé</label>
                            <input class="form-control" id="intern" name="intern"  type="text" value="<?=$data['intern']->name; ?>" readOnly />
                        </div>					
                        <div class="form-group col-md-6">
                            <label class="control-label" for="intTimestamp">Date et heure d'arrivé</label>
                            <input class="form-control" id="intTimestamp" name="timestamp"  type="datetime-local" value="<?=$data['interview']->timestamp; ?>" readOnly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="intDept">Service / Département</label>
                            <input class="form-control" id="intDept" name="department" type="text" value="<?=$data['interview']->department; ?>" readOnly />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="intPos">Poste concerné</label>
                            <input class="form-control" id="intPosition" name="position" type="text" value="<?=$data['interview']->position; ?>" readOnly />
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
                                            <select class="form-control" id="communication" name="communication" readOnly>
                                                <option value="4" <?= ($data['interview']->communication=="4") ? 'selected' : ''; ?>>Excellent</option>
                                                <option value="3" <?= ($data['interview']->communication=="3") ? 'selected' : ''; ?>>Très bien</option>
                                                <option value="2" <?= ($data['interview']->communication=="2") ? 'selected' : ''; ?>>Acceptable</option>
                                                <option value="1" <?= ($data['interview']->communication=="1") ? 'selected' : ''; ?>>Insatisfait</option>
                                                <option value="0" <?= ($data['interview']->communication=="0") ? 'selected' : ''; ?>>Médiocre</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Enthousiasme et motivation</td>
                                        <td>
                                            <select class="form-control" id="motivation" name="motivation" readOnly>
                                                <option value="4" <?= ($data['interview']->motivation=="4") ? 'selected' : ''; ?>>Excellent</option>
                                                <option value="3" <?= ($data['interview']->motivation=="3") ? 'selected' : ''; ?>>Très bien</option>
                                                <option value="2" <?= ($data['interview']->motivation=="2") ? 'selected' : ''; ?>>Acceptable</option>
                                                <option value="1" <?= ($data['interview']->motivation=="1") ? 'selected' : ''; ?>>Insatisfait</option>
                                                <option value="0" <?= ($data['interview']->motivation=="0") ? 'selected' : ''; ?>>Médiocre</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Assurance et confiance en soi</td>
                                        <td>
                                            <select class="form-control" id="selfesteem" name="selfesteem" readOnly>
                                                <option value="4" <?= ($data['interview']->selfesteem=="4") ? 'selected' : ''; ?>>Excellent</option>
                                                <option value="3" <?= ($data['interview']->selfesteem=="3") ? 'selected' : ''; ?>>Très bien</option>
                                                <option value="2" <?= ($data['interview']->selfesteem=="2") ? 'selected' : ''; ?>>Acceptable</option>
                                                <option value="1" <?= ($data['interview']->selfesteem=="1") ? 'selected' : ''; ?>>Insatisfait</option>
                                                <option value="0" <?= ($data['interview']->selfesteem=="0") ? 'selected' : ''; ?>>Médiocre</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Présentation soignée</td>
                                        <td>
                                            <select class="form-control" id="appearance" name="appearance" readOnly>
                                                <option value="4" <?= ($data['interview']->appearance=="4") ? 'selected' : ''; ?>>Excellent</option>
                                                <option value="3" <?= ($data['interview']->appearance=="3") ? 'selected' : ''; ?>>Très bien</option>
                                                <option value="2" <?= ($data['interview']->appearance=="2") ? 'selected' : ''; ?>>Acceptable</option>
                                                <option value="1" <?= ($data['interview']->appearance=="1") ? 'selected' : ''; ?>>Insatisfait</option>
                                                <option value="0" <?= ($data['interview']->appearance=="0") ? 'selected' : ''; ?>>Médiocre</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Qualité des réponses</td>
                                        <td>
                                            <select class="form-control" id="answers" name="answers" readOnly>
                                                <option value="4" <?= ($data['interview']->answers=="4") ? 'selected' : ''; ?>>Excellent</option>
                                                <option value="3" <?= ($data['interview']->answers=="3") ? 'selected' : ''; ?>>Très bien</option>
                                                <option value="2" <?= ($data['interview']->answers=="2") ? 'selected' : ''; ?>>Acceptable</option>
                                                <option value="1" <?= ($data['interview']->answers=="1") ? 'selected' : ''; ?>>Insatisfait</option>
                                                <option value="0" <?= ($data['interview']->answers=="0") ? 'selected' : ''; ?>>Médiocre</option>
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
                            <textarea class="form-control" id="intComment" name="comments" readOnly><?=$data['interview']->comments; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label" for="intInterviewer">Responsable de l'entrevue</label>
                            <input class="form-control" id="intInterviewer" name="interviewer" type="text" value="<?=$data['interview']->interviewer; ?>" readOnly/>
                        </div>
                    </div>
                </div>
        </div>
		</form>
    </div>
</div>