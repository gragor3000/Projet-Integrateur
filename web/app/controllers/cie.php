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
            $model1 = new projects();

            //Modification du projet.
            if (isset($_POST['editProject']) /*&& $_POST['editProject'] == $_SESSION['form_token']*/ && $_SESSION['form_timer'] + 600 > time()) 
			{
                try 
				{
                    $model1->UpdateProject($_projectID[0], $_POST['title'], $_POST['supName'], $_POST['supTitle'], $_POST['supTel'], $_POST['supEmail'], $_POST['desc'], $_POST['equip'], $_POST['extra'], $_POST['info']);
                    $data['alert'] = "alert-success";
                    $data['message'] = "Le projet a été mis à jour.";
					
                } 
				catch (exception $ex) 
				{
                    $data['alert'] = "alert-danger";
                    $data['message'] = "Le(s) changement(s) a(ont) échoué(s).";
                }
            }

            //Obtenir les informations du projet.
            $data['project'] = $model1->ShowProjectByID(intval($_projectID[0]));

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
        public function delProject($_projectID)
        {
            if (isset($_POST['delProject']) /*&& $_POST['delProject'] == $_SESSION['form_token']*/ && $_SESSION['form_timer'] + 3000 > time()) {

                parent::model('projects');
                $projects = new projects();

                  try 
				  {
                    $projects->DeleteProject($_projectID[0]);
                    $data['alert'] = "alert-success";
                    $data['message'] = "Le projet a été supprimé avec succès!";
                  } 
				  catch (exception $ex) 
				  {
                    $data['alert'] = "alert-danger";
                    $data['message'] = "Le projet n'a pu être supprimé.";
                  }
            }

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
            
			$intern = array(); //stagiaire 
			$data['interns'] = $model2->ShowUsersByRank(2);

        if(($data['interns'] != null)&&(($_internID != null) || (isset($_POST['intern']))))
		{
			$intern = null;
			
			if(isset($_POST['intern']))
				//Vérifier l'existence d'une entrevue entre l'entreprise et le stagiaire sélectionné
                $intern = $_POST['intern'];
			else if($_internID != null)
			{
				$intern = $_internID;
			}
                $data['internActive'] = $intern[0];
				
				$data['readOnly'] = $model1->ReadOnlyCie($intern[0], 'interview');		
			
            if (!$data['readOnly']) 
			{   //Si le formulaire n'existe pas

                //Enregistrer l'entrevue.
                if (isset($_POST['sendInterview']) /*&& $_POST['sendInterview'] == $_SESSION['form_token']*/ && $_SESSION['form_timer'] + 1200 > time()) 
				{
                    try 
					{
                        $model1->SaveCie($_SESSION['ID'], 'interview', $_POST);
						$data['interview'] = $model1->LoadCie($_POST['intern'], 'interview');
                        $data['alert'] = "alert-success";
                        $data['message'] = "L'entrevue a été sauvegardée avec succès.";
						$data['readOnly'] = true;
                    } 
					catch (exception $ex) 
					{
                        $data['alert'] = "alert-warning";
                        $data['message'] = "L'entrevue n'a pas pu être enregistrée.";
                    }
                }
            } 
			else 
			{   //si le formulaire existe
		
		         $data['interview'] = $model1->LoadCie($intern[0] , 'interview');
				 
                //Si les id sont les mêmes, afficher le formulaire d'évaluation
                if ($data['interview']->Employeur != $_SESSION['ID']) 
				{				
                    $data['alert'] = "alert-warning";
                    $data['message'] = "Il vous est interdit de visualiser ce formulaire.";				
					$data['interview'] = null;
					$this->index();
                }
				$data['alert'] = "alert-warning";
                $data['message'] = "L'entrevue pour ce stagiaire existe déjà.";
            }
		}
        else
		{
			$data['readOnly'] = $data['interns'] == null;
		}
		
            parent::view("cie/interview", $data);
            parent::view("shared/footer");		
        }

        //Formulaire d'évaluation de stage.
        public function review($_projectID)
        {
            parent::view("shared/header");
            parent::view("cie/menu");

			parent::model("projects");
            $model = new projects();

			//tableau de tous les projets d'une compagnie
			$data['projects'] = $model->ShowProjectsByCie($_SESSION['ID']);
			
		if(($data['projects'] != null) && (($_projectID != null) || (isset($_POST['project']))))
		{
			$project = null;
			
            parent::model("docs");
            $model1 = new docs();

            parent::model("projects");
            $model2 = new projects();
            
			if(isset($_POST['project']))
                $project = $_POST['project'];
			else if($_projectID != null)
			{
				$project = $_projectID;
			}
                $data['projectActive'] = $project[0];
				
			$project = $model2->ShowProjectByID($project[0]);
            $data['title'] = $project->title;

			$internId = 18;
			//$internId = $project->internID;  //à changer pour version finale
			
            //Vérifier l'existence d'une évaluation de stage
            $data['readOnly'] = $model1->ReadOnlyAdvisor($internId, 'cieReview');
			
            parent::model("accounts");
            $model3 = new accounts();
            $data['intern'] = $model3->ShowUserByID($internId);
			 
            if ($data['readOnly']) 
			{ //si le formulaire existe
                $data['review'] = $model1->LoadAdvisor($internId, "cieReview");

                //Si les id sont les mêmes, afficher le formulaire d'évaluation
                if ($data['review']->Employeur != $_SESSION['ID']) 
				{
					$data['review'] = null;
					$data['intern'] = null;
                    $data['alert'] = "alert-warning";
                    $data['message'] = "Il vous est interdit de visualiser ce formulaire.";
                    $this->index();
                }
				$data['alert'] = "alert-warning";
                $data['message'] = "L'évaluation pour ce stagiaire et pour ce projet existe déjà.";
            } 
			else 
			{ //si le formulaire n'existe pas
                //Enregistrer le formulaire d'évaluation.

                if (isset($_POST['sendReview']) /*&& $_POST['sendReview'] == $_SESSION['form_token']*/ && $_SESSION['form_timer'] + 1200 > time()) 
				{
                    try 
					{
						$_POST['intern'] = $internId;
                        $model1->SaveAdvisor($_SESSION['ID'], "cieReview", $_POST);
						$data['review'] = $model1->LoadAdvisor($internId, 'cieReview');
                        $data['alert'] = "alert-success";
                        $data['message'] = "L'évaluation a été sauvegardée avec succès.";
						$data['readOnly'] = true;
                    } 
					catch (Exception $e) 
					{
                        $data['alert'] = "alert-warning";
                        $data['message'] = "L'évaluation n'a pas pu être enregistrée.";
                    }
                    
                } 
            }
		}
		else
		{
			$data['readOnly'] = $data['projects'] == null;
		}
            parent::view("cie/review", $data);
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