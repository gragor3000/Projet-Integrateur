<?php include "menu.php"; ?>
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
						<input class="form-control" id="newPass" placeholder="Nouveau mot de passe" type="password" required />
					</div>
					<div class="form-group">
						<label class="control-label" for="newVerif">Verifier le mot de passe</label>
						<input class="form-control" id="newVerif" placeholder="Entrer de nouveau" type="password" required />
					</div>
					<div class="row">
						<div class="col-md-8">
							<p class="text-center">Message de validité.</p>
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-block btn-primary">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>