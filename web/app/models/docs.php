<?php

<<<<<<< HEAD
	class docs extends models{
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////// Log ///////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		//Ajoute des élément au journal de bord d'un étudiant.
		public function SaveLog($_IDIntern, $_Entry)
		{
			//Crée le domDocument qui contiendra les informations du fichier XML
			$_Xml = new DomDocument("1.0", "ISO-8859-15");
			$_Root = $_Xml->createElement("Racine");
			$_Xml->appendChild($_Root);
			
			//Si le fichier souhaiter existe le charge en mémoire et récupère toute les informations
			if (file_exists(parent::DefaultXMLPath.'journal_de_bord/'.$_IDIntern."_JDB.xml")){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'journal_de_bord/'.$_IDIntern."_JDB.xml",0,true);
				
				//Pour tout les éléments contenu dans le fichier XML, l'ajouter dans le prochain fichier XMl
				foreach($_Simple->children() as $Enfant){
					$_Log = $_Root->createElement($Enfant->getName(),$Enfant);
					$_Root->appendChild($_Log);
				}
			}
			
			//Obtenir la date et l'heure courante, pour s'en servire comme balise.
			$_Date = date();
				
			//Ajoute le log au fichier xml et le sauvegarde
			$_Log = $_Xml->createElement($_Date, $_Entry);
			$_Root->appendChild($_Log);
			
			//Enregistre le fichier fichier.
			$_Xml->save($DefaultXMLPath.'/journal_de_bord/'.$_IDIntern."_JDB.xml");
		}
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////////////////////////////////////// Rapport ////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		//Fonction qui vérifie que le supervisseur peut modifier une section precise
		public function ReadOnlyCie($_IDIntern, $_BaliseName){
			
			//Si le fichier existe vérifier que la section n'est pas déjà rempli
			if (file_exists(parent::DefaultXMLPath.'rapport/'.$_IDIntern."_RPT.xml")){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'rapport/'.$_IDIntern."_RPT.xml",0,true);
				
				//trouve la balise spécifié en paramètre et s'assure que la balise retourner porte le bon nom
				return ($_Simple->children()->getName($_BaliseName) == $_BaliseName);
			}else{
				return true;
			}	
		}
		
		
		//Fonction permettant de sauvegarde un document du superviseur
		public function SaveCie($_IDIntern, $_BaliseName, $_Data){
			
			//Crée le domDocument qui contiendra les informations du fichier XML
			$_Xml = new DomDocument("1.0", "ISO-8859-15");
			$_Root = $_Xml->createElement("Racine");
			$_Xml->appendChild($_Root);
			
			//Si le fichier souhaiter existe le charge en mémoire et récupère toute les informations
			if (file_exists(parent::DefaultXMLPath.'rapport/'.$_IDIntern."_RPT.xml")){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'rapport/'.$_IDIntern."_RPT.xml",0,true);
				
				//Pour tout les éléments contenu dans le fichier XML, l'ajouter dans le prochain fichier XMl
				foreach($_Simple->children() as $Enfant){
					$_Report = $_Root->createElement($Enfant->getName(),$Enfant);
					$_Root->appendChild($_Report);
				}
			}
			
			//Ajoute le nouveau raport dans le fichier					
			$_Report = $_Root->createElement($_BaliseName, $_Data);
			$_Root->appendChild($_Report);
			
			//Enregistre le fichier
			$_Xml->save($DefaultXMLPath.'/rapport/'.$_IDIntern."_RPT.xml");
		}
		
		
		/*À faire*/
		//Fonction permettant de charger un document du superviseur
		public function LoadCie($_IDIntern, $_BaliseName){
			
			$_ArraysResult = Array();		//Contient les informations contenue dans le fichier XML
			
			//Si le fichier souhaiter existe le charge en mémoire et récupère toute les informations
			if (file_exists(parent::DefaultXMLPath.'rapport/'.$_IDIntern."_RPT.xml")){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'rapport/'.$_IDIntern."_RPT.xml",0,true);				
				
				$iTour = 0;			//Contient l'eindice du tableau
				//Recupère toute les informations
				foreach($_Xml->children() as $_Element){
								
					$_ArraysResult[$iTour] = (string) $_Element;
					$iTour++;
				}
			}
			
			return ($_ArraysResult);
		}
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////// Evaluation ////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
		//Fonction qui vérifie que le supervisseur peut modifier une section precise
		public function ReadOnlyAdvisor($_IDIntern, $_BaliseName){
			
			//Si le fichier existe vérifier que la section n'est pas déjà rempli
			if (file_exists(parent::DefaultXMLPath.'evaluation/'.$_IDIntern."_EVL.xml")){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'evaluation/'.$_IDIntern."_EVL.xml",0,true);
				
				//trouve la balise spécifié en paramètre et s'assure que la balise retourner porte le bon nom
				return ($_Simple->children()->getName($_BaliseName) == $_BaliseName);
			}else{
				return true;
			}	
		}
		
		
		//Fonction permettant de sauvegarde un document du superviseur
		public function SaveAdvisor($_IDIntern, $_BaliseName, $_Data){
			
			//Crée le domDocument qui contiendra les informations du fichier XML
			$_Xml = new DomDocument("1.0", "ISO-8859-15");
			$_Root = $_Xml->createElement("Racine");
			$_Xml->appendChild($_Root);
			
			//Si le fichier souhaiter existe le charge en mémoire et récupère toute les informations
			if (file_exists(parent::DefaultXMLPath.'evaluation/'.$_IDIntern."_EVL.xml")){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'evaluation/'.$_IDIntern."_EVL.xml",0,true);
				
				//Pour tout les éléments contenu dans le fichier XML, l'ajouter dans le prochain fichier XMl
				foreach($_Simple->children() as $Enfant){
					$_Report = $_Root->createElement($Enfant->getName(),$Enfant);
					$_Root->appendChild($_Report);
				}
			}
			
			//Ajoute le nouveau raport dans le fichier					
			$_Report = $_Root->createElement($_BaliseName, $_Data);
			$_Root->appendChild($_Report);
			
			//Enregistre le fichier
			$_Xml->save(parent::DefaultXMLPath.'evaluation/'.$_IDIntern."_EVL.xml");
		}
		
		
		/*À faire*/
		//Fonction permettant de charger un document du superviseur
		public function LoadAdvisor($_IDIntern, $_BaliseName){
			
			$_ArraysResult = Array();		//Contient les informations contenue dans le fichier XML
			
			//Si le fichier souhaiter existe le charge en mémoire et récupère toute les informations
			if (file_exists(parent::DefaultXMLPath.'evaluation/'.$_IDIntern."_EVL.xml")){
				$_Simple = new SimpleXmlElement(parent::DefaultXMLPath.'evaluation/'.$_IDIntern."_EVL.xml",0,true);				
				
				$iTour = 0;			//Contient l'eindice du tableau
				//Recupère toute les informations
				foreach($_Xml->children() as $_Element){
								
					$_ArraysResult[$iTour] = (string) $_Element;
					$iTour++;
				}
			}
			
			return ($_ArraysResult);
		}
	}
