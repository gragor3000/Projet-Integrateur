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
              <h1>Modifications des informations</h1>
              <p>Sur cette page vous trouverez les informations concernant l'entreprise.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 ">
            <div class="well">
              <form role="form">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label class="control-label" for="cieName">Nom de l'entreprise</label>
                    <input class="form-control" id="cieName" name="name" placeholder="Entreprise Inc." type="text" required value="<?=$data["cie"]->name; ?>" disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label class="control-label" for="cieTel">Numéro de téléphone</label>
                    <input class="form-control" id="cieTel" name="tel" placeholder="(450)555-5555 #1234" type="text" required value="<?=$data["cie"]->tel; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label" for="cieEmail">Adresse courriel</label>
                    <input class="form-control" id="cieEmail" name="email" placeholder="contact@entreprise.tld" type="email" required value="<?=$data["cie"]->email?>">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-8">
                    <label class="control-label" for="cieAddress">Adresse de l'entreprise</label>
                    <input class="form-control" id="cieAddress" name="address" placeholder="555 rue Entreprise, local 555" type="text" required value="<?=$data["cie"]->address?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label class="control-label" for="cieCity">Ville</label>
                    <input class="form-control" id="cieCity" name="city" placeholder="Joliette" type="text" required value="<?=$data["cie"]->city?>">
                  </div>
                </div>
                <button type="submit" name="sendCie" value="<?= $_SESSION['form_token']; ?>" class="btn btn-block btn-primary" formaction="/cie/info" formmethod="post">Modifier</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>