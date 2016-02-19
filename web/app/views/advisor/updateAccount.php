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
              <h1>Modification de comptes utilisateurs</h1>
              <p>Sur cette page vous pouvez modifier un compte utilisateur.</p>
            </div>
          </div>
        </div>
      </div>
      
     <div class="section">
	 <h3 class="panel-title">Modification de comptes</h3>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 ">
            <div class="well">
              <form role="form">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label class="control-label" for="userName">Nom</label>
                    <input class="form-control" id="userName" name="name" placeholder="<?=$data["user"]->name?>" type="text" required />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label class="control-label" for="userUser">login</label>
                    <input class="form-control" id="userUser" name="user" placeholder="<?=$data["user"]->user?>" type="text" required />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label class="control-label" for="userRank">Rang</label>
                    <select class="form-control" id="userRank" name="rank" >
					  <option value = 0 <?=if($data["user"]->rank == 0)? selected: ''?>>Coordonnateur</option>
					  <option value = 1 <?=if($data["user"]->rank == 1)? selected: ''?>>Entreprise</option>
					  <option value = 2 <?=if($data["user"]->rank == 2)? selected: ''?>>Stagiaire</option>
					</select>
                  </div>                
                </div>
                <button type="submit" name="updateUser" value="<?= $_SESSION['form_token']; ?>" class="btn btn-block btn-primary" formaction="/advisor/updateUser" formmethod="post">Modifier</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>