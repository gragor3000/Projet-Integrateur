<?php

/*
  2016-02-09 Marc Lauzon
  À FAIRE
  - Soumission d'entrevue.
  - Soumission d'évaluation.
  - Soumission de MaJ d'info.
 */

//Validation de l'identité.
if (isset($_COOKIE['token']) && isset($_SESSION['ID']) && isset($_SESSION["role"]) && $_SESSION["role"] == 1) {

    class cie extends Controller
    {

        public function __construct()
        {
            parent::model("models");
        }

        //Accueil par défaut.
        public function index()
        {
            parent::model("business");
            $model = new business;
            //Obtenir les informations de l'entreprise.
            $data['cie'] = $model->ShowCieByID($_SESSION['ID']);

            parent::model("projects");
            $model = new projects();
            //Obtenir les projets de l'entreprise.
            $data['projects'] = $model->ShowProjectsByCie($_SESSION['ID']);

            parent::model("accounts");
            $model = new accounts();
            //Déterminer l'assignation du projet.
            if (isset($data['projects'])) {
                foreach ($data['projects'] as $project) {
                    if (isset($project->internID) && $project->internID != null) {
                        $data['intern'][$project->ID] = $model->ShowUserByID($project->internID);
                    }
                }
            } else {
                header('location:/cie/submit');
            }

            //récupère les informations de la compagnie
            parent::model('business');
            $model = new business();
            $data['cie'] = $model->ShowCieByID($_SESSION['ID']);

            //Ouvre l'index du superviseur
            parent::view("shared/header");
            parent::view("cie/menu");
            parent::view('cie/index', $data);
            parent::view('shared/footer');
        }

        //Formulaire de soumission de projet.
        public function submit()
        {
            parent::model("business");
            $model = new business;
            //Obtenir les informations de l'entreprise.
            $data['cie'] = $model->ShowCieByID($_SESSION['ID']);

            //Soumission du projet.
            if (isset($_POST['sendProject'])/* && $_POST['sendProject'] == $_SESSION['form_token']*/) {
                if ($_SESSION['form_timer'] + 600 > time()) {
                    parent::model("projects");
                    $model = new projects();

                    try {
                        $model->CreateProject($_POST['title'], $_POST['supName'], $_POST['supTitle'], $_POST['supTel'], $_POST['supEmail'], $_POST['desc'], $_POST['equip'], $_POST['extra'], $_POST['info'], $_SESSION['ID']);
                        $data['alert'] = "alert-success";
                        $data['message'] = "Le projet a été soumis pour une validation.";
                    } catch (PDOexception $e) {
                        $data['alert'] = "alert-warning";
                        $data['message'] = $e;
                    }
                } else {
                    $data['alert'] = "alert-warning";
                    $data['message'] = "La permission du formulaire a expiré.";
                }
            }

            parent::view("shared/header");
            parent::view("cie/menu");
            parent::view('cie/submit', $data);
            parent::view('shared/footer');
        }

        //Modifier un projet.
        public function edit($_projectID)
        {
            parent::view("shared/header");
            parent::view("cie/menu");

            parent::model("business");
            $model = new business;
            //Obtenir les informations de l'entreprise.
            $data['cie'] = $model->ShowCieByID($_SESSION['ID']);

            //Obtenir les informations du projet.
            parent::model("projects");
            $model = new projects();

            //Modification du projet.
            if (isset($_POST['editProject']) /*&& $_POST['editProject'] == $_SESSION['form_token']*/ && $_SESSION['form_timer'] + 600 > time()) {
                try {
                    $model->UpdateProject(intval($_projectID[0]), $_POST['title'], $_POST['supName'], $_POST['supTitle'], $_POST['supTel'], $_POST['supEmail'], $_POST['desc'], $_POST['equip'], $_POST['extra'], $_POST['info']);
                    $data['alert'] = "alert-success";
                    $data['message'] = "Le projet a été mis à jour.";
                } catch (exception $ex) {
                    $data['alert'] = "alert-danger";
                    $data['message'] = "Le changement a échoué.";
                }
            }

            //Obtenir les informations du projet.
            $data['project'] = $model->ShowProjectByID(intval($_projectID[0]));

            if ($data['project']->status == '0' && $data['project']->businessID == $_SESSION['ID']) {
                parent::view('cie/edit', $data);
            } else {
                $data['alert'] = "alert-warning";
                $data['message'] = "Vous n'avez pas l'autorisation de modifier ce projet.";
                parent::view('cie/index', $data);
            }

            parent::view('shared/footer');
        }

        //Supprimer un projet.
        public function delete($_projectID)
        {
            if (isset($_POST['delProject']) /*&& $_POST['delProject'] == $_SESSION['form_token']*/ && $_SESSION['form_timer'] + 3000 > time()) {

                parent::model('projects');
                $projects = new projects();
                //Obtenir les informations du projet.
                $project = $projects->ShowProjectByID($_projectID[0]);

                parent::model('business');
                $business = new business();
                //Obtenir les informations de l'entreprise.
                $cie = $business->ShowCieByID($project->businessID);

                //Si cie propriétaire du projet.
                if ($business->userID == $_SESSION['ID']) {#
                    $projects->DeleteProject($_projectID[0]);
                }

            }

            //Retour à l'index.
            $this->index();
        }

        //Modifier mot de passe.
        public function pass()
        {

            $data = NULL;

            //Modification du mot de passe.
            if (isset($_POST['editPass']) /*&& $_POST['editPass'] == $_SESSION['form_token']*/) {
                if ($_SESSION['form_timer'] + 600 > time()) {
                    parent::model('accounts');
                    $model = new accounts();
                    try {
                        $model->UpdatePw($_SESSION['ID'], $_POST['password']);
                        $data['alert'] = "alert-success";
                        $data['message'] = "Le mot de passe a été changé.";
                    } catch (exception $ex) {
                        $data['alert'] = "alert-warning";
                        $data['message'] = "Le changement a échoué.";
                    }
                } else {
                    $data['alert'] = "alert-warning";
                    $data['message'] = "La permission du formulaire a expiré.";
                }
            }

            parent::view("shared/header");
            parent::view("cie/menu");
            parent::view('cie/pass', $data);
            parent::view('shared/footer');
        }

        //Formulaire de mise à jour d'information.
        public function info()
        {
            parent::view("shared/header");
            parent::view("cie/menu");

            //Crée un lien avec le modèle business
            parent::model("business");
            $model = new business();

            //Modification des informations d'une entreprise.
            if (isset($_POST['editCie']) /*&& $_POST['editCie'] == $_SESSION['form_token']*/ && $_SESSION['form_timer'] + 300 > time()) {
                try {
                    $model->UpdateBusiness($_SESSION['ID'], $_POST['address'], $_POST['city'], $_POST['tel'], $_POST['email']);
                    $data['alert'] = "alert-success";
                    $data['message'] = "Les informations ont été changées.";
                } catch (Exception $e) {
                    $data['alert'] = "alert-warning";
                    $data['message'] = "Les changements ont échoués.";
                }
            }

            //récupère les informations de la compagnie
            $data['cie'] = $model->ShowCieByID($_SESSION['ID']);

            //vues associées aux mises à jour????
            parent::view('cie/info', $data);
            parent::view('shared/footer');
        }

        //Formulaire d'entrevue de stagiaire.
        public function interview($_internID)
        {
            parent::view("shared/header");
            parent::view("cie/menu");

            parent::model("docs");
            $model1 = new docs();

            parent::model("accounts");
            $model2 = new accounts();

            var_dump($_POST);

            //Vérifié l'existence d'une entrevue entre l'entreprise et le stagiaire.

            $data['readOnly'] = (Count($_internID) > 0) ? $model1->ReadOnlyCie($_internID, 'interview') : false;

            if (!$data['readOnly']) {   //Si le formulaire n'existe pas

                var_dump($data['readOnly']);

                echo("doit lire");/////////////////////////////////////////////3
                //Enregistrer l'entrevue.
                if (isset($_POST['sendInterview']) /*&& $_POST['sendInterview'] == $_SESSION['form_token']*/ && $_SESSION['form_timer'] + 1200 > time()) {

                    echo("peut envoyé");////////////////////////////////////3
                    try {
                        $model->SaveCie($_SESSION['ID'], $_POST['intern'], $_POST['docName'], $_POST['intTimestamp'], $_POST['intDept'], $_POST['intPosition'], $_POST['communication'], $_POST['enthusiams'], $_POST['selfesteem'], $_POST['appearance'], $_POST['answers'], $_POST['comments'], $_POST['interviewer']);
                        $data['alert'] = "alert-success";
                        $data['message'] = "L'entrevue a été sauvegardée avec succès.";
                    } catch (exception $ex) {
                        $data['alert'] = "alert-warning";
                        $data['message'] = "L'entrevue n'a pas pu être enregistrée.";
                    }
                } else { //Voir formulaire vierge
                    $data['interns'] = $model2->ShowUsersByRank(2);
                }
            } else {   //si le formulaire existe

                echo("existe");///////////////////////////////////////////3

                $data['interview'] = $model1->LoadCie($_internID, 'interview');

                //Si les id sont les mêmes, afficher le formulaire d'évaluation
                if ($data['interview']->cieId == $_SESSION['ID']) {
                    $data['interns'] = $model2->ShowUsersByRank(2);
                } else {
                    $data['alert'] = "alert-warning";
                    $data['message'] = "Il vous est interdit de visualiser ce formulaire.";
                }
            }

            parent::view("cie/interview", $data);
            parent::view("shared/footer");
        }

        //Formulaire d'évaluation de stage.
        public function review($_projectID)
        {
            parent::view("shared/header");
            parent::view("cie/menu");

            parent::model("docs");
            $model1 = new docs();

            //Vérifier l'existence d'une évaluation de stage
            $data['readOnly'] = $model1->ReadOnlyCie($_projectID, 'cieReview');

            parent::model("projects");
            $model2 = new projects();

            $data['title'] = $model2->ShowProjectByID($_projectID)->title;
            $internId = $model2->ShowProjectByID($_projectID)->internID;
            $data['date'] = date();

            parent::model("accounts");
            $model3 = new accounts();
            $data['intern'] = $model3->ShowUserByID($internId)->name;


            if ($data['readOnly']) { //si le formulaire existe
                $data['review'] = $model->LoadCie($_projectID);

                //Si les id sont les mêmes, afficher le formulaire d'évaluation
                if ($data['review']->cieId == $_SESSION['ID']) {
                    parent::view("cie/review", $data);
                } else {
                    $data['alert'] = "alert-warning";
                    $data['message'] = "Il vous est interdit de visualiser ce formulaire.";
                    parent::view("cie/index", $data);
                }
            } else { //si le formulaire n'existe pas
                //Enregistrer le formulaire d'évaluation.

                if (isset($_POST['sendReview']) /*&& $_POST['sendReview'] == $_SESSION['form_token']*/ && $_SESSION['form_timer'] + 1200 > time()) {
                    try {
                        $model->SaveCie($_POST['internId'], $_POST['docName'], $_POST['cieRev111'], $_POST['cieRev112'], $_POST['cieRev113'], $_POST['cieRev1'], $_POST['cieRev211'], $_POST['cieRev221'], $_POST['cieRev222'], $_POST['cieRev231'], $_POST['cieRev232'], $_POST['cieRev2'], $_POST['cieRev311'], $_POST['cieRev312'], $_POST['cieRev313'], $_POST['cieRev321'], $_POST['cieRev331'], $_POST['cieRev332'], $_POST['cieRev341'], $_POST['cieRev342'], $_POST['cieRev351'], $_POST['cieRev352'], $_POST['cieRev3'], $_POST['cieRevBest'], $_POST['cieRevLess'], $_POST['cieRevOther'], $_POST['cieRevLike'], $_POST['cieRevAgain'], $_POST['cieRevSame']);
                        $data['alert'] = "alert-success";
                        $data['message'] = "L'évaluation a été sauvegardée avec succès.";
                    } catch (Exception $e) {
                        $data['alert'] = "alert-warning";
                        $data['message'] = "L'évaluation n'a pas pu être enregistrée.";
                    }
                    parent::view("cie/index", $data);
                } else { //Voir formulaire vierge
                    parent::view("cie/review", $data);
                }
            }

            parent::view("shared/footer");
        }
    }


} else {
    //Rediriger vers l'acceuil.
    session_unset();
    session_destroy();
    header("location:/home/index");
}
?>