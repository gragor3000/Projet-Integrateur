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
              <h1>Journal de bord</h1>

               <p>Sur cette page vous pourrez soumettre une entrée à votre journal de bord ou consulter les entrées précédentes.</p>

		   </div>
          </div>
        </div>
      </div>
      <div class="section">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
			

              <div class="well">
                <form role="form">
                  <div class="form-group">
                    <label class="control-label" for="logText">Écrire votre nouvelle entrée ci-dessous.</label>
                    <textarea class="form-control" name ="logText" id="logText"></textarea>
                  </div>
                  <button type="submit" class="btn btn-block btn-primary" formaction="/intern/log" formmethod="post">Soumettre</button>
                </form>
              </div>
            </div>

			
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Archives</h3>
                </div>
                <div class="scrollable-project">
				 <?php if($data['logs'] != null){
					$count = 0; foreach ($data['logs'] as $log) {; ?>
					  <div class="panel-body">
						<b><?=array_search($log, $data['logs'])?></b>
						<p><?=$log?></p>
						<br/>
					  </div>
				 <?php }
				 }?>		
              </div>
            </div>
          </div>
        </div>
      </div>
</div>