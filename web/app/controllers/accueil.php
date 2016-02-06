<?php

	class accueil extends Controller{
		
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

		public function t()
		{
			//Tante de trouver le fichier Xml et de sauvegarder les modifications
			try {
				$Xml = simplexml_load_file(parent::$DefaultXMLPath.'journal_de_bord/'."nimortequoi"."_JDB.xml");

				//Récupère la date passer en paramètre pour l'utiliser comme balise pour le XML
				/*$DateLog = strToTime($Date);
				$DateLog = date("d-M-Y", $DateLog);

				/*$Tag = $Xml->createElement($DateLog, $Data);
				$Xml->appendChild($Tag);*/
				$Xml->saveXML();
			}
			catch(exception $ex)
			{ //Si le fichier n'est pas trouver, en créer un nouveau
				$Xml = new domxml_new_doc('1.0');
				$Xml->save(parent::$DefaultXMLPath.'/JournalDeBord/'."_JDB.xml");
			}
		}

	}
	
?>