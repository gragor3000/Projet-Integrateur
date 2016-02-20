<?php

if (isset($_COOKIE['token']) && isset($_SESSION['ID']) && isset($_SESSION["role"]) && $_SESSION["role"] == 0) {

    class advisor extends Controller
    {

        public function __construct()
        {
            parent::model("models");
        }

        //appelle la page d'accueil qui as projets et entreprises non validée
        public function index()
        {
            parent::view("shared/header");
            parent::view("advisor/menu");

            parent::model("projects");
            $projects = new projects();
            $data['projects'] = $projects->ShowProjectByStatus(0);

            parent::model("business");
            $model = new business;

			//S'il y a des projets à afficher, récupérer l'information de leur compagnie
			if($data['projects'] != null){
				foreach ($data['projects'] as $project) {
					//Obtenir les informations de l'entreprise.
					$data['cieP'][$project->businessID] = $model->ShowCieByID($project->businessID);
				}
			}

            parent::model("business");
            $cie = new business();
            $data['cie'] = $cie->ShowCieByStatus(0);

            parent::view("advisor/index", $data);
            parent::view("shared/footer");
        }

        //appelle la page pour afficher tous les projets validés
        public function projects()
        {
            parent::view("shared/header");
            parent::view("advisor/menu");

            parent::model("projects");

            $projects = new projects();
            $data['projects'] = $projects->ShowProjectByStatus(1);
			
			//Récupère les informations des compagnies reliées aux projets accepté
			parent::model("business");
            $model = new business;
			if($data['projects'] != null){
				foreach ($data['projects'] as $project) {
					//Obtenir les informations de l'entreprise.
					$data['cieP'][$project->businessID] = $model->ShowCieByID($project->businessID);
				}
			}

            parent::view("advisor/projects", $data);
            parent::view("shared/footer");
        }
		
		//appelle la page pour afficher tous les projets validés
        public function cie()
        {
            parent::view("shared/header");
            parent::view("advisor/menu");

            parent::model("business");
            $model = new business();
            $data["cie"] = $model->ShowCieByStatus(1);

            parent::view("advisor/business", $data);
            parent::view("shared/footer");
        }

        //valide une entreprise
        public function ValidateBusiness($_CieID)
        {
            parent::model("business");

            $cie = new business();
            $cie->AuthCie($_CieID[0]);
			
			index();
        }

        //refuse une entreprise
        public function DenyBusiness($_CieID)
        {
            parent::model("business");

            $cie = new business();
            $cie->DenyCie($_CieID[0]);
			
			index();
        }

        //valide un projet
        public function ValidateProject($_ProjID)
        {
            parent::model("projects");

            $projects = new projects();
            $projects->ValidateProject($_ProjID[0]);
			
			index();
        }

        //refuse un projet
        public function DenyProject($_ProjID)
        {
            parent::model("projects");

            $projects = new projects();
            $projects->DenyProject($_ProjID[0]);
			
			index();
        }

        //ajoute un compte dans la bd
        public function CreateUser()
        {
            parent::model("accounts");

            $account = new accounts();
            $account->CreateUser($_POST["name"], $_POST["user"], $_POST["pw"], $_POST["rank"]);
        }

        //affiche tous les comptes
        public function ShowUsers()
        {
            parent::model("accounts");

            $account = new accounts();
            $data["users"] = $account->ShowAllUsers();

			//Affiche tout les éléments de la page
			parent::view("shared/header");
            parent::view("advisor/menu");
            parent::view("advisor/account", $data);
            parent::view("shared/footer");
        }

        //supprime un compte
        public function DeleteUser()
        {
            parent::model("accounts");

            $account = new accounts();
            $account->DeleteUser($_POST["userID"]);
        }

		//Modifier mot de passe.
        public function pass() {
			
			$data = array();

            //Modification du mot de passe.
            if (isset($_POST['editPass']) && $_POST['editPass'] == $_SESSION['form_token'] && $_SESSION['form_timer'] + 300 > time()) {
                parent::model('accounts');
                $model = new accounts();
                try {
                    $model->UpdatePw($_SESSION['ID'], $_POST['password']);
					$data['alert'] = "success";
                    $data['message'] = "Le mot de passe a été changé.";
                } catch (exception $ex) {
					$data['alert'] = "warning";
                    $data['message'] = "Le changement a échoué.";
                }
            }
			
			parent::view("shared/header");
            parent::view("advisor/menu");
            parent::view('advisor/pass', $data);
            parent::view('shared/footer');
        }
		
        //update les infos d'un compte
        public function UpdateUser()
        {
			parent::view("shared/header");
            parent::view("advisor/menu");
			
			//Modification du mot de passe.
            if (isset($_POST['updateUser']) && $_POST['updateUser'] == $_SESSION['form_token'] && $_SESSION['form_timer'] + 300 > time()) {
                parent::model('accounts');
                $model = new accounts();
                try {
                    $account->UpdateUser($_POST["userID"], $_POST["name"], $_POST["user"], $_POST["rank"]);
					$data['alert'] = "success";
                    $data['message'] = "Les nouvelles informations ont été enregistrées.";
                } catch (exception $ex) {
					$data['alert'] = "warning";
                    $data['message'] = "Le(s) changement(s) a(ont) échoué(s).";
                }
            }
            parent::view('advisor/updateAccount', $data);
            parent::view('shared/footer');			
        }

        //update le mot de passe d'un compte
        public function UpdatePw()
        {
            parent::model("accounts");

            $account = new accounts();
            $account->UpdatePw($_POST["userID"], $_POST["pw"]);
        }

        //montre ses infos
        public function ShowMyInfo()
        {
            parent::model("accounts");

            $account = new accounts();
            $data["info"] = $account->ShowUserByToken($_COOKIE["token"]);

            parent::view("advisor/info", $data);
            parent::view("shared/footer");
        }

        //affiche les notes misent par les étudiants
        public function ShowInternsRatings()
        {
            parent::model("ratings");

            $ratings = new ratings();

            $data["ratings"] = $ratings->ShowInternsRatings();

            parent::view("advisor/ratings", $data);
            parent::view("shared/footer");
        }

        //jumelle un stagiaire à un projet
        public function PairInternProject()
        {
            parent::model("projects");
            $projects = new projects();

            $projects->PairInternProject($_POST["internID"], $_POST["projectID"]);
        }

        //affiche tous les stagiaires
        public function ShowInterns()
        {
            parent::model("interns");

            $interns = new interns();
            $data["interns"] = $interns->ShowInterns();

            parent::view("advisor/interns", $data);
            parent::view("shared/footer");
        }

        //affiche les évaluations d'un étudiant
        public function review($_review)
        {
            parent::model("interns");

            $interns = new interns();
								   
            if($_review != "logbook")$data["review"] = $interns->review($_POST["internID"],$_review); 
            else $data["review"] = $interns->logbook($_POST["internID"]); 		 

            //parent::view("advisor/Evals", $data);
            parent::view("shared/footer");
        }

        //met à jour l'évaluation d'un stagiaire
        public function UpdateEval()
        {
            parent::model("interns");

            $interns = new interns();
            $interns->UpdateEval($_POST["EvalID"]);
        }
    }

} else {
    //Redirige vers l'acceuil.
    session_unset();
    session_destroy();
    header("location:/home/index");
}

?>