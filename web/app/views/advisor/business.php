<?php
	//Générer un token d'identification.
	$token = md5(uniqid(rand(), TRUE));
	$_SESSION['form_token'] = $token;
	$_SESSION['form_timer'] = time();
?>
<script>
    //Active les popovers.
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover(); 
    });
</script>
    
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
                <h1>Listes des entreprises acceptées</h1>
                <p>Sur cette page vous trouverez les informations concernant les entreprises acceptées dans le système.</p>
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
                        <h3 class="panel-title">Entreprises acceptées</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nom de l'entreprise</th>
                                    <th>Adresse</th>
                                    <th>Ville</th>
                                    <th width="200px">Nom d'utilisateur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($data['cie'])) {
                                    foreach ($data['cie'] as $cie) { ?>
                            <form>
                                <tr id="business<?= $cie->id ?>">
                                    <td><a href="#" title="Contact:" data-html="true" data-toggle="popover" data-trigger="hover" data-content="Tel: <?= $cie->tel; ?><br />Email : <?= $cie->email; ?>"><?= $cie->name; ?></a></td>
                                    <td><?= $cie->address; ?></td>
                                    <td><?= $cie->city; ?></td>
                                    <td><?= $cie->user; ?></td>
                                    <td class="text-center">
                                </tr>
                            </form>
                                    <?php }} else { ?>
                            <td colspan="6">Aucune entreprise a été acceptée.</td>
                                <?php } ?>
                            </tbody>
                        </table>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

