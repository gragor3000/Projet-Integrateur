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
                    <h1>Listes des entreprises et des projets de stage</h1>
                    <p>Sur cette page vous trouverez les informations concernant les entreprises à valider et aussi les projets de stage en attente de validation.</p>
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
                            <h3 class="panel-title">Validation d'entreprises</h3>
                        </div>
                        <div class="panel-body">
                            <form>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Ville</th>
                                        <th>Adresse</th>
                                        <th>Téléphone</th>
                                        <th>E-mail</th>
                                        <th>Validation</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($data['cie'])) {
                                        foreach ($data['cie'] as $cie) { ?>
                                            <tr id="business<?= $cie->id ?>">
                                                <td><?= $cie->name; ?></td>
                                                <td><?= $cie->city; ?></td>
                                                <td><?= $cie->address; ?></td>
                                                <td><?= $cie->tel; ?></td>
                                                <td><?= $cie->email; ?></td>
                                                <td>
                                                    <button class="btn btn-link" formaction="advisor/ValidateBusiness" formmethod="post">
                                                        <i class="fa fa-check-circle fa-fw fa-lg text-primary"></i>
                                                    </button>
                                                    <button class="btn btn-link" formaction="advisor/DenyBusiness" formmethod="post">
                                                        <i class="-circle fa fa-fw fa-lg fa-times-circle text-danger"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php }
                                    }else
                                        {
                                            ?>
                                            <td colspan="6">Aucune entreprise à valider</td>
                                        <?php
                                    } ?>
                                    </tbody>
                                </table>
                            </form>
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
                                <h3 class="panel-title">Validation de projets</h3>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Titre</th>
                                            <th>Entreprise</th>
                                            <th>Nom superviseur</th>
                                            <th>Poste</th>
                                            <th>Telephone</th>
                                            <th>E-mail</th>
                                            <th>Validation</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (isset($data['projects'])) {
                                            foreach ($data['projects'] as $project) { ?>
                                                <tr id="project<?= $project->id ?>">
                                                    <td>
                                                        <button class="btn btn-link">
                                                            <i class="fa fa-3x fa-caret-down fa-fw fa-rotate-270"></i>
                                                        </button>
                                                    </td>
                                                    <td><?= $project->title; ?></td>
                                                    <td><?= $project->name; ?></td>
                                                    <td><?= $project->supName; ?></td>
                                                    <td><?= $project->supTitle; ?></td>
                                                    <td><?= $project->supTel; ?></td>
                                                    <td><?= $project->supEmail; ?></td>
                                                    <td>
                                                        <button class="btn btn-link" formaction="advisor/ValidateProject" formmethod="post">
                                                            <i class="fa fa-check-circle fa-fw fa-lg text-primary"></i>
                                                        </button>
                                                        <button class="btn btn-link" formaction="advisor/DenyProject" formmethod="post">
                                                            <i class="-circle fa fa-fw fa-lg fa-times-circle text-danger"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr id="project<?= $project->id ?>" class="collapse">
                                                    <div>
                                                        <p>
                                                            <b>Description: </b>
                                                            <?= $project->descr; ?>
                                                        </p>
                                                        <p>
                                                            <b>Equipement: </b>
                                                            <?= $project->equip; ?>
                                                        </p>
                                                        <p>
                                                            <b>Exigence: </b>
                                                            <?= $project->extra; ?>
                                                        </p>
                                                        <p>
                                                            <b>Information supplémentaire: </b>
                                                            <?= $project->info; ?>
                                                        </p>
                                                    </div>
                                                </tr>
                                            <?php }
                                        }else
                                            {
                                                ?>
                                                <td colspan="6">Aucun projet à valider</td>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>