<?php

	class Stagiaire extends Controller{
		
		//Constructeur de la classe
		public function __construct(){
			session_start();
		}
		
		//Fonction appeler par d�faut
		public function index ( $name = '' ){
		
			parent::model("projets");
			$models = new projets();
			
			//Ouvre l'index du stagiaire en envoyant un tableau d'information
			parent::view('stagiaire/index', $models->ShowTrain($_SESSION['ID']));
		}
		
		//Fonction permettant d'atteindre les differente page de la section
		public function Access($PageWanting = 0){
			
			switch ($PageWanting){
				case 0:
					index();
					break;
				case 1:
					parent::view('stagiaire/journal');
					break;
			}
		}
		
		
		//Fonction permettant de donner une nouvelle note a un stage
		public function NoteTrain ($Note, $Train){
			parent::model("projets");
			$models = new projets();
			
			$models->NoteTrain($Note, $Train, $IDTrainer, $_SESSION['ID']);
		}
		
		
		//Met � jour le journal de bord des �tudiant
		public function SaveLog($Date, $Data){
			
			//Tante de trouver le fichier Xml et de sauvegarder les modifications
			try {
				$Xml = simplexml_load_file(parent::DefaultXMLPath.'journal_de_bord/'. $SESSION['ID']."_JDB.xml");
				
				//R�cup�re la date passer en param�tre pour l'utiliser comme balise pour le XML
				$DateLog = strToTime($Date);
				$DateLog = date("d-M-Y", $DateLog);
					
				$Tag = $Xml->createElement($DateLog, $Data);
				$Xml->appendChild($Tag);
				$Xml->saveXML();
			}
			catch{ //Si le fichier n'est pas trouver, en cr�er un nouveau
				$Xml = new domxml_new_doc('1.0');
				$Xml->save($DefaultXMLPath.'/journal_de_bord/'.$SESSION['ID']."_JDB.xml");
			}	
		}
		
		//R�cup�re les informations du journal de bord de l'�tudiant
		public function LoadLog($Date){
			
			//Tante de trouver le fichier Xml et de charger son contenu � ',emplacement de la bonne balise
			try {
				$Xml = simplexml_load_file($DefaultXMLPath.'journal_de_bord/'.$SESSION['ID']."_JDB.xml");
				
				//R�cup�re la date passer en param�tre pour l'utiliser comme balise pour le XML
				$DateLog = strToTime($Date);
				$DateLog = date("d-M-Y", $DateLog); 
				
				return $Xml->children($DateLog);
			}
			catch{ //Si le fichier n'est pas trouver, en cr�er un nouveau
				$Xml = new domxml_new_doc('1.0');
				$Xml->save($DefaultXMLPath.'/journal_de_bord/'.$SESSION['ID']."_JDB.xml");
			}
		}
		
		
		//Permet de r�cup�rer les informations de comptes
		public function LoadAccountData (){
			
			//Cherche les informations de l'�tudiant
			return $models->BDExecute(" =".SESSION['ID']);
			
		}
		
		//Permet de changer les informations de comptes
		public function SaveAccountData ($User, $PWord){
			
			//Change les informations de connection de l'�tudiant
			$models->BDExecute(" =".SESSION['ID']);
		}
		
	}
	
?>