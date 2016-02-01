<?php

	class Stagiaire extends Controller{
		
		private $models;//pointe vers la classe model
		
		//Constructeur de la classe
		public function __construct(){
			session_start();
			parent::model("models");
			$this->models = new models();
		}
		
		//Fonction appeler par défaut
		public function index ( $name = '' ){
			
			//Cherche le stage affecter à l'étudiant
			$TblResultat = parent::BDExecute("Select ID, Title, Desc, SupID, Address, Postal from projects where InternID =".SESSION['ID']);
			
			//Si le stagiaire n'est pas affecter à un stage, liste tous les stages
			if (count($TblResultat) = 0){
				//Récupère les bonnes information de tous les stages
				$TblResultat = parent::BDRecherche("Select ID, Title, Score, Desc, SupID, Address, Postal from projects inner join 
													ratings on projects.ID = ratings.ProjectID Where ratings.InternID=".SESSION['ID']);
			}
			
			//Ouvre l'index du stagiaire en envoyant un tableau d'information
			parent::view('stagiaire/index', $TblResultat);
		}
		
		
		//Fonction permettant de donner une nouvelle note a un stage
		public function NoteTrain ($Note, $Train){
			$models->BDExecute("UPDATE ratings SET Score=".$Note."Where ProjectID=".$Train." and InternID=".SESSION['ID']);
		}
		
		//Fonction permenttant de récupérer la description du stage (Pour faire le Ajax sur les stages)
		/*
		public function DescrStage (int $Stage){
			return $models->BDExecute("Select Desc, SupID, Address, Postal from projects Where ID=".$Stage);
		}
		*/
		
		
		//Met à jour le journal de bord des étudiant
		public function SaveLog($Date, $Data){
			
			//Récupère la date passer en paramètre pour l'utiliser comme balise pour le XML
			$DateLog = strToTime($Date);
			$DateLog = date("d-M-Y", $DateLog);
			
			//Trouve le fichier XML de l'étudiant
			$File = $models->BDExecute(/*Sql trouver le fichier xml relié a l'étudiant*/);
			
			//Si un fichier à été trouver
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
		
		//Récupère les informations du journal de bord de l'étudiant
		public function LoadLog($Date){
			
			//Récupère la date passer en paramètre pour l'utiliser comme balise pour le XML
			$DateLog = strToTime($Date);
			$DateLog = date("d-M-Y", $DateLog);
			
			//Trouve le fichier XML de l'étudiant
			$File = $models->BDExecute(/*Sql trouver le fichier xml relié a l'étudiant*/);
			
			//Si un fichier à été trouver
			if (!empty($Fichier)){
				$Xml = simplexml_load_file($File);
				return $Xml->children($DateLog);
			}	
			else{ //Sinon envoie un message d'erreur
				echo ("Erreur 001- fichier Xml introuvable");
			}
		}
		
		
		//Permet de récupérer les informations de comptes
		public function LoadAccountData (){
			
		}
		
		//Permet de changer les informations de comptes
		public function SaveAccountData ($User, $PWord){
			
		}
		
	}
	
?>