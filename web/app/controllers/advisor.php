<?php

if (isset($_COOKIE['token']) && isset($_SESSION['ID']) && isset($_SESSION["role"]) && $_SESSION["role"] == 2) {

    class advisor extends Controller {

        public function __construct() {
            parent::model("models");
        }

        //Fonction appeler par défaut
        public function index() {
            parent::view("shared/header");
            parent::view("advisor/menu");
            parent::view("advisor/index");
            parent::view("shared/footer");
        }

        //appelle la page pour des projets et entreprises non validée
        public function inactive() {
            parent::view("shared/header");
            parent::view("advisor/menu");

            parent::model("models");
            parent::model("projects");
            $projects = new projects();
            $data["projects"] = $projects->ShowProjects(false);

            parent::model("business");
            $cie = new business();
            $data["cie"] = $cie->ShowCie(false);

            parent::view("advisor/inactive", $data);
            parent::view("shared/footer");
        }

        //appelle la page pour afficher tous les projets
        public function projects() {
            parent::view("shared/header");
            parent::view("advisor/menu");



            parent::view("shared/footer");
        }

        //valide une entreprise
        public function ValidateBusiness() {
            parent::model("models");
            parent::model("business");
            $cie = new business();

            $cie->ValidateEntreprise($_POST["id"]);
        }

        //valide un projet
        public function ValidateProjects() {
            parent::model("models");
            parent::model("projects");
            $projects = new projects();

            $projects->ValidateProjects($_POST["id"]);
        }

        //supprime un projet
        public function DeleteProject() {
            parent::model("models");
            parent::model("projects");
            $projects = new projects();

            $projects->DeleteProject($_POST["id"]);
        }

        //ajoute un compte dans la bd
        public function CreateUser() {
            parent::model("models");
            parent::model("accounts");
            $account = new accounts();

            $account->CreateUser($_POST["name"], $_POST["user"], $_POST["pw"], $_POST["rank"]);
        }

        //affiche tous les comptes
        public function ShowUsers() {
            parent::model("models");
            parent::model("accounts");
            $account = new accounts();
            /*             * *** à changer ***** */
            $result = $account->ShowUsers();
        }

        //supprime un compte
        public function DeleteUser() {
            parent::model("models");
            parent::model("accounts");
            $account = new accounts();

            $account->DeleteUser($_POST["id"]);
        }

        //update les infos d'un compte
        public function UpdateUser() {
            parent::model("models");
            parent::model("accounts");
            $account = new accounts();

            $account->UpdateUser($_POST["id"], $_POST["name"], $_POST["user"], $_POST["rank"]);
        }

        //update le mot de passe d'un compte
        public function UpdatePw() {
            parent::model("models");
            parent::model("accounts");
            $account = new accounts();

            $account->UpdatePw($_POST["id"], $_POST["pw"]);
        }

        //change ses infos
        public function UpdateMyInfo() {
            parent::model("models");
            parent::model("accounts");
            $account = new accounts();

            $account->UpdateMyInfo($_COOKIE["token"], $_POST["name"], $_POST["user"]);
        }

        //change son mot de passe
        public function UpdateMyPw() {
            parent::model("models");
            parent::model("accounts");
            $account = new accounts();

            $account->UpdateMyPw($_COOKIE["token"], $_POST["pw"]);
        }

        //montre ses infos
        public function ShowMyInfo() {
            /*             * *** à changer **** */
            parent::model("models");
            parent::model("accounts");
            $account = new accounts();

            $result = $account->ShowMyInfo($_COOKIE["token"]);
        }

        //affiche les notes misent par les étudiants
        public function ShowInternsRatings() {

            /*             * *** à changer **** */
            parent::model("ratings");
            $ratings = new ratings();

            $result = $ratings->ShowInternsRatings();
        }

        //jumelle un stagiaire à un projet
        public function PairInternProject() {
            parent::model("models");
            parent::model("projects");
            $projects = new projects();

            $projects->PairInternProject($_POST["internId"], $_POST["projectId"]);
        }

        //affiche tous les stagiaires
        public function ShowInterns() {
            /*             * **** à changer **** */

            parent::model("models");
            parent::model("interns");
            $interns = new interns();

            $result = $interns->ShowInterns();
        }

        //affiche les évaluations d'un étudiant
        public function ShowEval() {
            /*             * ***** à changer ***** */
            parent::model("models");
            parent::model("interns");
            $interns = new interns();

            $result = $interns->ShowEval($_POST["id"]);
        }

        //met à jour l'évaluation d'un stagiaire
        public function UpdateEval() {
            parent::model("models");
            parent::model("interns");
            $interns = new interns();

            $interns->UpdateEval($_POST["id"]);
        }

        //Fonction permettant de récupérer le rapport d'entrevu
        /* public function LoadReport($IDTrainer){

          //Tante de trouver le fichier Xml
          try {
          $Xml = simplexml_load_file(parent::DefaultXMLPath.'rapport/'. $IDTrainer."_RPT.xml");

          //Récupère la date passer en paramètre pour l'utiliser comme balise pour le XML
          $DateLog = strToTime($Date);
          $DateLog = date("d-M-Y", $DateLog);

          $Tag = $Xml->createElement($DateLog, $Data);
          $Xml->appendChild($Tag);
          $Xml->saveXML();
          }
          catch{ //Si le fichier n'est pas trouver, en créer un nouveau
          $Xml = new domxml_new_doc('1.0');
          $Xml->save($DefaultXMLPath.'/rapport/'.$IDTrainer."_RPT.xml");
          }
          }

          //Fonction permettant de récupérer le rapport d'entrevuprotected $DefaultXMLPath = '../app/models/xml/';
          public function LoadEvaluation($IDTrainer){

          //Tante de trouver le fichier Xml
          try {
          $Xml = simplexml_load_file(parent::DefaultXMLPath.'evaluation/'. $IDTrainer."_EVL.xml");

          //Récupère la date passer en paramètre pour l'utiliser comme balise pour le XML
          $DateLog = strToTime($Date);
          $DateLog = date("d-M-Y", $DateLog);

          $Tag = $Xml->createElement($DateLog, $Data);
          $Xml->appendChild($Tag);
          $Xml->saveXML();
          }
          catch{ //Si le fichier n'est pas trouver, en créer un nouveau
          $Xml = new domxml_new_doc('1.0');
          $Xml->save($DefaultXMLPath.'/evaluation/'.$IDTrainer."_EVL.xml");
          }
          } */
    }

} else {
    //Redirige vers l'acceuil.
    session_unset();
    session_destroy();
    header("location: " . $_SERVER['SERVER_ADDR']);
}
?>