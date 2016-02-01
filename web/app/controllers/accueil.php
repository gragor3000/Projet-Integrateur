<?php

	class Accueil extends Controller{
		
		private $models;//pointe vers la classe model
		
		//Constructeur de la classe
		public function __construct(){
			session_start();
			parent::model("models");
			$this->models = new models();
		}
		
		//Fonction appeler par défaut
		public function index ( $name = '' ){
			
			//Ouvre l'index du de l'acceuil
			parent::view('accueil/index', $TblResultat);
		}
		
		//Fonction qui permet de se connecter au serveur
		public function LogIn(){
			
			
		}
		
	}
	
?>