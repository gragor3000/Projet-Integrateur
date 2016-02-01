<?php

	class Stagiaire extends Controller{
		
		//Constructeur de la classe
		public function __construct(){
			session_start();
		}
		
		//Fonction appeler par défaut
		public function index ( $name = '' ){
		
			parent::model("projets");
			$models = new projets();
			
			//Ouvre l'index du stagiaire en envoyant un tableau d'information
			parent::view('stagiaire/index', $models->ShowTrain($_SESSION['ID']));
		}
		
		
		//Fonction permettant de donner une nouvelle note a un stage
		public function NoteTrain ($Note, $Train){
			parent::model("projets");
			$models = new projets();
			
			$models->NoteTrain($Note, $Train, $IDTrainer, $_SESSION['ID']);
		}
		
		
		//Met à jour le journal de bord des étudiant
		public function SaveLog($Date, $Data){
			
			
			//Tante de trouver le fichier Xml et de sauvegarder les modifications
			try {
				$Xml = simplexml_load_file($DefaultXMLPath.'journal_de_bord/'.$SESSION['ID']."_JDB.xml");
				
				//Récupère la date passer en paramètre pour l'utiliser comme balise pour le XML
				$DateLog = strToTime($Date);
				$DateLog = date("d-M-Y", $DateLog);
					
				$Tag = $Xml->createElement($DateLog, $Data);
				$Xml->appendChild($Tag);
				$Xml->saveXML();
			}
			catch{ //Si le fichier n'est pas trouver, en créer un nouveau
				$Xml = new domxml_new_doc('1.0');
				$Xml->save($DefaultXMLPath.'/JournalDeBord/'.$SESSION['ID']."_JDB.xml");
			}	
		}
		
		//Récupère les informations du journal de bord de l'étudiant
		public function LoadLog($Date){
			
			//Tante de trouver le fichier Xml et de charger son contenu à ',emplacement de la bonne balise
			try {
				$Xml = simplexml_load_file($DefaultXMLPath.'JournalDeBord/'.$SESSION['ID']."_JDB.xml");
				
				//Récupère la date passer en paramètre pour l'utiliser comme balise pour le XML
				$DateLog = strToTime($Date);
				$DateLog = date("d-M-Y", $DateLog); 
				
				return $Xml->children($DateLog);
			}
			catch{ //Si le fichier n'est pas trouver, en créer un nouveau
				$Xml = new domxml_new_doc('1.0');
				$Xml->save($DefaultXMLPath.'/JournalDeBord/'.$SESSION['ID']."_JDB.xml");
			}
		}
		
		
		//Permet de récupérer les informations de comptes
		public function LoadAccountData (){
			
			//Cherche les informations de l'étudiant
			return $models->BDExecute(" =".SESSION['ID']);
			
		}
		
		//Permet de changer les informations de comptes
		public function SaveAccountData ($User, $PWord){
			
			//Change les informations de connection de l'étudiant
			$models->BDExecute(" =".SESSION['ID']);
		}
		
	}
	
?>