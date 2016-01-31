<?php

	class Stagiaire extends Controller{
		
		//Constructeur de la classe
		public function __construct(){
			session_start();
		}
		
		//Fonction appeler par d�faut
		public function index ( $name = '' ){
			
			//Cherche le stage affecter � l'�tudiant
			$TblResultat = parent::BDExecute("Select ID, Title, Desc, SupID, Address, Postal from projects where InternID =".SESSION['ID']);
			
			//Si le stagiaire n'est pas affecter � un stage, liste tous les stages
			if (count($TblResultat) = 0){
				//R�cup�re les bonnes information de tous les stages
				$TblResultat = parent::BDRecherche("Select ID, Title, Score, Desc, SupID, Address, Postal from projects inner join 
													ratings on projects.ID = ratings.ProjectID Where ratings.InternID=".SESSION['ID']);
			}
			
			//Ouvre l'index du stagiaire en envoyant un tableau d'information
			parent::view('stagiaire/index', $TblResultat);
		}
		
		
		//Fonction permettant de donner une nouvelle note a un stage
		public function NoterStage (int $Note, int $Stage){
			parent::BDExecute("UPDATE ratings SET Score=".$Note."Where ProjectID=".$Stage." and InternID=".SESSION['ID']);
		}
		
		//Fonction permenttant de r�cup�rer la description du stage (Pour faire le Ajax sur les stages)
		/*
		public function DescrStage (int $Stage){
			return parent::BDExecute("Select Desc, SupID, Address, Postal from projects Where ID=".$Stage);
		}
		*/
		
		
		//Met � jour le journal de bord des �tudiant
		public function SauvJournal(date $Date, string $Contenu){
			
			//R�cup�re la date passer en param�tre pour l'utiliser comme balise pour le XML
			$DateJournal = strToTime($Date);
			$DateJournal = date("d-M-Y", $DateJournal);
			
			//Trouve le fichier XML de l'�tudiant
			$Fichier = parent::BDExecute(/*Sql trouver le fichier xml reli� a l'�tudiant*/);
			
			//Si un fichier � �t� trouver
			if (!empty($Fichier)){
				$Xml = simplexml_load_file($Fichier);
				$Tag = $xml->createElement($DateJournal, $Contenu);
				$Xml->appendChild($Tag);
				$Xml->saveXML();
			}
			else{ //Sinon envoie un message d'erreur
				echo ("Erreur 001- fichier Xml introuvable");
			}	
		}
		
		//R�cup�re les informations du journal de bord de l'�tudiant
		public function ChargJournal(date $Date){
			
			//R�cup�re la date passer en param�tre pour l'utiliser comme balise pour le XML
			$DateJournal = strToTime($Date);
			$DateJournal = date("d-M-Y", $DateJournal);
			
			//Trouve le fichier XML de l'�tudiant
			$Fichier = parent::BDExecute(/*Sql trouver le fichier xml reli� a l'�tudiant*/);
			
			//Si un fichier � �t� trouver
			if (!empty($Fichier)){
				$Xml = simplexml_load_file($Fichier);
				return $Xml->children($DateJournal);
			}	
			else{ //Sinon envoie un message d'erreur
				echo ("Erreur 001- fichier Xml introuvable");
			}
		}
		
	}
	
?>