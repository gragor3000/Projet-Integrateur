<?php
/*
2016-02-09 Marc Lauzon
À FAIRE
- Soumission d'entrevue.
- Soumission d'évaluation.
- Soumission de MaJ d'info.
*/

//Validation de l'identité.
if (isset($_COOKIE['token'])
	&& isset($_SESSION['ID'])
	&& isset($_SESSION["role"])
	&& $_SESSION["role"] == 1)
{
	class cie extends Controller{
				
		//Accueil par défaut.
		public function index (){
			parent::view("shared/header");
			parent::view("cie/menu");
			
			parent::model("business");
			$model = new business;
			//Obtenir les informations de l'entreprise.
			$data['cie'] = $model->ShowBusinessByID($_SESSION['ID']);
			
			parent::model("projects");
			$model = new projects();
			//Obtenir les projets de l'entreprise.
			$data['projects'] = $model->ShowProjectsByCie($_SESSION['ID']);
			
			parent::model("accounts");
			$model = new accounts();
			//Déterminer l'assignation du projet.
			foreach ($project in $data['projects']){
				if (isset($project->internID) && $project->internID != null){
					$data['intern'][$project->ID] = $model->ShowUserByID($project->internID);
				}
			}
			
			//Ouvre l'index du superviseur
			parent::view('cie/index', $data);
			parent::view('shared/footer');
		}
			
		//Modifier un projet.
		public function edit($_projectID){
			parent::view("shared/header");
			parent::view("cie/menu");
			
			parent::model("business");
			$model = new business;
			//Obtenir les informations de l'entreprise.
			$data['cie'] = $model->ShowBusinessByID($_SESSION['ID']);
			
			//Obtenir les informations du projet.
			parent::model("projects");
			$model = new projects();
			
			//Modification du projet.
			if(isset($_POST['editProject']) && $_POST['editProject'] == $_SESSION['form_token'] && $_SESSION['form_timer'] + 600 > time()){
				try{
					$model->UpdateProject($_projectID, $_POST['title'], $_POST['supName'], $_POST['supTitle'], $_POST['supTel'], $_POST['supEmail'], $_POST['desc'], $_POST['equip'], $_POST['extra'], $_POST['info']);
					$data['message'] = "Le projet a été mis à jour.";
				}
				catch {
					$data['message'] = "Le changement a échoué.";
				}
			}
			
			//Obtenir les informations du projet.
			$data['project'] = $model->ShowProjectByID($_projectID);
			
			if($data['project']->status == '0' $$ $data['project']->entID == $_SESSION['ID']){
				parent::view('cie/edit', $data);
			} else {
				$data['message'] = "Vous n'avez pas l'autorisation de moddifier ce projet.";
				parent::view('cie/index', $data);
			}
			
			parent::view('shared/footer');
		}
	
		//Modifier mot de passe.
		public function pass(){
			parent::view("shared/header");
			parent::view("cie/menu");
			
			//Modification du mot de passe.
			if(isset($_POST['editPass']) && $_POST['editPass'] == $_SESSION['form_token'] && $_SESSION['form_timer'] + 300 > time()){
				parent::model('accounts');
				$model = new accounts();
				try{
					$model->UpdatePw($_SESSION['ID'], $_POST['password'])
					$data['message'] = "Le mot de passe a été changé.";
				}
				catch {
					$data['message'] = "Le changement a échoué.";
				}
			}
			
			parent::view('cie/pass', $data);
			parent::view('shared/footer');
		}
		
		//Formulaire de mise à jour d'information.
		public function info(){
			//////////// À FAIRE ////////////////
		}
				
		//Formulaire d'entrevue de stagiaire.
		public function interview($_internID){		
			parent::view("shared/header");
			parent::view("cie/menu");
			
			parent::model("docs");
			$model = new docs();

			///////// PROBLÉMATIQUE : (A[X & Y] | B[X & Y]) = F : Form. (A & B) | A[X & Y]) | B(X & Y) = V : Index. /////
			//Vérifié l'existence d'un entrevue entre l'entreprise et le stagiaire.
			$data['readOnly'] = $model->FormExists($_SESSION['ID'], $_internID, 'interview1') || $model->FormExists($_SESSION['ID'], $_internID, 'interview2');
			
			if(!$data['readOnly')){
				
				//Enregistrer l'entrevue.
				if(isset($_POST['sendInterview']) && $_POST['sendInterview'] == $_SESSION['form_token'] && $_SESSION['form_timer'] + 1200 > time()){
					try{
						$model->AddInterview($_SESSION['ID'], $_internID, $_POST['docName'], $_POST['intTimestamp'], $_POST['intDept'], $_POST['intPosition'], $_POST['communication'], $_POST['enthusiams'], $_POST['selfesteem'], $_POST['appearance'], $_POST['answers'], $_POST['comments'], $_POST['interviewer']);
						$data['message'] = "L'entrevue a été sauvegardé avec succès.";
						parent::view("cie/index", $data);
					}
					catch{
						$data['message'] = "L'information n'a pas pu être enregistré.";
					}
				}
				
				parent::model("accounts");
				$models = new (account);
			  
				parent::view("cie/interview", $data);
			} else {
				$data['message'] = "Il vous est impossible d'ajouter ou de visualisé les entrevues.";
				parent::view("cie/index", $data);
			}
			//////////// À CORRIGER ///////////////////////////////
			parent::view("shared/footer");
		}
		
		//Formulaire d'évaluation de stage.
		public function review($_projectID){	
			parent::view("shared/header");
			parent::view("cie/menu");
		
			parent::model("docs");
			$model = new docs();
			
			/////////// PROBLÉMATIQUE : S'assuré que l'entreprise ne peut voir les autres évaluations ou passer une evaluation inexistante.
			
			$data['readOnly'] = $model->FormExists($_SESSION['ID'], $_projectID, 'cieReview');
			if($data['readOnly']){
				$data['review'] = $model->ShowCieReview($_projectID);
			}
			
			//AddCieReview(...);
			parent::model("projects");
			$model = new projects();
			
			$data['title'] = ($model->ShowProjectByID($_projectID))->title;
			$data['date'] = date();
			/////////////// À CORRIGER /////////////////////////////
			parent::view("shared/footer");			
		}
		
		//Formulaire de soumission de projet.
		public function submit(){			
			parent::view("shared/header");
			parent::view("cie/menu");
			
			parent::model("business");
			$model = new business;
			//Obtenir les informations de l'entreprise.
			$data['cie'] = $model->ShowBusinessByID($_SESSION['ID']);
			
			//Soumission du projet.
			if(isset($_POST['sendProject']) && $_POST['sendProject'] == $_SESSION['form_token'] && $_SESSION['form_timer'] + 600 > time()){
				parent::model("projects");
				$model = new projects();
				
				try{
					$model->SubmitProject($_projectID, $_POST['title'], $_POST['supName'], $_POST['supTitle'], $_POST['supTel'], $_POST['supEmail'], $_POST['desc'], $_POST['equip'], $_POST['extra'], $_POST['info']);
					$data['message'] = "Le projet a été soumis pour une validation.";
				}
				catch {
					$data['message'] = "Le projet n'a pas pu être envoyé.";
				}
			}			
			
			parent::view('cie/submit', $data);
			parent::view('shared/footer');
		}
	}
} else {
	//Rediriger vers l'acceuil.
    session_unset();
    session_destroy();
    header("location: " . $_SERVER['SERVER_ADDR']);
}
	
?>