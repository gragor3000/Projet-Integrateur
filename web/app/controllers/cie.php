<?php

if (isset($_COOKIE['token'])
	&& isset($_SESSION['ID'])
	&& isset($_SESSION["role"])
	&& $_SESSION["role"] == 1)
{
	class cie extends Controller{
		
		private $models;//pointe vers la classe model
		
		//Constructeur de la classe
		public function __construct(){
			session_start();
			parent::model("models");
			$this->models = new models();
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
		public function EditTrain($IDTrain, $Title, $SupName, $SupTitle, $SupEmail, $SupTel, $Desc, $Equip, $Extra){
			
			parent::model("projets");
			$models = new projets();
						
			$models->EditTrain($IDTrain, $Title, $SupName, $SupTitle, $SupEmail, $SupTel, $Desc, $Equip, $Extra, $_SESSION['ID']);
			
		}
		
		//Fonction permettant de r�cup�rer le rapport d'entrevu
		/*public function SaveReport($IDTrainer){
			
			//Tante de trouver le fichier Xml
			try {
				$Xml = simplexml_load_file(parent::DefaultXMLPath.'rapport/'. $IDTrainer."_RPT.xml");
				
				//R�cup�re la date passer en param�tre pour l'utiliser comme balise pour le XML
				$DateLog = strToTime($Date);
				$DateLog = date("d-M-Y", $DateLog);
					
				$Tag = $Xml->createElement($DateLog, $Data);
				$Xml->appendChild($Tag);
				$Xml->saveXML();
			}
			catch{ //Si le fichier n'est pas trouver, en cr�er un nouveau
				$Xml = new domxml_new_doc('1.0');
				$Xml->save($DefaultXMLPath.'/rapport/'.$IDTrainer."_RPT.xml");
			}	
		}
		
		//Fonction permettant de r�cup�rer le rapport d'entrevu
		public function SaveEvaluation($IDTrainer){
			
			//Tante de trouver le fichier Xml
			try {
				$Xml = simplexml_load_file(parent::DefaultXMLPath.'evaluation/'. $IDTrainer."_EVL.xml");
				
				//R�cup�re la date passer en param�tre pour l'utiliser comme balise pour le XML
				$DateLog = strToTime($Date);
				$DateLog = date("d-M-Y", $DateLog);
					
				$Tag = $Xml->createElement($DateLog, $Data);
				$Xml->appendChild($Tag);
				$Xml->saveXML();
			}
			catch{ //Si le fichier n'est pas trouver, en cr�er un nouveau
				$Xml = new domxml_new_doc('1.0');
				$Xml->save($DefaultXMLPath.'/evaluation/'.$IDTrainer."_EVL.xml");
			}	
		}*/
			
	}
} else {
	//Rediriger vers l'acceuil.
    session_unset();
    session_destroy();
    header("location: " . $_SERVER['SERVER_ADDR']);
}
	
?>