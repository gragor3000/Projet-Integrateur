<?php

	class docs extends models{
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////// Intern ///////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		//Ajoute des �l�ment au journal de bord d'un �tudiant.
		public function SaveLog($_IDIntern, $_Entry)
		{
			//Cr�e le domDocument qui contiendra les informations du fichier XML
			$_Xml = new DomDocument("1.0", "ISO-8859-15");
			$_Root = $_Xml->createElement("Racine");
			$_Xml->appendChild($_Root);
			
			//Si le fichier souhaiter existe le charge en m�moire et r�cup�re toute les informations
			if (file_exists(parent::DefaultXMLPath.'journal_de_bord/'.$_IDIntern.'_JDB.xml')){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'journal_de_bord/'.$_IDIntern.'_JDB.xml',0,true);
				
				//Pour tout les �l�ments contenu dans le fichier XML, l'ajouter dans le prochain fichier XMl
				foreach($_Simple->children() as $Enfant){
					$_Log = $_Xml->createElement($Enfant->getName(),$Enfant);
					$_Root->appendChild($_Log);
				}
			}
			
			//Obtenir la date et l'heure courante, pour s'en servire comme balise.
			$_Date = date('M_dS_Y_H_i_s');
				
			//Ajoute le log au fichier xml et le sauvegarde
			$_Log = $_Xml->createElement($_Date, $_Entry);
			$_Root->appendChild($_Log);
			
			//Enregistre le fichier fichier.
			$_Xml->save(parent::DefaultXMLPath.'journal_de_bord/'.$_IDIntern.'_JDB.xml');
		}
		
		//Charge les journaux d'un �tudiant particulier
		public function LoadLog($_IDIntern)
		{		
			//D�claration du tableau dans lequelle sera stoqu� tous les log
			$obj = array();
			
			//Si le fichier souhaiter existe le charge en m�moire et r�cup�re toute les informations
			if (file_exists(parent::DefaultXMLPath.'journal_de_bord/'.$_IDIntern.'_JDB.xml')){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'journal_de_bord/'.$_IDIntern.'_JDB.xml',0,true);
				
				//Pour tout les �l�ments contenu dans le fichier XML, l'ajouter dans le tableau $obj
				foreach($_Simple->children() as $Enfant){
					$obj[$Enfant->getName()] = (string)$Enfant;
				}
			}
			
			//Transforme les journeaux en objet utilisable et les retourne
			return $obj;
		}
		
		//Fonction qui v�rifie que le journal de bord existe
		public function ReadOnlyLog($_IDIntern){		
			return (file_exists(parent::DefaultXMLPath.'journal_de_bord/'.$_IDIntern.'_JDB.xml'));
		}
		
		//Fonction permetant de suprimer tous les dossiers reli�s � un �tudiant
		public function DeleteXML($_IDIntern){
			
			if (file_exists(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_RPT.xml')){
				unlink(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_RPT.xml');
			}
			
			if (file_exists(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_CieEVL.xml')){
				unlink(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_CieEVL.xml');
			}
			
			if (file_exists(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_AdvRev1EVL.xml')){
				unlink(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_AdvRev1EVL.xml');
			}
			
			if (file_exists(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_AdvRev2EVL.xml')){
				unlink(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_AdvRev2EVL.xml');
			}
			
			if (file_exists(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_JDB.xml')){
				unlink(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_JDB.xml');
			}
		}
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////////////////////////////////////// Rapport ////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		//Fonction qui v�rifie que le supervisseur peut modifier une section precise
		public function ReadOnlyCie($_IDIntern, $_BaliseName){
			//Si le fichier existe v�rifier que la section n'est pas d�j� rempli
			if (file_exists(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_RPT.xml')){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_RPT.xml',0,true);
				
				//trouve la balise sp�cifi� en param�tre et s'assure que la balise retourner porte le bon nom
				return ($_Simple->children()->getName($_BaliseName) == $_BaliseName);
			}else{
				return false;
			}	
		}
		
		//Ajoute des �l�ment au rapport d'un �tudiant.
		public function SaveCie($_IDEmployeur, $_BaliseName, $_Entry)
		{
			
			//Cr�e le domDocument qui contiendra les informations du fichier XML
			$_Xml = new DomDocument("1.0", "ISO-8859-15");
			$_Root = $_Xml->createElement("Racine");
			$_Xml->appendChild($_Root);
			
			//Si le fichier souhaiter existe le charge en m�moire et r�cup�re toute les informations
			if (file_exists(parent::DefaultXMLPath.'rapport/'.$_Entry['intern'].'_RPT.xml')){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'rapport/'.$_Entry['intern'].'_RPT.xml',0,true);
				
				//Pour tout les �l�ments contenu dans le fichier XML, l'ajouter dans le prochain fichier XMl
				foreach($_Simple->children() as $Enfant){
					
					$_Report = $_Xml->createElement($Enfant);
					
					//Pour tout ce que contienne les �l�ments
					foreach($Enfant->children() as $Contenu){
						$_Content = $_Xml->createElement($Contenu->getName(), $Contenu);
						$_Report->appendChild($_Content);
					}
					$_Root->appendChild($_Report);
				}
			}
				
			//Ajoute le nouveau raport au fichier xml et le sauvegarde OK
			$_Report = $_Xml->createElement($_BaliseName);
			$_Content = $_Xml->createElement("Employeur", $_IDEmployeur);
			$_Report->appendChild($_Content);
			current($_Entry);
			for($iTour = 0; $iTour < count($_Entry)-1; $iTour++){
				$_Content = $_Xml->createElement(key($_Entry), $_Entry[key($_Entry)]);
				$_Report->appendChild($_Content);
				next($_Entry);
			}			
			$_Root->appendChild($_Report);
			
			//Enregistre le fichier fichier.
			$_Xml->save(parent::DefaultXMLPath.'rapport/'.$_Entry['intern'].'_RPT.xml');
		}
		
		
		//Charge les rapports d'un �tudiant particulier
		public function LoadCie($_IDIntern, $_BaliseName)
		{		
			//D�claration du tableau dans lequelle sera stoqu� tous les rapports
			$obj = array();
			
			//Si le fichier souhaiter existe le charge en m�moire et r�cup�re toute les informations
			if (file_exists(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_RPT.xml')){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'rapport/'.$_IDIntern.'_RPT.xml',0,true);
				
				//Pour tout les �l�ments contenu dans le fichier XML, sous la balise pass� en param�tre, l'ajouter dans le tableau $obj
				foreach($_Simple->children() as $Enfant){
					if($Enfant->getName() == $_BaliseName){
						foreach($Enfant->children() as $Info){
							$obj[$Info->getName()] = (string)$Info;
						}
					}
				}
			}
			
			$Result = new obj($obj);
			
			//Transforme les journeaux en objet utilisable et les retourne
			return $Result;
		}
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////// Evaluation ////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
		//Fonction qui v�rifie que le supervisseur peut modifier une section precise
		public function ReadOnlyAdvisor($_IDIntern, $_BaliseName){
			$extension = null; //extension
		    if($_BaliseName == "cieReview"){$extension = '_CieEVL.xml'; }
			if($_BaliseName == "review1"){$extension = '_AdvRev1EVL.xml';}
			if($_BaliseName == "review2"){$extension = '_AdvRev2EVL.xml';}
			
			//Si le fichier existe v�rifier que la section n'est pas d�j� rempli
			if (file_exists(parent::DefaultXMLPath.'evaluation/'.$_IDIntern.$extension))
			{
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'evaluation/'.$_IDIntern.$extension,0,true);
				
				//trouve la balise sp�cifi� en param�tre et s'assure que la balise retourner porte le bon nom
				return ($_Simple->children()->getName($_BaliseName) == $_BaliseName);
			}
			else
			{
				return false;
			}	
		}
		
				//Ajoute des �l�ment au rapport d'un �tudiant pour un coordonnateur.
		public function SaveAdvisor($_ID, $_BaliseName, $_Entry)
		{		
		    $extension = null; //extension
			$Nom = null;   //nom de la balise
			
		    if($_BaliseName == "cieReview"){$extension = '_CieEVL.xml'; $Nom = "Employeur";}
			if($_BaliseName == "review1"){$extension = '_AdvRev1EVL.xml';$Nom = "Coordonnateur";}
			if($_BaliseName == "review2"){$extension = '_AdvRev2EVL.xml';$Nom = "Coordonnateur";}
			
			//Cr�e le domDocument qui contiendra les informations du fichier XML
			$_Xml = new DomDocument("1.0", "ISO-8859-15");
			$_Root = $_Xml->createElement("Racine");
			$_Xml->appendChild($_Root);
			
			//Si le fichier souhaiter existe le charge en m�moire et r�cup�re toute les informations
			if (file_exists(parent::DefaultXMLPath.'evaluation/'.$_Entry['intern'].'_EVL.xml')){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'evaluation/'.$_Entry['intern'].$extension,0,true);
				
				//Pour tout les �l�ments contenu dans le fichier XML, l'ajouter dans le prochain fichier XMl
				foreach($_Simple->children() as $Enfant){
					
					$_Report = $_Xml->createElement($Enfant);
					
					//Pour tout ce que contienne les �l�ments
					foreach($Enfant->children() as $Contenu){
						$_Content = $_Xml->createElement($Contenu->getName(), $Contenu);
						$_Report->appendChild($_Content);
					}
					$_Root->appendChild($_Report);
				}
			}
				
			//Ajoute le nouveau rapport au fichier xml et le sauvegarde OK
			$_Report = $_Xml->createElement($_BaliseName);
			$_Content = $_Xml->createElement($Nom, $_ID);
			$_Report->appendChild($_Content);
			current($_Entry);
			for($iTour = 0; $iTour < count($_Entry)-1; $iTour++){
				$_Content = $_Xml->createElement(key($_Entry), $_Entry[key($_Entry)]);
				$_Report->appendChild($_Content);
				next($_Entry);
			}			
			$_Root->appendChild($_Report);
			
			//Enregistre le fichier.
			$_Xml->save(parent::DefaultXMLPath.'evaluation/'.$_Entry['intern'].$extension);
		}
				
		
		//Charge les rapports d'un �tudiant particulier
		public function LoadAdvisor($_IDIntern, $_BaliseName)
		{		
		    $extension = null; //extension
		    if($_BaliseName == "cieReview"){$extension = '_CieEVL.xml'; }
			if($_BaliseName == "review1"){$extension = '_AdvRev1EVL.xml';}
			if($_BaliseName == "review2"){$extension = '_AdvRev2EVL.xml';}
			
			//D�claration du tableau dans lequelle sera stoqu� tous les rapports
			$obj = array();
			
			//Si le fichier souhaiter existe le charge en m�moire et r�cup�re toute les informations
			if (file_exists(parent::DefaultXMLPath.'evaluation/'.$_IDIntern.$extension)){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'evaluation/'.$_IDIntern.$extension,0,true);
				
				//Pour tout les �l�ments contenu dans le fichier XML, sous la balise pass� en param�tre, l'ajouter dans le tableau $obj
				foreach($_Simple->children() as $Enfant){
					if($Enfant->getName() == $_BaliseName){
						foreach($Enfant->children() as $Info){
							$obj[$Info->getName()] = (string)$Info;
						}
					}
				}
			}
			
			$Result = new obj($obj);
			//Transforme les journeaux en objet utilisable et les retourne
			return $Result;
		}		
	}
?>