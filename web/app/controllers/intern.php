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
        public function index() {
            parent::view("shared/header");
            parent::view("intern/menu");   

            //Si l'usager à envoyer une évaluation, l'enregistrer
            if(isset($_POST['id']))
			{
                    parent::model("ratings");
                    $rating = new ratings();

                    $rating->RatingProject($_SESSION['ID'], $_POST['id'], $_POST['rating']);
            }

            parent::model("projects");
            $model = new projects();
			
            //Obtenir le projet assigné.
            $data['project'] = $model->ShowProjectByIntern($_SESSION['ID']);

            //Sinon obtenir tous les projets.
            if ($data['project'] == null) 
			{
                $data['projects'] = $model->ShowProjectByStatus(1);
				
                parent::model("business");
                $model = new business;
                parent::model("ratings");
                $rating = new ratings;

                foreach ($data['projects'] as $project) 
				{
                        //Obtenir les informations de l'entreprise.
                        $data['cie'][$project->businessID] = $model->ShowCieByID($project->businessID);
						
                        //Obtenir le rating.
                        $data['ratings'][$project->ID] = $rating->FindRateByID($_SESSION['ID'],$project->ID);

                }               

                parent::view("intern/list", $data);
            } 
			else 
			{
                parent::model("business");
                $model = new business;
				
                //Obtenir les informations de l'entreprise.
                $data['cie'][$data['project']->ID] = $model->ShowCieByID($data['project']->businessID);

                parent::view("intern/index", $data);
            }

            parent::view("shared/footer");
        }

        //Voir le menu des évaluations d'un stagiaire
       public function info($_message)
       {
		   $data = null;
		   	if($_message != null)
			{
				$data['message']= $_message['message'];
				$data['alert']= $_message['alert'];
			}
			
          parent::view("shared/header");
          parent::view("intern/menu");
          parent::view("intern/info",$data);
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
			parent::model("accounts");
                
            $intern = new accounts();
			$data['intern'] = $intern->ShowUserByID($_SESSION['ID']);
			
            parent::model("docs");              
            $model = new docs();
            $data['readOnly'] = true;
			
			//Tout dépendant du premier paramètre passer en paramètre, choisir la bonne page
			switch($_review[0])
			{
				case "evalAdvMid": //Evaluation de mi-stage
				{
					$exist = $model->ReadOnlyAdvisor($_SESSION['ID'],"review1");	
					
					if(!$exist)
					{
						$data['alert'] = "alert-warning";
						$data['message'] = "Aucune évaluation de mi-stage pour le moment.";
						$this->info($data);
					}
					else
					{
						$data["review"] = $model->LoadAdvisor($_SESSION['ID'],"review1");
						$data['advisor'] = $intern->ShowUserByID($data["review"]->Coordonnateur);
						parent::view("intern/eval", $data);
					}

					break;
				}
				case "evalAdvFinale": //Evaluation finale
				{
                    $exist = $model->ReadOnlyAdvisor($_SESSION['ID'],"review2");
					if(!$exist)
					{
						$data['alert'] = "alert-warning";
						$data['message'] = "Aucune évaluation de fin de stage pour le moment.";
						$this->info($data);
					}
					else
					{
						$data["review"] = $model->LoadAdvisor($_SESSION['ID'],"review2");
						$data['advisor'] = $intern->ShowUserByID($data["review"]->Coordonnateur);
						parent::view("intern/eval", $data);
					}

					break;
				}
				case "interview": //Entrevue avec l'employeur
				{
					$exist = $model->ReadOnlyCie($_SESSION['ID'],"interview");
										
					if(!$exist)
					{
						$data['alert'] = "alert-warning";
						$data['message'] = "Aucune entrevue évaluée pour le moment.";
						$this->info($data);
					}
					else
					{						
						$data["interview"] = $model->LoadCie($_SESSION['ID'],"interview");
						parent::view("intern/interview", $data);
					}
					break;
				}
				case "evalSup": //Évaluation du superviseur
				{
					$exist = $model->ReadOnlyAdvisor($_SESSION['ID'],"cieReview");

					if(!$exist)
					{
						$data['alert'] = "alert-warning";
						$data['message'] = "Aucune évaluation du superviseur pour le moment.";
						$this->info($data);
					}
					else
					{
						$data["review"] = $model->LoadAdvisor($_SESSION['ID'],"cieReview");
						
						parent::model("projects");              
                        $model = new projects();

						$data['project'] = $model->ShowProjectByID($data["review"]->project);
						parent::view("intern/evalSup", $data);
					}
   				    break;
				}
			}
			
            parent::view("shared/footer");
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
            $data['logs']= array_reverse($data['logs']);

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