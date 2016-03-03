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
				<h1>Département de la Technique de l'Informatique</h1>
				<p>vous accueuille sur son site de gestion de stage. Sur ce site une entreprise peut soumettre un projet de stage qui sera étudié par les coordonnateurs de stage. Ceux-ci évaluront les stages qui pourront être choisi par les finissants de la technique. Avant tout chose, l'entreprise qui n'a pas de compte devra s'inscrire en utilisant le formulaire ci-dessous et être autorisé à soumettre un projet. Un fois autorisé, celui-ci recevra un courriel contenant un nom d'utilisateur si la suggestion n'est pas retenue et un mot de passe.</p>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 ">
				<div class="well">
					<form role="form">
						<div class="row">
							<div class="form-group col-md-7">
								<label class="control-label" for="cieName">Nom de l'entreprise</label>
								<input class="form-control" id="cieName" name="name" placeholder="Entreprise Inc." type="text" required />
							</div>
							<div class="form-group col-md-5">
								<label class="control-label" for="cieUser">Nom de compte (Suggestion)</label>
								<input class="form-control" id="cieUser" name="user" placeholder="Entre_Inc123 (A-z, 0-9, _)" pattern="([A-z0-9_]){6,12}" maxlength="12" type="text" />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label class="control-label" for="cieTel">Numéro de téléphone</label>
								<input class="form-control" id="cieTel" name="tel" placeholder="(450)555-5555 #1234" pattern="\(\d{3}\)\d{3}\-\d{4}( #\d{1,4})?" type="text" required />
							</div>
							<div class="form-group col-md-6">
								<label class="control-label" for="cieEmail">Adresse courriel</label>
								<input class="form-control" id="cieEmail" name="email" placeholder="contact@entreprise.tld" type="email" required />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-8">
								<label class="control-label" for="cieAddress">Adresse de l'entreprise</label>
								<input class="form-control" id="cieAddress" name="address"placeholder="555 rue Entreprise, local 555" type="text" required />
							</div>
							<div class="form-group col-md-4">
								<label class="control-label" for="cieCity">Ville</label>
								<input class="form-control" id="cieCity" name="city" placeholder="Joliette" pattern="([A-z ]){3,}" type="text" required />
							</div>
						</div>
						<button type="submit" name="sendCie" value="<?= $_SESSION['form_token']; ?>" class="btn btn-block btn-primary" formaction="/home/submitCie" formmethod="post">Soumettre</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>