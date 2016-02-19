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
              <h1>Liste des stagiaires</h1>
              <p>Sur cette page vous trouverez la liste des stagiaires du site ainsi que leurs évaluations respectives.</p>
            </div>
          </div>
        </div>
      </div>
	  
<div class="section">
	 <h3 class="panel-title">Liste des stagiaires</h3>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 ">
            <div class="well">
              <form>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Nom Prénom</th>
										<th>login</th>
                                        <th>Journal de bord</th>
                                        <th>Entrevue #1</th>
                                        <th>Entrevue #2</th>
										<th>Évaluation mi-stage</th>
										<th>Évaluation fin-stage</th>
										<th>Évaluation du superviseur</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($data['interns'])) {
                                        foreach ($data['interns'] as $intern) { ?>
                                            <tr id="intern<?= $intern->id ?>">
                                                <td><?= $user->name; ?></td>
                                                <td><?= $user->user; ?></td>
												
                                                <td>
												    <button class="btn btn-link" formaction="advisor/review/logbook" formmethod="post">Visualiser</button>
												</td>
                                                <td>
                                                    <button class="btn btn-link" formaction="advisor/review/interview1" formmethod="post">Visualiser</button>
                                                </td>
												<td>
                                                    <button class="btn btn-link" formaction="advisor/review/interview2" formmethod="post">Visualiser</button>
                                                </td>
												<td>
                                                    <button class="btn btn-link" formaction="advisor/review/advMid" formmethod="post">Visualiser</button>
                                                </td>
												<td>
                                                    <button class="btn btn-link" formaction="advisor/review/advFinale" formmethod="post">Visualiser</button>
                                                </td>
												<td>
                                                    <button class="btn btn-link" formaction="advisor/review/sup" formmethod="post">Visualiser</button>
                                                </td>
                                            </tr>
                                        <?php }
                                    else
                                        {
                                            ?>
                                            <td colspan="6">Aucun stagiaire enregistré</td>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            </form>
            </div>
          </div>
        </div>
      </div>
    </div> 