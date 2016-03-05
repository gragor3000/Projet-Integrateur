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
                <h1>Formulaire d'entrevue</h1>
		<?php if (!(isset($data['readOnly']) && $data['readOnly'])) { ?>
                <p>Sur cette page vous pourrez évaluer votre entretien d'embauche avec un stagiaire.</p>
			<?php }else{?>
					<p>Sur cette page vous pouvez visualiser un formulaire d'entrevue du stagiaire.</p>
			<?php } ?>
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
                        <h3><?= $data['intern']->name; ?></h3>
						<br/>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="intTimestamp">Date et heure d'arrivé</label>
                            <input class="form-control" id="intTimestamp" name="timestamp" placeholder="YYYY-MM-DD --:--" type="datetime-local" value="<?= (isset($data['interview'])) ? $data['interview']->timestamp : ''; ?>" <?= ($data['readOnly']) ? "readonly" : "required"; ?> />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="intDept">Service / Département</label>
                            <input class="form-control" id="intDept" name="department" type="text" value="<?= (isset($data['interview']) )? $data['interview']->department : ''; ?>" <?= ($data['readOnly']) ? "readonly" : "required"; ?> />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="intPos">Poste concerné</label>
                            <input class="form-control" id="intPosition" name="position" type="text" value="<?= (isset($data['interview'])) ? $data['interview']->position : ''; ?>" <?= ($data['readOnly']) ? "readonly" : "required"; ?> />
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
                                            <select class="form-control" id="communication" name="communication" <?= ($data['readOnly']) ? 'disabled' : ''; ?>>
                                                <option value="4" <?= (isset($data['interview']) && $data['interview']->communication=="4") ? 'selected' : ''; ?>>Excellent</option>
                                                <option value="3" <?= (isset($data['interview']) && $data['interview']->communication=="3") ? 'selected' : ''; ?>>Très bien</option>
                                                <option value="2" <?= (isset($data['interview']) && $data['interview']->communication=="2") ? 'selected' : ''; ?>>Acceptable</option>
                                                <option value="1" <?= (isset($data['interview']) && $data['interview']->communication=="1") ? 'selected' : ''; ?>>Insatisfait</option>
                                                <option value="0" <?= (isset($data['interview']) && $data['interview']->communication=="0") ? 'selected' : ''; ?>>Médiocre</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Enthousiasme et motivation</td>
                                        <td>
                                            <select class="form-control" id="motivation" name="motivation" <?= ($data['readOnly']) ? 'disabled' : ''; ?>>
                                                <option value="4" <?= (isset($data['interview']) && $data['interview']->motivation=="4") ? 'selected' : ''; ?>>Excellent</option>
                                                <option value="3" <?= (isset($data['interview']) && $data['interview']->motivation=="3") ? 'selected' : ''; ?>>Très bien</option>
                                                <option value="2" <?= (isset($data['interview']) && $data['interview']->motivation=="2") ? 'selected' : ''; ?>>Acceptable</option>
                                                <option value="1" <?= (isset($data['interview']) && $data['interview']->motivation=="1") ? 'selected' : ''; ?>>Insatisfait</option>
                                                <option value="0" <?= (isset($data['interview']) && $data['interview']->motivation=="0") ? 'selected' : ''; ?>>Médiocre</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Assurance et confiance en soi</td>
                                        <td>
                                            <select class="form-control" id="selfesteem" name="selfesteem" <?= ($data['readOnly']) ? 'disabled' : ''; ?>>
                                                <option value="4" <?= (isset($data['interview']) && $data['interview']->selfesteem=="4") ? 'selected' : ''; ?>>Excellent</option>
                                                <option value="3" <?= (isset($data['interview']) && $data['interview']->selfesteem=="3") ? 'selected' : ''; ?>>Très bien</option>
                                                <option value="2" <?= (isset($data['interview']) && $data['interview']->selfesteem=="2") ? 'selected' : ''; ?>>Acceptable</option>
                                                <option value="1" <?= (isset($data['interview']) && $data['interview']->selfesteem=="1") ? 'selected' : ''; ?>>Insatisfait</option>
                                                <option value="0" <?= (isset($data['interview']) && $data['interview']->selfesteem=="0") ? 'selected' : ''; ?>>Médiocre</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Présentation soignée</td>
                                        <td>
                                            <select class="form-control" id="appearance" name="appearance" <?= ($data['readOnly']) ? 'disabled' : ''; ?>>
                                                <option value="4" <?= (isset($data['interview']) && $data['interview']->appearance=="4") ? 'selected' : ''; ?>>Excellent</option>
                                                <option value="3" <?= (isset($data['interview']) && $data['interview']->appearance=="3") ? 'selected' : ''; ?>>Très bien</option>
                                                <option value="2" <?= (isset($data['interview']) && $data['interview']->appearance=="2") ? 'selected' : ''; ?>>Acceptable</option>
                                                <option value="1" <?= (isset($data['interview']) && $data['interview']->appearance=="1") ? 'selected' : ''; ?>>Insatisfait</option>
                                                <option value="0" <?= (isset($data['interview']) && $data['interview']->appearance=="0") ? 'selected' : ''; ?>>Médiocre</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Qualité des réponses</td>
                                        <td>
                                            <select class="form-control" id="answers" name="answers" <?= ($data['readOnly']) ? 'disabled' : ''; ?>>
                                                <option value="4" <?= (isset($data['interview']) && $data['interview']->answers=="4") ? 'selected' : ''; ?>>Excellent</option>
                                                <option value="3" <?= (isset($data['interview']) && $data['interview']->answers=="3") ? 'selected' : ''; ?>>Très bien</option>
                                                <option value="2" <?= (isset($data['interview']) && $data['interview']->answers=="2") ? 'selected' : ''; ?>>Acceptable</option>
                                                <option value="1" <?= (isset($data['interview']) && $data['interview']->answers=="1") ? 'selected' : ''; ?>>Insatisfait</option>
                                                <option value="0" <?= (isset($data['interview']) && $data['interview']->answers=="0") ? 'selected' : ''; ?>>Médiocre</option>
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
                            <textarea class="form-control" id="intComment" name="comments" <?= ($data['readOnly']) ? "readonly" : "required"; ?>><?= (isset($data['interview'])) ?  $data['interview']->comments : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label" for="intInterviewer">Responsable de l'entrevue</label>
                            <input class="form-control" id="intInterviewer" name="interviewer" placeholder="Prénom Nom" type="text" value="<?= (isset($data['interview'])) ?  $data['interview']->interviewer : ''; ?>" <?= ($data['readOnly']) ? "readonly" : "required"; ?> />
                        </div>
                    </div>
                    <?php if (!$data['readOnly']){ ?>
                    <div class="row">
                        <div class="col-md-12">
						    <input type="hidden" name="intern" value ="<?=$data['intern']->ID;?>" />
                            <button name="sendInterview" value="<?= $_SESSION['form_token']; ?>" class="btn btn-block btn-primary" formaction="/cie/interview/">Soumettre</button>
                        </div>
                    </div>
					<br/>
                    <?php } ?>
					<form>
                        <div class="col-md-12">
                            <button class="btn btn-block btn-primary" formaction="/cie/index/">Revenir à la liste des projets</button>
                        </div>
					</form>
                </div>

            </form>
        </div>
    </div>
</div>