<?php

	class Superviseur extends Controller{
		
		private $models;//pointe vers la classe model
		
		//Constructeur de la classe
		public function __construct(){
			session_start();
			parent::model("models");
			$this->models = new models();
		}
		
		//Fonction appeler par d�faut
		public function index ( $name = '' ){
			
			//Ouvre l'index du supervisseur
			parent::view('superviseur/index');
		}
		
	}
	
?>