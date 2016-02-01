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
		
		
		//Fonction permettant de donner une nouvelle note a un stage
		public function NoteTrain ($Note, $Train){
			parent::model("projets");
			$models = new projets();
			
			$models->NoteTrain($Note, $Train, $IDTrainer, $_SESSION['ID']);
		}
		
		//Fonction permenttant de r�cup�rer la description du stage (Pour faire le Ajax sur les stages)
		/*
		public function DescrTrain (int $Train){
			return $models->BDExecute("Select Desc, SupID, Address, Postal from projects Where ID=".$Stage);
		}
		*/
		
		
		//Met � jour le journal de bord des �tudiant
		public function SaveLog($Date, $Data){
			
			//R�cup�re la date passer en param�tre pour l'utiliser comme balise pour le XML
			$DateLog = strToTime($Date);
			$DateLog = date("d-M-Y", $DateLog);
			
			//Trouve le fichier XML de l'�tudiant
			parent::model("xml");
			$models = new projets();
			
			$File = $models->GetXml($_SESSION['ID']);
			
			//Si un fichier � �t� trouver
			if (!empty($File)){
				$Xml = simplexml_load_file($File);
				$Tag = $xml->createElement($DateLog, $Data);
				$Xml->appendChild($Tag);
				$Xml->saveXML();
			}
			else{ //Sinon envoie un message d'erreur
				echo ("Erreur 001- fichier Xml introuvable");
			}	
		}
		
		//R�cup�re les informations du journal de bord de l'�tudiant
		public function LoadLog($Date){
			
			//R�cup�re la date passer en param�tre pour l'utiliser comme balise pour le XML
			$DateLog = strToTime($Date);
			$DateLog = date("d-M-Y", $DateLog);
			
			//Trouve le fichier XML de l'�tudiant
			parent::model("xml");
			$models = new projets();
			
			$File = $models->GetXml($_SESSION['ID']);
			
			//Si un fichier � �t� trouver
			if (!empty($Fichier)){
				$Xml = simplexml_load_file($File);
				return $Xml->children($DateLog);
			}	
			else{ //Sinon envoie un message d'erreur
				echo ("Erreur 001- fichier Xml introuvable");
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