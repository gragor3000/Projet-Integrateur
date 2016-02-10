<!--
2016-02-09 Marc Lauzon.
Formulaire de changement de mot de passe.
Accessible par le coordonnateur seulement.
(Copie dans stagiaire et entreprise)

À FAIRE
- Validation entre newPass et newVerif. (JS)
- Afficher la validation dans #valid. (JS)
-->
<?php
	//Générer un token d'identification.
	$token = md5(uniqid(rand(), TRUE));
	$_SESSION['form_token'] = $token;
	$_SESSION['form_timer'] = time();
?>
<div class="section section-info">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Changement de mot de passe</h1>
				<p>Sur cette page vous pouvez soumettre un changement de mot de passe.</p>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form role="form">
					<div class="form-group">
						<label class="control-label" for="newPass">Entrer le nouveau mot de passe</label>
						<input class="form-control" id="newPass" name="password" placeholder="Nouveau mot de passe" type="password" required />
					</div>
					<div class="form-group">
						<label class="control-label" for="newVerif">Verifier le mot de passe</label>
						<input class="form-control" id="newVerif" placeholder="Entrer de nouveau" type="password" required />
					</div>
					<div class="row">
						<div class="col-md-8">
							<p class="text-center" id="valid"></p>
						</div>
						<div class="col-md-4">
							<button type="submit" name="editPass" value="<?= $_SESSION['form_token'];?>" class="btn btn-block btn-primary" formaction="/advisor/updatePW" formmethod="post">Soumettre</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>