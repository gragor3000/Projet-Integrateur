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
              <h1>Liste et création de comptes utilisateurs</h1>
              <p>Sur cette page vous trouverez la liste des utilisateurs du site ainsi que la création de nouveaux comptes.</p>
            </div>
          </div>
        </div>
      </div>
      
     <div class="section">
	 <h3 class="panel-title">Création de comptes</h3>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 ">
            <div class="well">
              <form role="form">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label class="control-label" for="userName">Nom</label>
                    <input class="form-control" id="userName" name="name" placeholder="Smith John" type="text" required />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label class="control-label" for="userUser">login</label>
                    <input class="form-control" id="userUser" name="user" placeholder="jSmith" type="text" required />
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label" for="userPass">Mot de passe</label>
                    <input class="form-control" id="userPass" name="pw"  type="text" required />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label class="control-label" for="userRank">Rang</label>
                    <select class="form-control" id="userRank" name="rank" >
					  <option value = 0>Coordonnateur</option>
					  <option value = 1>Entreprise</option>
					  <option value = 2>Stagiaire</option>
					</select>
                  </div>                
                </div>
                <button type="submit" name="createUser" value="<?= $_SESSION['form_token']; ?>" class="btn btn-block btn-primary" formaction="/advisor/createUser" formmethod="post">Ajouter</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
	
     <div class="section">
	 <h3 class="panel-title">Liste des utilisateurs</h3>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 ">
            <div class="well">
              <form>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Nom Prénom</th>
										<th>login</th>
                                        <th>Rang</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($data['users'])) {
                                        foreach ($data['users'] as $user) { ?>
                                            <tr id="user<?= $user->id ?>">
                                                <td><?= $user->name; ?></td>
                                                <td><?= $user->user; ?></td>
                                                <td><?= $user->rank; ?></td>
                                                <td>
                                                    <button class="btn btn-link" formaction="advisor/UpdateUser" formmethod="post">
                                                    </button>
                                                </td>
												<td>
                                                    <button class="btn btn-link" formaction="advisor/DeleteUser" formmethod="post">
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php }} else { ?>
                                            <td colspan="6">Aucun utilisateur enregistré</td>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  