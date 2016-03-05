<div class="section section-info">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1>Journal de bord</h1>
			  <p>Sur cette page vous pouvez visualiser le journal de bord d'un stagiaire.</p>
		   </div>
          </div>
        </div>
      </div>
      <div class="section">
        <div class="container">
          <div class="row">				
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Archives de <?=$data['intern']->name?></h3>
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
		<form>
						<div class="col-md-6">
                            <button class="btn btn-block btn-primary" formaction="/advisor/ShowInterns/">Revenir à la liste des stagiaires</button>
                        </div>
		</form>
</div>
</div>