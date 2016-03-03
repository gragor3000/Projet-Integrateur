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
			
			try 
			{
                    $cie->AuthCie($_CieID[0]); 
					$data['alert'] = "alert-success";
                    $data['message'] = "Cette entreprise a bien été acceptée.";
            } 
			catch (exception $ex) 
			{
					$data['alert'] = "alert-warning";
                    $data['message'] = "Cette entreprise n'a pu être acceptée.";
             }
			 
                             
            $this->index();
        }
            
        //refuse une entreprise
        public function DenyBusiness($_CieID)
        {
            parent::model("business");
                
            $cie = new business();
			
			if(isset($_POST['cieID']))
			{
			 try 
			 {
                    $cie->DeleteCie($_POST['cieID']);
					$data['alert'] = "alert-success";
                    $data['message'] = "Cette entreprise a bien été refusée.";
             } 
			 catch (exception $ex) 
			 {
					$data['alert'] = "alert-warning";
                    $data['message'] = "Cette entreprise n'a pu être refusée.";
             }

				$this->ShowUsers($data);
			}
			else
			{
			  try 
			   {
                    $cie->DenyCie($_CieID[0]);
					$data['alert'] = "alert-success";
                    $data['message'] = "Cette entreprise a bien été refusée.";
               } 
			  catch (exception $ex) 
			  {
					$data['alert'] = "alert-warning";
                    $data['message'] = "Cette entreprise n'a pu être refusée.";
              }
				
			  $this->index();
			}                           
        }
            
        //valide un projet
        public function ValidateProject($_ProjID)
        {
            parent::model("projects");              
            $projects = new projects();
            
			try 
			{
                    $projects->ValidateProject($_ProjID[0]);
					$data['alert'] = "alert-success";
                    $data['message'] = "Ce projet a bien été accepté.";
            } 
			catch (exception $ex) 
			{
					$data['alert'] = "alert-warning";
                    $data['message'] = "Ce projet n'a pu être accepté.";
             }
			$this->index();
        }
            
        //refuse un projet
        public function DenyProject($_ProjID)
        {
            parent::model("projects");
                
            $projects = new projects();
			
			try 
			{
                    $projects->DenyProject($_ProjID[0]);		
					$data['alert'] = "alert-success";
                    $data['message'] = "Ce projet a bien été refusé.";
            } 
			catch (exception $ex) 
			{
					$data['alert'] = "alert-warning";
                    $data['message'] = "Ce projet n'a pu être refusé.";
             }
				
                
			$this->cie();
        }
            
        //ajoute un compte dans la bd
        public function CreateUser()
        {          			
			if (isset($_POST["createUser"]) /*&& $_POST['createUser'] == $_SESSION['form_token'] && $_SESSION['form_timer'] + 300 > time()*/)
			{
				parent::model("accounts");              
                $account = new accounts();

                try 
				{
                    $account->CreateUser($_POST["name"], $_POST["user"], $_POST["pw"], $_POST["rank"]);		
					$data['alert'] = "alert-success";
                    $data['message'] = "Cet utilisateur a bien été enregistré.";
                } catch (exception $ex) {
					$data['alert'] = "alert-warning";
                    $data['message'] = "Le(s) changement(s) a(ont) échoué(s).";
                }
            }
			$this->ShowUsers($data);
        }
            
		
        //affiche tous les comptes sans message
        public function ShowUsers($_message)
        {
            parent::model("accounts");
                
            $account = new accounts();
            $data["users"] = $account->ShowAllUsers();  
			
			if($_message != null)
			{
				$data['message']= $_message["message"];
				$data['alert']= $_message["alert"];
			}
			//Affiche tout les éléments de la page
			parent::view("shared/header");
            parent::view("advisor/menu");
            parent::view("advisor/users", $data);
            parent::view("shared/footer");
        }
		
        //supprime un compte
        public function DeleteUser()
        {
            if (isset($_POST["userID"]) /*&& $_POST['deleteUser'] == $_SESSION['form_token'] && $_SESSION['form_timer'] + 300 > time()*/)
			{
				parent::model("accounts");
                
                $account = new accounts();

                try 
				{
                    $account->DeleteUser($_POST["userID"]);		
					$data['alert'] = "alert-success";
                    $data['message'] = "Cet utilisateur a bien été supprimé.";
                } 
				catch (exception $ex) 
				{
					$data['alert'] = "alert-warning";
                    $data['message'] = "Cet utilisateur n'a pu être supprimé.";
                }
            }
            $this->ShowUsers($data);
        }
            
	//Modifier mot de passe.
        public function pass() {
            
			$data = NULL;
                            
            //Modification du mot de passe.
            if (isset($_POST['editPass']) && $_POST['editPass'] == $_SESSION['form_token']){
                if($_SESSION['form_timer'] + 600 > time()){
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
            parent::view("advisor/menu");
            parent::view('advisor/pass', $data);
            parent::view('shared/footer');
        }
            
        //update les infos d'un compte
        public function UpdateUser()
        {
			//Modification du mot de passe.
            if (isset($_POST["userID"]) && isset($_POST["name"]) && isset($_POST["user"]) /*&& $_POST['updateUser'] == $_SESSION['form_token']*/ && $_SESSION['form_timer'] + 300 > time()) {
                parent::model('accounts');
                $account = new accounts();
                try {
                    $account->UpdateUser($_POST["userID"], $_POST["name"], $_POST["user"]);
					$data['alert'] = "alert-success";
                    $data['message'] = "Les nouvelles informations ont été enregistrées.";
                } catch (exception $ex) {
					$data['alert'] = "alert-warning";
                    $data['message'] = "Le(s) changement(s) a(ont) échoué(s).";
                }
            }

            $this->ShowUsers($data);
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
        public function assign()
        {
            parent::model("ratings");
            $ratings = new ratings();
            //Obtenir toutes les évaluations.
            $ratings = $ratings->ShowAllRatings();
                											
            parent::model("projects");
            $projects = new projects();
            //Obtenir tous les projets autorisés.
            $data["projects"] = $projects->ShowProjectByStatus(true);
                

			if (isset($ratings) && isset($data["projects"]))
			{
                foreach ($ratings as $rating) 
				{
                    $data['ratings'][$rating['projectID']] = $rating;
                }
            }
				
            parent::model("accounts");
            $interns = new accounts();
			
            //Obtenir tous les stagiaires.
            $data["interns"] = $interns->ShowUsersByRank(2);
                
            parent::view("shared/header");
            parent::view("advisor/menu");
            parent::view("advisor/assign", $data);
            parent::view("shared/footer");
        }
            
        //jumelle un stagiaire à un projet
        public function PairInternProject()
        {
            parent::model("projects");
            $projects = new projects();             

			//jumeller un stagiaire à un projet 
            if (isset($_POST['setAssign']) && /*$_POST['setAssign'] == $_SESSION['form_token'] &&*/ $_SESSION['form_timer'] + 300 > time())
			{              
					foreach ($_POST as $projectID => $internID)
					{
						if($projectID != "setAssign") $projects->PairProjectToIntern($projectID ,$internID);
					}
            }
			
			$this->assign();
        }
            
        //affiche tous les stagiaires
        public function ShowInterns($_message)
        {
            parent::model("accounts");
                
            $interns = new accounts();
            $data["interns"] = $interns->ShowUsersByRank(2);
			
			if($_message != null)
			{
				$data['message']= $_message['message'];
				$data['alert']= $_message['alert'];
			}
			
            parent::view("shared/header");
            parent::view("advisor/menu");
            parent::view("advisor/viewInterns", $data);
            parent::view("shared/footer");
        }

        //affiche les évaluations d'un étudiant
        public function review($_review)
        {
			parent::view("shared/header");
            parent::view("advisor/menu");
			
			
			if(isset($_review[0]) && isset ($_review[1]))
			{
							
			parent::model("accounts");               
            $interns = new accounts();
			
			parent::model("projects");               
            $project = new projects();
			
			$projectIntern = null;
            if(ctype_digit($_review[1]))$projectIntern = $project->ShowProjectByIntern($_review[1]);
			
			if($projectIntern !=null)
			{
			$data["interns"] = $interns->ShowUsersByRank(2);
			$data['intern'] = $interns->ShowUserByID($_review[1]);
			
            parent::model("docs");              
            $model = new docs();
            $data['readOnly'] = true;   
			 
            if($_review[0] == "logbook")
			{			  			  
			  if(!($model->ReadOnlyLog($_review[1])))
				{
						$data['alert'] = "alert-warning";
						$data['message'] = "Il n'y a pas de journal de bord associé à ce stagiaire pour le moment.";
						$this->ShowInterns($data);
				}
				else
				{
					    $data["logs"] = $model->LoadLog($_review[1]);
						parent::view("advisor/log", $data);
				}
            }
                
			//Tout dépendant du premier paramètre passer en paramètre, choisir la bonne page
			switch($_review[0])
			{
				case "evalAdvMid": //Evaluation de mi-stage
				{
					$exist = $model->ReadOnlyAdvisor($_review[1],"review1");	
					
					if(!$exist)
					{
						$review = array();
						$review["intern"] = $_review[1];
						$review["#review"] = "review1";
						
						$this->evalAdv($review);
					}
					else
					{
						$data['advisors'] = $interns->ShowUsersByRank(0);
						$data["review"] = $model->LoadAdvisor($_review[1],"review1");
						$data['advisor'] = $interns->ShowUserByID($data["review"]->Coordonnateur);
						parent::view("advisor/eval", $data);
					}

					break;
				}
				case "evalAdvFinale": //Evaluation finale
				{
                    $exist = $model->ReadOnlyAdvisor($_review[1],"review2");
					if(!$exist)
					{
						$data = array();
						$review["intern"] = $_review[1];
						$review["#review"] = "review2";
						
						$this->evalAdv($data);
					}
					else
					{
						$data['advisors'] = $interns->ShowUsersByRank(0);
						$data["review"] = $model->LoadAdvisor($_review[1],"review2");
						$data['advisor'] = $interns->ShowUserByID($data["review"]->Coordonnateur);
						parent::view("advisor/eval", $data);
					}

					break;
				}
				case "interview": //Entrevue avec l'employeur
				{
					$exist = $model->ReadOnlyCie($_review[1],"interview");													
					if(!$exist)
					{
						$data['alert'] = "alert-warning";
						$data['message'] = "Aucune entrevue évaluée pour le moment.";
						$this->ShowInterns($data);
					}
					else
					{					
						$data["interview"] = $model->LoadCie($_review[1],"interview");
						parent::view("advisor/interview", $data);
					}
					break;
				}
				case "evalSup": //Évaluation du superviseur
				{
					$exist = $model->ReadOnlyAdvisor($_review[1],"cieReview");

					if(!$exist)
					{
						$data['alert'] = "alert-warning";
						$data['message'] = "Aucune évaluation du superviseur pour le moment.";
						$this->ShowInterns($data);
					}
					else
					{
						$data["review"] = $model->LoadAdvisor($_review[1],"cieReview");
						
						parent::model("projects");              
                        $model = new projects();

						$data['project'] = $model->ShowProjectByID($data["review"]->project);
						parent::view("advisor/evalSup", $data);
					}
   				    break;
				}
			}
			  parent::view("shared/footer");
			}
			else
			{
				$data['alert'] = "alert-warning";
				$data['message'] = "Ce stagiaire n'a pas encore été jumelé à un projet.";
				$this->ShowInterns($data);
			}
			}
			else
			{
				$this->ShowInterns(null);
			}
           
        }           
		
		//Évaluer un stagiaire à la mi et à la fin de la session
		public function evalAdv($_review)
		{
			parent::model("accounts");
			parent::model("docs");
			
			$model1 = new accounts();
			$model2 = new docs();						
			
			if(((isset($_review["intern"]) && isset ($_review["#review"]))) || (isset($_POST["intern"])))
			{
			  $data['advisors'] = $model1-> ShowUsersByRank(0);
			  $data['interns'] = $model1-> ShowUsersByRank(2);			
			
			  $intern = null;
			  $review = null;
			
			  if(isset($_POST['intern'])) 
			  {
				  $_review = null;
				  $intern = $_POST['intern'];
				  $review = $_POST['review'];
			  }
			  else if($_review != null)
			  {
				  $intern = $_review["intern"];
				  $review = $_review["#review"];
			  }			  
				
				$data['readOnly'] = $model2->ReadOnlyAdvisor($intern, $review);
				
			   parent::model("projects");               
               $project = new projects();
			   
			   $projectIntern = null;
               if(ctype_digit($intern))$projectIntern = $project->ShowProjectByIntern($intern);
			

				if($projectIntern != null)
				{
						
		           if (!$data['readOnly']) //Si le formulaire n'existe pas
		           {
			           if (isset($_POST['evalIntern']) && /*$_POST['evalIntern'] == $_SESSION['form_token'] &&*/ $_SESSION['form_timer'] + 300 > time())
			          {   
		                try 
				        {
							$model2->SaveAdvisor( $_SESSION['ID'],$review,$_POST);
							$data['alert'] = "alert-success";
                            $data['message'] = "L'évaluation a été enregistrée avec succès!";
							$data['review'] = $model2->LoadAdvisor($intern ,$review);
							$data['readOnly'] = true;
				        }
						catch (exception $ex) 
						{
							$data['alert'] = "alert-warning";
                            $data['message'] = "L'enregistrement de l'évaluation a échoué.";
							$this->ShowInterns($data);
						}  
			          }
		           }
		            else
		           {
			    	$data['alert'] = "alert-warning";
                    $data['message'] = "Cette évaluation existe déjà pour ce stagiaire.";
			    	$data['review'] = $model2->LoadAdvisor($intern,$review);
		           }
		            $data['intern'] = $intern;
		            $data['#review'] = $review;
		  
		        	parent::view("shared/header");
                    parent::view("advisor/menu");
                    parent::view("advisor/eval", $data);
                    parent::view("shared/footer");
		        }
			    else
			    {
					$data['alert'] = "alert-warning";
				    $data['message'] = "Ce stagiaire n'a pas encore été jumelé à un projet.";
				    $this->ShowInterns( $data);
			    }
			}
			else
			{
				$this->index();
			}			
		}
    }
        
} else {
    //Redirige vers l'acceuil.
    session_unset();
    session_destroy();
    header("location:/home/index");
}
    
?>