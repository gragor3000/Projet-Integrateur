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
                            <button type="submit" name="editPass" value="<?= $_SESSION['form_token'];?>" class="btn btn-block btn-primary" formaction="/advisor/pass" formmethod="post">Soumettre</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>