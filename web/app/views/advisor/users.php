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
                <h1>Département de la Technique de l'Informatique</h1>
				<p>Sur cette page, vous pouvez ajouter, modifier, supprimer un utilisateur et aussi une entreprise.</p>
            </div>
        </div>
    </div>
</div>
<div class="section">


        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 ">
                    <h3 class="panel-title">Création de comptes</h3>
                    <br/>
                    <div class="well">
                        <form role="form">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="userName">Nom</label>
                                    <input class="form-control" id="userName" name="name" placeholder="Sam Baker"
                                           type="text" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="userUser">Nom d'utilisateur</label>
                                    <input class="form-control" id="userUser" name="user" placeholder="sBaker" type="text"
                                           required/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="userPass">Mot de passe</label>
                                    <input class="form-control" id="userPass" name="pw"
                                           type="password" placeholder="******" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="userRank">Rang</label>
                                    <select class="form-control" id="userRank" name="rank">
                                        <option value=2>Stagiaire</option>
                                        <option value=0>Coordonnateur</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="createUser" value="<?= $_SESSION['form_token']; ?>"
                                    class="btn btn-block btn-primary" formaction="/advisor/createUser" formmethod="post">
                                Ajouter
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <br/>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Liste des étudiants</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/advisor/DeleteUser/" method="post">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Nom d'utilisateur</th>
                                    <th class="text-center">Modifier</th>
                                    <th class="text-center">Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($data["users"])) {
                                    foreach ($data["users"] as $user) {
                                        if ($user->rank == 2) {
                                            ?>
                                            <tr id="<?= $user->ID; ?>"">
                                                <td id="name<?= $user->ID; ?>"><?= $user->name; ?></td>
                                                <td id="user<?= $user->ID; ?>"><?= $user->user; ?></td>
                                                <td class="text-center">
                                                    <!-- TODO:// changer les appels pour modifier et supprimer -->
                                                    <button type="button" id="btnModIntern<?= $user->ID; ?>" class="btn btn-link"
                                                            name="modifyUser" value="<?= $_SESSION['form_token']; ?>"
                                                            onclick="modify(<?= $user->ID ?>) ">
                                                        <i class="-circle fa fa-fw fa-lg fa-pencil-square text-success"></i>
                                                    </button>
                                                </td>
                                                <td class="text-center" name="userID" value="<?= $user->ID; ?>">
                                                    <button type="button" id="btnModIntern<?= $user->ID; ?>" class="btn btn-link"
                                                            name="modifyUser" value="<?= $_SESSION['form_token']; ?>"
                                                            onclick="deleteUser(<?= $user->ID ?>) ">
                                                        <i class="fa fa-times-circle fa-fw fa-lg text-danger"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                } ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
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
                        <h3 class="panel-title">Liste des superviseurs</h3>
                    </div>
                    <div class="panel-body">
                        <form>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Nom d'utilisateur</th>
                                    <th class="text-center">Modifier</th>
                                    <th class="text-center">Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($data["users"])) {
                                    foreach ($data["users"] as $user) {
                                        if ($user->rank == 1) {
                                            ?>
                                            <tr id="<?= $user->ID ?>">
                                                <td id="name<?= $user->ID ?>"><?= $user->name; ?></td>
                                                <td id="user<?= $user->ID ?>"><?= $user->user; ?></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-link" name="denyProject"
                                                            value="<?= $_SESSION['form_token']; ?>"
                                                            onclick="modify(<?= $user->ID ?>)">
                                                        <i class="-circle fa fa-fw fa-lg fa-pencil-square text-success"></i>
                                                    </button>
                                                </td>
                                                <td class="text-center" name="userID" value="<?= $user->ID; ?>">
                                                    <button type="button" id="btnModIntern<?= $user->ID; ?>" class="btn btn-link"
                                                            name="modifyUser" value="<?= $_SESSION['form_token']; ?>"
                                                            onclick="deleteCie(<?= $user->ID ?>) ">
                                                        <i class="fa fa-times-circle fa-fw fa-lg text-danger"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                } ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
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
                        <h3 class="panel-title">Liste des coordonnateurs</h3>
                    </div>
                    <div class="panel-body">
                        <form>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Nom d'utilisateur</th>
                                    <th class="text-center">Modifier</th>
                                    <th class="text-center">Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($data["users"])) {
                                    foreach ($data["users"] as $user) {
                                        if ($user->rank == 0) {
                                            ?>
                                            <tr id="<?= $user->ID ?>">
                                                <td id="name<?= $user->ID ?>"><?= $user->name; ?></td>
                                                <td id="user<?= $user->ID ?>"><?= $user->user; ?></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-link" name="denyProject"
                                                            value="<?= $_SESSION['form_token']; ?>"
                                                            onclick="modify(<?= $user->ID ?>)">
                                                        <i class="-circle fa fa-fw fa-lg fa-pencil-square text-success"></i>
                                                    </button>
                                                </td>
                                                <td class="text-center" name="userID" value="<?= $user->ID; ?>">
                                                    <button type="button" id="btnModIntern<?= $user->ID; ?>" class="btn btn-link"
                                                            name="modifyUser" value="<?= $_SESSION['form_token']; ?>"
                                                            onclick="deleteUser(<?= $user->ID ?>) ">
                                                        <i class="fa fa-times-circle fa-fw fa-lg text-danger"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                } ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modifier un utilisateur</h4>
            </div>
            <form action="/advisor/UpdateUser" method="post">
                <div class="modal-body">
                    <input hidden id="modifyID" name="userID">
                    <label>Nom:</label><input id="modifyName" name="name">
                    <label>Nom d'utilisateur:</label><input id="modifyUser" name="user">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="modify"
                            formaction="/advisor/UpdateUser" formmethod="post" value="Modifier"/>

                    <button type="button" class="btn btn-danger" name="modify" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="modal fade" id="myDelModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Supprimer un utilisateur</h4>
            </div>
            <form action="/advisor/DeleteUser" method="post">
                <div class="modal-body">
                    <input hidden id="deleteID" name="userID">
                    <label>Nom:&emsp;</label><span id="deleteName"></span>
                    <br/>
                    <label>Nom d'utilisateur:&emsp;</label><span id="deleteUser"></span>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="modify"
                           formaction="/advisor/DeleteUser" formmethod="post" value="Confimer"/>
                    <button type="button" class="btn btn-danger" name="modify" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="modal fade" id="myDelCieModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Supprimer une compagnie</h4>
            </div>
            <form action="/advisor/DeleteUser" method="post">
                <div class="modal-body">
                    <input hidden id="deleteCieID" name="cieID">
                    <label>Nom:&emsp;</label><span id="deleteCieName"></span>
                    <br/>
                    <label>Nom d'utilisateur:&emsp;</label><span id="deleteCieUser"></span>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="modify"
                           formaction="/advisor/DenyBusiness" formmethod="post" value="Confimer"/>
                    <button type="button" class="btn btn-danger" name="modify" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        $("#myBtn").click(function () {
            $("#myModal").modal("show");
        });
    });

    function modify(ID) {
        var tdName = document.getElementById("name" + ID.toString());
        var tdUser = document.getElementById("user" + ID.toString());

        var name = tdName.innerHTML;
        var user = tdUser.innerHTML;

        var txtModID = document.getElementById("modifyID");
        txtModID.value = ID;

        var txtModName = document.getElementById("modifyName");
        txtModName.setAttribute("placeholder", name);
        txtModName.value = name;

        var txtModUser = document.getElementById("modifyUser");
        txtModUser.setAttribute("placeholder", user);
        txtModUser.value = user;

        $("#myModal").modal();
    }

    function deleteUser(ID)
    {
        var tdName = document.getElementById("name" + ID.toString());
        var tdUser = document.getElementById("user" + ID.toString());

        var name = tdName.innerHTML;
        var user = tdUser.innerHTML;

        document.getElementById("deleteID").value = ID;
        var spanName = document.getElementById("deleteName");
        var spanUser = document.getElementById("deleteUser");

        spanName.innerHTML = name;
        spanUser.innerHTML = user;

        $("#myDelModal").modal();
    }
	
    function deleteCie(ID)
    {
        var tdName = document.getElementById("name" + ID.toString());
        var tdUser = document.getElementById("user" + ID.toString());

        var name = tdName.innerHTML;
        var user = tdUser.innerHTML;

        document.getElementById("deleteCieID").value = ID;
        var spanName = document.getElementById("deleteCieName");
        var spanUser = document.getElementById("deleteCieUser");

        spanName.innerHTML = name;
        spanUser.innerHTML = user;

        $("#myDelCieModal").modal();
    }
</script>