<?php
/*
 * 2016-02-19 : COMPLÉTÉ
 */
?>
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
                <h1>Assignation des stages</h1>
                <p>Sur cette page vous pourrez visualiser les évaluations des stages par les stagiaires et assigner ceuxi-ci selon votre choix.</p>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <table class="table table-condensed table-hover">
            <thead>
                <th>Projet de stage</th>
                <th class="text-center" width="25px">NULL</th>
                <?php foreach($data['interns'] as $intern){ ?>
                <th class="text-center"><?= $intern->name; ?></th>
                <?php } ?>
            </thead>
            <tbody>
            <?php foreach($data['projects'] as $project){ ?>
                <tr>
                    <td><?= $project->title; ?></td>
                    <td class="text-center">
                        <input type="radio" name="<?= $project->ID; ?>" value="-1" checked />
                    </td>
                    <?php foreach($data['interns'] as $intern){ ?>
                    <td class="text-center">
                        <?= (isset($data['ratings'][$project->ID][$intern->ID])) ? $data['ratings'][$project->ID][$intern->ID] : "N/D"; ?> <i class="fa fa-fw fa-star text-success"></i>
                        <input type="radio" name="<?= $project->ID; ?>" value="<?= $intern->ID; ?>" <?= ($project->internID == $intern->ID) ? 'checked' : ''; ?> />
                    </td>
                    <?php } ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <button class="btn btn-primary btn-block" name="setAssign" value="<?= $_SESSION['form_token']; ?>" type="submit" formaction="/advisor/PairInternProject" formmethod="post">Assigner</button>
            </div>
        </div>
    </div>
</div>