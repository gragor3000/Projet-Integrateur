<?php
/*
 * 2016-02-19 : COMPLÉTÉ
 */
?>
<?php
	//Générer un token d'identification.
	$token = md5(uniqid(rand(), TRUE));
	$_SESSION['form_token'] = $token;
	$_SESSION['form_timer'] = time();
?>
<script>
    //Active les popovers.
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover(); 
    });
</script>
    
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
                <h1>Listes des projets de stage</h1>
                <p>Sur cette page vous trouverez les informations concernant les projets de stage validé.</p>
            </div>
        </div>
    </div>
</div>
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Visualisation des projets de stage</h3>
					</div>
					<div class="panel-body">
						<form>
							<table class="table table-striped">
								<thead>
									<tr>
										<th width="15px"></th>
										<th>Titre</th>
										<th>Entreprise</th>
										<th>Nom du superviseur</th>
										<th class="text-center" width="125px">Supprimer</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (isset($data['projects'])) {
										foreach ($data['projects'] as $project) {?>
									<tr>
										<td>
											<a data-toggle="collapse" href="#project<?= $project->ID ?>">
												<i class="fa fa-caret-down fa-lg fa-fw"></i>
											</a>
										</td>
										<td><?= $project->title; ?></td>
										<td><?= $data['cieP'][$project->businessID]->name; ?></td>
										<td><a href="#" title="Contact:" data-html="true" data-toggle="popover" data-trigger="hover" data-content="Tel: <?= $project->supTel; ?><br />Email : <?= $project->supEmail; ?>"><?= $project->supName; ?></a></td>
										<td class="text-center">
											<button class="btn btn-link" name="denyProject" value="<?= $_SESSION['form_token']; ?>" formaction="DenyProject/<?= $project->ID ?>" formmethod="post">
												<i class="fa fa-times-circle fa-fw fa-lg text-danger"></i>
											</button>
										</td>
									</tr>
									<tr id="project<?= $project->ID ?>" class="panel-collapse collapse">
										<td colspan="5">
											<p>
												<b>Description: </b>
										<?= $project->descr; ?>
											</p>
											<p>
												<b>Equipement: </b>
										<?= $project->equip; ?>
											</p>
											<p>
												<b>Exigence: </b>
										<?= $project->extra; ?>
											</p>
											<p>
												<b>Information supplémentaire: </b>
										<?= $project->info; ?>
											</p>
											</div>
									</tr>
									<?php }} else { ?>
								<td colspan="6">Aucun projet n'a été accepté</td>
										<?php } ?>
								</tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>