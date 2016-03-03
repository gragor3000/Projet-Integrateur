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
              <h1>Évaluations</h1>
              <p>Sur cette page vous trouverez différentes évaluations par les superviseurs et les coordonnateurs.</p>
            </div>
          </div>
        </div>
</div>
<div class="section">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="lead list-group text-center">
                <a href = "/intern/review/interview" class="list-group-item">Entretien d'embauche</a>
                <a href = "/intern/review/evalAdvMid" class="list-group-item">Évaluation de stage mi-session</a>
                <a href = "/intern/review/evalSup" class="list-group-item">Évaluation de stage du superviseur</a>
                <a href = "/intern/review/evalAdvFinale" class="list-group-item">Évaluation de stage finale</a>
              </div>
            </div>
          </div>
        </div>
</div>