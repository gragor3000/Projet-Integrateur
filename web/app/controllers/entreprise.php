<?php

if (isset($_COOKIE['token'])
	&& isset($_SESSION['ID'])
	&& isset($_SESSION["role"])
	&& $_SESSION["role"] == 1)
{
	class entreprise extends Controller{
		
		private $models;//pointe vers la classe model
		
		//Constructeur de la classe
		public function __construct(){
			//session_start();
		}
		
		//Fonction appeler par d�faut
		public function index ( $name = '' ){
			
			parent::model("projets");
			$models = new projets();
			
			//Ouvre l'index du supervisseur
			parent::view('superviseur/index', $models->ShowSupTrain($_SESSION['ID']));
		}
		
		//Fonction permettant d'atteindre les differente page de la section
		public function Access($PageWanting = 0){
			
			switch ($PageWanting){
				case 0:
					index();
					break;
				case 1:
					parent::view('superviseur/projet');
					break;
				case 2:
					parent::view('superviseur/rapport');
					break;
			}
		}
		
		//Fonction permettant de modifier ou cr�� un nouveau projet de stage
		public function EditTrain($_IDTrain, $_Title, $_SupName, $_SupTitle, $_SupEmail, $_SupTel, $_Desc, $_Equip, $_Extra){
			
			parent::model("projets");
			$models = new projets();
						
			$models->EditTrain($_IDTrain, $_Title, $_SupName, $_SupTitle, $_SupEmail, $_SupTel, $_Desc, $_Equip, $_Extra, $_SESSION['ID']);
			
		}
			
	}
} else {
	//Rediriger vers l'acceuil.
    session_unset();
    session_destroy();
    header("location: " . $_SERVER['SERVER_ADDR']);
}
	
?>