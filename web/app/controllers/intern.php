<?php

/*
  2016-02-09 Marc Lauzon
  À FAIRE
  - Soumission de journal de bord.
  - Visualisation des évaluations.
 */


//Validation de l'identité.
if (isset($_COOKIE['token']) && isset($_SESSION['ID']) && isset($_SESSION["role"]) && $_SESSION["role"] == 0) {

    class intern extends Controller {

        public function __construct() {
            parent::model("models");
        }

        //Index par défaut.
        public function index() {
            parent::view("shared/header");
            parent::view("intern/menu");

            parent::model("projets");
            $model = new projets();
            //Obtenir le projet assigné.
            $data['project'] = $model->ShowProjectByIntern($_SESSION['ID']);

            //Sinon obtenir tous les projets.
            if ($data['project'] == null) {
                $data['projects'] = $model->ShowProjectByStatus(true);

                parent::model("business");
                $model = new business;

                foreach ($data['projects'] as $project) {
                    //Obtenir les informations de l'entreprise.
                    $data['cie'][$project->ID] = $model->ShowBusinessByID($project->businessID);
                }

                parent::view("intern/list", $data);
            } else {
                parent::model("business");
                $model = new business;
                //Obtenir les informations de l'entreprise.
                $data['cie'][$data['project']->ID] = $model->ShowBusinessByID($data['project']->businessID);

                parent::view("intern/index", $data);
            }

            parent::view("shared/footer");
        }

        //Modifier mot de passe.
        public function pass() {
            parent::view("shared/header");
            parent::view("intern/menu");

            //Modification du mot de passe.
            if (isset($_POST['editPass']) && $_POST['editPass'] == $_SESSION['form_token'] && $_SESSION['form_timer'] + 300 > time()) {
                parent::model('accounts');
                $model = new accounts();
                try {
                    $model->UpdatePw($_SESSION['ID'], $_POST['password']);
                    $data['message'] = "Le mot de passe a été changé.";
                } catch (exception $ex) {
                    $data['message'] = "Le changement a échoué.";
                }
            }
            parent::view('intern/pass', $data);
            parent::view('shared/footer');
        }

        //Visualiser les évaluations
        public function review() {
            //////////////// À FAIRE //////////////////
        }

        //Enregistre un log
        public function logbook() {
            //////////////// RETOURNER LE LOGBOOK & SAUVEGARDER //////////////////

            parent::model("modelXML");
            $_modelXML = new docs();

            if (isset($_POST["logText"])) {
                //Contient toutes les données à enregistrer
                $_Data = array();

                //Boucle pour ajouter tout les éléments du poste dans un tableau
                foreach ($_POST as $_Elem => $_Valeur) {
                    array_push($_Data, $_Valeur);
                }

                $_modelXML->SaveLog($_SESSION['ID'], $_POST["logText"], $_Data);
            }

            parent::view('intern/info');
            //////////////////////// À CORRIGER ////////////////////////
        }

    }

} else {
    //Rediriger vers l'acceuil.
    session_unset();
    session_destroy();
    header("location: " . $_SERVER['SERVER_ADDR']);
}
?>