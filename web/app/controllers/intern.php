<?php

/*
  2016-02-09 Marc Lauzon
  À FAIRE
  - Soumission de journal de bord.
  - Visualisation des évaluations.
 */


//Validation de l'identité.
if (isset($_COOKIE['token']) && isset($_SESSION['ID']) && isset($_SESSION["role"]) && $_SESSION["role"] == 2) {

    class intern extends Controller {

        public function __construct() {
            parent::model("models");
        }

        //Index par défaut.
        public function index($_Rating) {
            parent::view("shared/header");
            parent::view("intern/menu");   

			$data = array();
			
			//Si l'usager à envoyer une évaluation, l'enregistrer
			if(!empty($_Rating)){
				parent::model("ratings");
				$rating = new ratings();
				
				$rating->RatingProject($_SESSION['ID'], $_GET['id'], $_GET['rating']);
			}

            parent::model("projects");
            $model = new projects();
            //Obtenir le projet assigné.
            $data['project'] = $model->ShowProjectByIntern($_SESSION['ID']);

            //Sinon obtenir tous les projets.
            if ($data['project'] == null) {
                $data['projects'] = $model->ShowProjectByStatus(1);
				
                parent::model("business");
				$model = new business;
				parent::model("ratings");
				$rating = new ratings;

				foreach ($data['projects'] as $project) {
					//Obtenir les informations de l'entreprise.
					$data['cie'][$project->businessID] = $model->ShowCieByID($project->businessID);
					$data['ratings'][$project->businessID] = $rating->FindRateByID($_SESSION['ID'],$project->businessID);
				}

                parent::view("intern/list", $data);
            } else {
                parent::model("business");
                $model = new business;
                //Obtenir les informations de l'entreprise.
                $data['cie'][$data['project']->ID] = $model->ShowCieByID($data['project']->businessID);
				
				var_dump($data);

                parent::view("intern/index", $data);
            }

            parent::view("shared/footer");
        }

		 //Voir le menu des évaluations d'un stagiaire
		public function info()
		{
		   parent::view("shared/header");
		   parent::view("intern/menu");
		   parent::view("intern/info");
		   parent::view('shared/footer');		
		}
		
        //Modifier mot de passe.
        public function pass() {
            $data = NULL;
            //Modification du mot de passe.

            if (isset($_POST['editPass']) /*&& $_POST['editPass'] == $_SESSION['form_token']*/){
                if($_SESSION['form_timer'] + 600 > time()){
                    parent::model('accounts');
                    $model = new accounts();
                    try {
                        $model->UpdatePw($_SESSION['ID'], $_POST['password']);
                        $data['alert'] = "alert-success";					
                        $data['message'] = "Le mot de passe a été changé.";
                    } catch (PDOexception $ex) {
                        $data['alert'] = "alert-warning";
                        $data['message'] = $ex;
                    }
                } else {
                    $data['alert'] = "alert-warning";
                    $data['message'] = "La permission du formulaire a expiré.";
                }
            }
            
            parent::view("shared/header");
            parent::view("intern/menu");
            parent::view('intern/pass', $data);
            parent::view('shared/footer');
        }

        //Visualiser une évaluation ou une entrevue pour un stagiaire
        public function review($_review) 
		{
			parent::view("shared/header");
			parent::view("intern/menu");
			
			$data = array();		//Contient les informations à afficher au stagiaire
		   
		   parent::model("docs");
		   $_model = new docs();
		   
		   
			//Tout dépendant du premier paramètre passer en paramètre, choisir la bonne page
			switch($_review[0])
			{
				case "advMid": //Evaluation de mi-stage
				{
					$data = $_model->LoadAdvisor($_SESSION['ID'],"review1");
					
					parent::view("intern/reviewAdv", $data);
					break;
				}
				case "advFinale": //Evaluation finale
				{
					$data = $_model->LoadAdvisor($_SESSION['ID'],"review2");
					
					parent::view("intern/reviewAdv", $data);
					break;
				}
				case "interview": //Entrevue avec l'employeur
				{
					
					$data['interview'] = $_model->LoadCie($_SESSION['ID'],'interview');
					
					parent::view("intern/interview", $data);
					break;
				}
				case "sup": //Évaluation du superviseur
				{
					$data = $_model->LoadCie($_SESSION['ID'],"reviewSup");
					
					parent::view("intern/reviewSup", $data);
					break;
				}
			}
		   		   	   		   
			parent::view('shared/footer');			
        }

        //Enregistre un log et ouvre la page réservé au log de l'étudiant
        public function log() {

            parent::model("docs");
            $_model = new docs();
			
			//Contient toutes les données à afficher
			$data = array();

            if (isset($_POST["logText"])) {
				if($_POST["logText"] != ""){
					$_model->SaveLog($_SESSION['ID'], $_POST["logText"]);
				}
            }
			
			$data['logs'] = $_model->LoadLog($_SESSION['ID']);

			parent::view("shared/header");
			parent::view("intern/menu");
            parent::view('intern/log', $data);
			parent::view('shared/footer');
        }
    }
} else {
    //Rediriger vers l'acceuil.
    session_unset();
    session_destroy();
    header("location:/home/index");
}
?>