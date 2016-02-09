<?php

if (isset($_COOKIE['token'])
	&& isset($_SESSION['ID'])
	&& isset($_SESSION["role"])
	&& $_SESSION["role"] == 1)
{
	class businesses extends Controller{
		
		private $models;//pointe vers la classe model
		
		//Constructeur de la classe
		public function __construct(){
			//session_start();
		}
		
		//Fonction appelée par d�faut
		public function index ( $name = '' ){
			
			parent::model("projects");
			$models = new projects();
			
			//Ouvre l'index du superviseur
			parent::view('cie/index', $models->ShowProjectsCie($_SESSION['ID']));
		}
			
		//Fonction permettant de modifier ou cr�� un nouveau projet de stage
<<<<<<< HEAD
		public function editProject($_projectId, $_title, $_supName, $_supTitle, $_supEmail, $_supTel, $_desc, $_equip, $_extra){
=======
		public function EditTrain($_IDTrain, $_Title, $_SupName, $_SupTitle, $_SupEmail, $_SupTel, $_Desc, $_Equip, $_Extra){
>>>>>>> origin/master
			
			parent::model("projects");
			$models = new projets();
						
<<<<<<< HEAD
			$models->EditProject($_projectId, $_title, $_supName, $_supTitle, $_supEmail, $_supTel, $_desc, $_equip, $_extra, $_SESSION['ID']);			
		}
	
		//Fonction permettant de changer le mot de passe de l'entreprise
		public function editPassword ( $name = '' ){
=======
			$models->EditTrain($_IDTrain, $_Title, $_SupName, $_SupTitle, $_SupEmail, $_SupTel, $_Desc, $_Equip, $_Extra, $_SESSION['ID']);
>>>>>>> origin/master
			
			parent::model("accounts");
			$models = new account();
			
			$models->UpdatePw($_SESSION['ID'], $_pw);
			
			//Ouvre l'index du superviseur
			parent::view('cie/index', $models->ShowProjectsCie($_SESSION['ID']));
		}
<<<<<<< HEAD
		
		//Fonction permettant de voir une modification de mot de passe
		public function pass {		
			
		  parent::view('cie/pass')
		}
		
		//Fonction permettant de voir une modification de projet de stage
		public function edit($_projetId) {		
		
		  parent::model("projects");
		  $models = new projets();
		  
		  parent::view('cie/edit',  $models->ShowProject(_projetId))
		}
		
		//Fonction permettant de voir un formulaire d'entrevue
		public function interview {		
		
		
	      parent::model("accounts");
		  $models = new (account);
		  
		  parent::view('cie/interview' , $models->ShowUsersRank(0) )
		}
		
		//Fonction permettant de voir un formulaire d'évaluation
		public function review {	
		
		  parent::model("");
		  $models = new ();
		  
		  parent::view('cie/review')
		}
		
		//Fonction permettant de soumettre un projet de stage
		public function submit {	
		
		  parent::view('cie/submit')
		}
=======
			
>>>>>>> origin/master
	}
} else {
	//Rediriger vers l'acceuil.
    session_unset();
    session_destroy();
    header("location: " . $_SERVER['SERVER_ADDR']);
}
	
?>