<html>

<head>
    <meta name="description"
          content="Ce site a pour objectif de permettre aux entreprises de soumettre des projets de stage à destination des étudiants en technique informatique et à ceux-ci de soumettre leur journal de bord. Il permet aussi aux coordonnateurs de gerer les comptes d'accès et de soumettre des documents d'évaluation.">
    <title>CEGEP de Joliette | 420.AA | Gesion de Stage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
          rel="stylesheet" type="text/css">
    <link href="../../../public/css/default.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="col-md-12 alert <?= $data['alert']; ?>" style="position:fixed;z-index:999">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <!--?=$ data[ 'message']; ?-->
</div>
<!--?php } ?-->
<div class="section section-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Département de la Technique de l'Informatique</h1>

                <p>vous acceuille sur son site de gestion de stage. Sur ce site une entreprise
                    peut soumettre un projet de stage qui sera étudié par les coordonnateurs
                    de stage. Ceux-ci évaluront les stages qui pourront être choisi par les
                    finissants de la technique. Avant tout chose, l'entreprise qui n'a pas
                    de compte devra s'inscrire en utilisant le formulaire ci-dessous et être
                    autorisé à soumettre un projet. Un fois autorisé celui-ci recevera un courriel
                    contenant un nom d'utilisateur si la suggestion n'est pas retenue et un
                    mot de passe.</p>
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
                        <h3 class="panel-title">Liste des étudiants</h3>
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
                                <?php if (isset($data['users'])) {
                                    foreach ($data['users'] as $user) {
                                        if ($user->Role == 2) {
                                            ?>
                                            <tr>
                                                <td id="name<?= $user->ID; ?>"><?= $user->name; ?></td>
                                                <td id="user<?= $user->ID; ?>"><?= $user->user; ?></td>
                                                <td class="text-center">
                                                    <!-- TODO:// changer les appels pour modifier et supprimer -->
                                                    <button id="btnModIntern<?= $user->ID; ?>" class="btn btn-link"
                                                            name="modifyUser" value="<?= $_SESSION['form_token']; ?>"
                                                            onclick="modify(<?= $user->ID ?>)">
                                                        <i class="-circle fa fa-fw fa-lg fa-pencil-square text-success"></i>
                                                    </button>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-link" name="deleteUser"
                                                            value="<?= $_SESSION['form_token']; ?>"
                                                            formaction="DeleteUser/&lt;?= $user-&gt;ID ?&gt;"
                                                            formmethod="post">
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
                                <?php if (isset($data['users'])) {
                                    foreach ($data['users'] as $user) {
                                        if ($user->Role == 1) {
                                            ?>
                                            <tr>
                                                <td><?= $user->name; ?></td>
                                                <td><?= $user->user; ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-link" name="denyProject"
                                                            value="<?= $_SESSION['form_token']; ?>"
                                                            onclick="modify(<?= $user->ID ?>)">
                                                        <i class="-circle fa fa-fw fa-lg fa-pencil-square text-success"></i>
                                                    </button>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-link" name="deleteUser"
                                                            value="<?= $_SESSION['form_token']; ?>"
                                                            formaction="DeleteUser/&lt;?= $user-&gt;ID ?&gt;"
                                                            formmethod="post">
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
                                <?php if (isset($data['users'])) {
                                    foreach ($data['users'] as $user) {
                                        if ($user->Role == 0) {
                                            ?>
                                            <tr>
                                                <td><?= $user->name; ?></td>
                                                <td><?= $user->user; ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-link" name="denyProject"
                                                            value="<?= $_SESSION['form_token']; ?>"
                                                            onclick="modify(<?= $user->ID ?>)">
                                                        <i class="-circle fa fa-fw fa-lg fa-pencil-square text-success"></i>
                                                    </button>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-link" name="deleteUser"
                                                            value="<?= $_SESSION['form_token']; ?>"
                                                            formaction="DeleteUser/&lt;?= $user-&gt;ID ?&gt;"
                                                            formmethod="post">
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

<!-- boutons pour tester le modal -->
<button type="button" class="btn btn-info btn-lg" id="myBtn">Open Modal</button>
<button type="button" class="btn btn-info btn-lg" id="myBtn" onclick="modify(1)">Open Modal</button>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modifier utilisateur</h4>
            </div>
            <form>
                <div class="modal-body">
                    <input hidden id="modifyID" name="ID">
                    <label>Nom:</label><input id="modifyName" name="name">
                    <label>Nom d'utilisateur:</label><input id="modifyUser" name="user">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" name="modify" data-dismiss="modal"
                            formaction="UpdateUser/&lt;" formmethod="post">Modifier
                    </button>
                    <button type="button" class="btn btn-danger" name="modify" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    $(document).ready(function () {
        $("#myBtn").click(function () {
            $("#myModal").modal();
        });
    });

    function modify(ID) {
        var txtName = document.getElementById("name" + ID.toString());
        var txtUser = document.getElementById("user" + ID.toString());

        var name = tdName.innerHTML;
        var user = tdName.innerHTML;

        var txtModID = document.getElementById("modifyID");
        txtModID.setAttribute("name", ID.toString());

        var txtModName = document.getElementById("modifyName");
        txtModName.setAttribute("placeholder", name);

        var txtModUser = document.getElementById("modifyUser");
        txtModUser.setAttribute("placeholder", user);

        $("#myModal").modal();
    }
</script>

</body>
</html>