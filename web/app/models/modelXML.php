<?php

	class modelXML extends models{
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////// Log ///////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		//Ajoute des élément au journal de bord d'un étudiant.
		public function SaveLog($_IDIntern, $_Entry)
		{
			//Sauvegarder le journal.
			try {//Trouve le fichier xml
				$_Xml = SimpleXml_load_file("../journal_de_bord/" . $_IDIntern . "_JDB.xml");
			}
			catch{ 
				//Créer nouveau fichier.
				$_Xml = new domxml_new_doc('1.0');
				$_Xml->save($DefaultXMLPath.'/journal_de_bord/'.$_IDIntern."_JDB.xml");
			}	
			
			//Obtenir la date et l'heure courante, pour s'en servire comme balise.
			$_Date = date();
				
			//Ajoute le log au fichier xml et le sauvegarde
			$_Log = $_Xml->createElement($_Date, $_Entry);
			$_Xml->prependChild($_Log);
			$_Xml->saveXML();
		}
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////////////////////////////////////// Rapport ////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		//Fonction qui vérifie que le supervisseur peut modifier une section precise
		public function ReadOnlyReport($_IDIntern, $_BaliseName){
			//Tante de trouver le fichier Xml
			try {
				$_Xml = SimpleXml_load_file(parent::DefaultXMLPath.'rapport/'.$_IDIntern."_RPT.xml");
			}
			catch{ //Si le fichier n'est pas trouver, en créer un nouveau
				$_Xml = new domxml_new_doc('1.0');
				$_Xml->save($DefaultXMLPath.'/rapport/'.$_IDIntern."_RPT.xml");
			}
			
			//Si la balise existe, le read only est vrai
			return (count($_Xml->children($_BaliseName)) > 0);	
		}
		
		
		//Fonction permettant de sauvegarde un document du superviseur
		public function SaveReport($_IDIntern, $_BaliseName, $_Data){
			
			//Tante de trouver le fichier Xml
			try {
				$_Xml = SimpleXml_load_file(parent::DefaultXMLPath.'rapport/'.$_IDIntern."_RPT.xml");
			}
			catch{ //Si le fichier n'est pas trouver, en créer un nouveau
				$_Xml = new domxml_new_doc('1.0');
				$_Xml->save($DefaultXMLPath.'/rapport/'.$_IDIntern."_RPT.xml");
			}
			
			//Tante d'enregistrer les nouvelle information
			try{
				//Crée un nouvelle enfant au fichier					
				$_Enfant = $_Xml->createElement($_BaliseName, $_Data);
					
				//Ajoute l'enfant à la base de donnée
				$_Xml->appendChild($_Enfant);
				
				//Enregistre les modifications
				$_Xml->saveXML();
			}catch{
				
			}
		}
		
		//Fonction permettant de charger un document du superviseur
		public function LoadReport($_IDIntern, $_BaliseName){
			
			//Tante de trouver le fichier Xml
			try {
				//Cherche le fichier XML
				$_Xml = SimpleXml_load_file(parent::DefaultXMLPath.'rapport/'.$_IDIntern."_RPT.xml");
				
				//récupère l'enfant voulu
				return $_Xml->children($_BaliseName);
			}
			catch{}
		}
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////// Evaluation ////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		
		//Fonction qui vérifie que le coordonnateur peut modifier une section precise
		public function ReadOnlyEvalution($_IDIntern, $_BaliseName){
			//Tante de trouver le fichier Xml
			try {
				$_Xml = SimpleXml_load_file(parent::DefaultXMLPath.'evaluation/'.$_IDIntern."_EVL.xml");
			}
			catch{ //Si le fichier n'est pas trouver, en créer un nouveau
				$_Xml = new domxml_new_doc('1.0');
				$_Xml->save($DefaultXMLPath.'/evaluation/'.$_IDIntern."_EVL.xml");
			}
			
			//Si la balise existe, le read only est vrai
			return (count($_Xml->children($_BaliseName)) > 0);	
		}
		
		
		//Fonction permettant de sauvegarde un document du coordonnateur
		public function SaveEvaluation($_IDIntern, $_BaliseName, $_Data){
			
			//Tante de trouver le fichier Xml
			try {
				$_Xml = SimpleXml_load_file(parent::DefaultXMLPath.'evaluation/'.$_IDIntern."_EVL.xml");
			}
			catch{ //Si le fichier n'est pas trouver, en créer un nouveau
				$_Xml = new domxml_new_doc('1.0');
				$_Xml->save($DefaultXMLPath.'/evaluation/'.$_IDIntern."_EVL.xml");
			}
			
			//Tante d'enregistrer les nouvelle information
			try{
				//Crée un nouvelle enfant au fichier					
				$_Enfant = $_Xml->createElement($_BaliseName, $_Data);
					
				//Ajoute l'enfant à la base de donnée
				$_Xml->appendChild($_Enfant);
				
				//Enregistre les modifications
				$_Xml->saveXML();
			}catch{	}
		}
		
		//Fonction permettant de sauvegarde un document du coordonnateur
		public function LoadEvaluation($_IDIntern, $_BaliseName){
			
			//Tante de trouver le fichier Xml
			try {
				//Cherche le fichier XML
				$_Xml = SimpleXml_load_file(parent::DefaultXMLPath.'evaluation/'.$_IDIntern."_EVL.xml");
				
				//récupère l'enfant voulu
				return $_Xml->children($_BaliseName);
			}
			catch{}
		}
	}
?>