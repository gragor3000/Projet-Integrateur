<?php
	//G�n�rer un token d'identification.
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
				<h1>Information du projet de stage</h1>
				<p>Sur cette page vous trouverez les informations concernant le projet de stage qui vous a �t� assign�.</p>
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
						<h3 class="panel-title"><?= $data["project"]->name;?></h3>
					</div>
					<div class="scrollable-project">
						<div class="panel-body">
							<b>Description</b>
							<p><?= $data["project"]->descr; ?></p>
						</div>
						<div class="panel-body">
							<b>Mat�riels et logiciels pr�vus</b>
							<p><?= $data["project"]->equip; ?></p>
						</div>
						<div class="panel-body">
							<b>Exigences particuli�res</b>
							<p><?= $data["project"]->extra; ?></p>
						</div>
						<div class="panel-body">
							<b>Commentaires et informations compl�mentaires</b>
							<p><?= $data["project"]->info; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="well">
					<div class="row">
						<div class="col-md-12">
							<b>Nom de l'entreprise</b>
							<p><?= $data["cie"]->name; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<b>Num�ro de t�l�phone</b>
							<p><?= $data["cie"]->tel; ?></p>
						</div>
						<div class="col-md-6">
							<b>Adresse courriel</b>
							<p><?= $data["cie"]->email; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<b>Adresse de l'entreprise</b>
							<p><?= $data["cie"]->address; ?></p>
						</div>
						<div class="col-md-4">
							<b>Ville</b>
							<p><?= $data["cie"]->city; ?></p>
						</div>
					</div>
				</div>
				<div class="well">
					<div class="row">
						<div class="col-md-7">
							<b>Nom du superviseur</b>
							<p><?= $data["project"]->supName; ?></p>
						</div>
						<div class="col-md-5">
							<b>Titre</b>
							<p><?= $data["project"]->supTitle; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<b>Num�ro de t�l�phone</b>
							<p><?= $data["project"]->supTel; ?></p>
						</div>
						<div class="col-md-6">
							<b>Adresse courriel</b>
							<p><?= $data["project"]->supEmail; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