=======
class docs extends models {

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////// Log ///////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Ajoute des ï¿½lï¿½ment au journal de bord d'un ï¿½tudiant.
    public function SaveLog($_IDIntern, $_Entry) {
        //Crï¿½e le domDocument qui contiendra les informations du fichier XML
        $_Xml = new DomDocument("1.0", "ISO-8859-15");
        $_Root = $_Xml->createElement("Racine");
        $_Xml->appendChild($_Root);

        //Si le fichier souhaiter existe le charge en mï¿½moire et rï¿½cupï¿½re toute les informations
        if (file_exists(parent::DefaultXMLPath . 'journal_de_bord/' . $_IDIntern . "_JDB.xml")) {
            $_Simple = new SimpleXmlElement(parent::DefaultXMLPath . 'journal_de_bord/' . $_IDIntern . "_JDB.xml", 0, true);

            //Pour tout les ï¿½lï¿½ments contenu dans le fichier XML, l'ajouter dans le prochain fichier XMl
            foreach ($_Simple->children() as $Enfant) {
                $_Log = $_Root->createElement($Enfant->getName(), $Enfant);
                $_Root->appendChild($_Log);
            }
        }

        //Obtenir la date et l'heure courante, pour s'en servire comme balise.
        $_Date = date();

        //Ajoute le log au fichier xml et le sauvegarde
        $_Log = $_Xml->createElement($_Date, $_Entry);
        $_Root->appendChild($_Log);

        //Enregistre le fichier fichier.
        $_Xml->save($DefaultXMLPath . '/journal_de_bord/' . $_IDIntern . "_JDB.xml");
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////// Rapport ////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Fonction qui vï¿½rifie que le supervisseur peut modifier une section precise
    public function ReadOnlyReport($_IDIntern, $_BaliseName) {

        //Si le fichier existe vï¿½rifier que la section n'est pas dï¿½jï¿½ rempli
        if (file_exists(parent::DefaultXMLPath . 'rapport/' . $_IDIntern . "_RPT.xml")) {
            $_Simple = new SimpleXmlElement(parent::DefaultXMLPath . 'rapport/' . $_IDIntern . "_RPT.xml", 0, true);

            //trouve la balise spï¿½cifiï¿½ en paramï¿½tre et s'assure que la balise retourner porte le bon nom
            return ($_Simple->children()->getName($_BaliseName) == $_BaliseName);
        } else {
            return true;
        }
    }

    //Fonction permettant de sauvegarde un document du superviseur
    public function SaveReport($_IDIntern, $_BaliseName, $_Data) {

        //Crï¿½e le domDocument qui contiendra les informations du fichier XML
        $_Xml = new DomDocument("1.0", "ISO-8859-15");
        $_Root = $_Xml->createElement("Racine");
        $_Xml->appendChild($_Root);

        //Si le fichier souhaiter existe le charge en mï¿½moire et rï¿½cupï¿½re toute les informations
        if (file_exists(parent::DefaultXMLPath . 'rapport/' . $_IDIntern . "_RPT.xml")) {
            $_Simple = new SimpleXmlElement(parent::DefaultXMLPath . 'rapport/' . $_IDIntern . "_RPT.xml", 0, true);

            //Pour tout les ï¿½lï¿½ments contenu dans le fichier XML, l'ajouter dans le prochain fichier XMl
            foreach ($_Simple->children() as $Enfant) {
                $_Report = $_Root->createElement($Enfant->getName(), $Enfant);
                $_Root->appendChild($_Report);
            }
        }

        //Ajoute le nouveau raport dans le fichier					
        $_Report = $_Root->createElement($_BaliseName, $_Data);
        $_Root->appendChild($_Report);

        //Enregistre le fichier
        $_Xml->save($DefaultXMLPath . '/rapport/' . $_IDIntern . "_RPT.xml");
    }

    /* ï¿½ faire */

    //Fonction permettant de charger un document du superviseur
    public function LoadReport($_IDIntern, $_BaliseName) {

        $_ArraysResult = Array();  //Contient les informations contenue dans le fichier XML
        //Si le fichier souhaiter existe le charge en mï¿½moire et rï¿½cupï¿½re toute les informations
        if (file_exists(parent::DefaultXMLPath . 'rapport/' . $_IDIntern . "_RPT.xml")) {
            $_Simple = new SimpleXmlElement(parent::DefaultXMLPath . 'rapport/' . $_IDIntern . "_RPT.xml", 0, true);

            $iTour = 0;   //Contient l'eindice du tableau
            //Recupï¿½re toute les informations
            foreach ($_Xml->children() as $_Element) {

                $_ArraysResult[$iTour] = (string) $_Element;
                $iTour++;
            }
        }

        return ($_ArraysResult);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////// Evaluation ////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Fonction qui vï¿½rifie que le supervisseur peut modifier une section precise
    public function ReadOnlyAdvisor($_IDIntern, $_BaliseName) {

        //Si le fichier existe vï¿½rifier que la section n'est pas dï¿½jï¿½ rempli
        if (file_exists(parent::DefaultXMLPath . 'evaluation/' . $_IDIntern . "_EVL.xml")) {
            $_Simple = new SimpleXmlElement(parent::DefaultXMLPath . 'evaluation/' . $_IDIntern . "_EVL.xml", 0, true);

            //trouve la balise spï¿½cifiï¿½ en paramï¿½tre et s'assure que la balise retourner porte le bon nom
            return ($_Simple->children()->getName($_BaliseName) == $_BaliseName);
        } else {
            return true;
        }
    }

    //Fonction permettant de sauvegarde un document du superviseur
    public function SaveEval($_IDIntern, $_BaliseName, $_Data) {

        //Crï¿½e le domDocument qui contiendra les informations du fichier XML
        $_Xml = new DomDocument("1.0", "ISO-8859-15");
        $_Root = $_Xml->createElement("Racine");
        $_Xml->appendChild($_Root);

        //Si le fichier souhaiter existe le charge en mï¿½moire et rï¿½cupï¿½re toute les informations
        if (file_exists(parent::DefaultXMLPath . 'evaluation/' . $_IDIntern . "_EVL.xml")) {
            $_Simple = new SimpleXmlElement(parent::DefaultXMLPath . 'evaluation/' . $_IDIntern . "_EVL.xml", 0, true);

            //Pour tout les ï¿½lï¿½ments contenu dans le fichier XML, l'ajouter dans le prochain fichier XMl
            foreach ($_Simple->children() as $Enfant) {
                $_Report = $_Root->createElement($Enfant->getName(), $Enfant);
                $_Root->appendChild($_Report);
            }
        }

        //Ajoute le nouveau raport dans le fichier					
        $_Report = $_Root->createElement($_BaliseName, $_Data);
        $_Root->appendChild($_Report);

        //Enregistre le fichier
        $_Xml->save(parent::DefaultXMLPath . 'evaluation/' . $_IDIntern . "_EVL.xml");
    }

    /* ï¿½ faire */

    //Fonction permettant de charger un document du superviseur
    public function LoadEval($_IDIntern, $_BaliseName) {

        $_ArraysResult = Array();  //Contient les informations contenue dans le fichier XML
        //Si le fichier souhaiter existe le charge en mï¿½moire et rï¿½cupï¿½re toute les informations
        if (file_exists(parent::DefaultXMLPath . 'evaluation/' . $_IDIntern . "_EVL.xml")) {
            $_Simple = new SimpleXmlElement(parent::DefaultXMLPath . 'evaluation/' . $_IDIntern . "_EVL.xml", 0, true);

            $iTour = 0;   //Contient l'eindice du tableau
            //Recupï¿½re toute les informations
            foreach ($_Xml->children() as $_Element) {

                $_ArraysResult[$iTour] = (string) $_Element;
                $iTour++;
            }
        }

        return ($_ArraysResult);
    }

}

>>>>>>> origin/master
?>