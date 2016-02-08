<?php

	class modelXML extends models{
		
		//Ajoute des élément au journal de bord d'un étudiant.
		public function SaveLog($_IDIntern, $_Entry)
		{
			//Sauvegarder le journal.
			try {//Trouve le fichier xml
				$_Xml = simplexml_load_file("../files/" . $_IDIntern . "_JDB.xml");
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
		
		//Fonction qui vérifie que le supervisseur peut modifier une section precise
		public function ReadOnlyEntreprise($_IDEntreprise, $_BaliseName){
			//Tante de trouver le fichier Xml
			try {
				$_Xml = simplexml_load_file(parent::DefaultXMLPath.'rapport/'.$_IDEntreprise."_RPT.xml");
			}
			catch{ //Si le fichier n'est pas trouver, en créer un nouveau
				$_Xml = new domxml_new_doc('1.0');
				$_Xml->save($DefaultXMLPath.'/rapport/'.$_IDEntreprise."_RPT.xml");
			}
			
			//Si la balise existe, le read only est vrai
			return (count($_Xml->children($_BaliseName)) > 0);	
		}
		
		
		//Fonction permettant de r?cup?rer le rapport d'entrevu
		public function SaveReport($_IDEntreprise, $_BaliseName){
			
			//Tante de trouver le fichier Xml
			try {
				$_Xml = simplexml_load_file(parent::DefaultXMLPath.'rapport/'.$_IDEntreprise."_RPT.xml");
			}
			catch{ //Si le fichier n'est pas trouver, en créer un nouveau
				$_Xml = new domxml_new_doc('1.0');
				$_Xml->save($DefaultXMLPath.'/rapport/'.$_IDEntreprise."_RPT.xml");
			}
			
			//Tante d'enregistrer les nouvelle information
			try{
				//Contient toutes les données à enregistrer
				$_Data = array();
				
				//Boucle pour ajouter tout les éléments du poste dans un tableau
				foreach($_POST as $_Elem =>$_Valeur){
					array_push($_Data, $_Valeur);
				}
				
				//Crée un nouvelle enfant au fichier					
				$_Enfant = $_Xml->createElement($_BaliseName, $_Data);
					
				//Ajoute l'enfant à la base de donnée
				$_Xml->appendChild($_Enfant);
				
				//Enregistre les modifications
				$_Xml->saveXML();
			}catch{
				
			}
		}
		
		//Fonction permettant de r?cup?rer le rapport d'entrevu
		/*public function SaveEvaluation($IDTrainer){
			
			//Tante de trouver le fichier Xml
			try {
				$Xml = simplexml_load_file(parent::DefaultXMLPath.'evaluation/'. $IDTrainer."_EVL.xml");
				
				//R?cup?re la date passer en param?tre pour l'utiliser comme balise pour le XML
				$DateLog = strToTime($Date);
				$DateLog = date("d-M-Y", $DateLog);
					
				$Tag = $Xml->createElement($DateLog, $Data);
				$Xml->appendChild($Tag);
				$Xml->saveXML();
			}
			catch{ //Si le fichier n'est pas trouver, en cr?er un nouveau
				$Xml = new domxml_new_doc('1.0');
				$Xml->save($DefaultXMLPath.'/evaluation/'.$IDTrainer."_EVL.xml");
			}	
		}*/
		
		//Fonction permettant de récupérer le rapport d'entrevu
        /*public function LoadReport($IDTrainer){

            //Tante de trouver le fichier Xml
            try {
                $Xml = simplexml_load_file(parent::DefaultXMLPath.'rapport/'. $IDTrainer."_RPT.xml");

                //Récupère la date passer en paramètre pour l'utiliser comme balise pour le XML
                $DateLog = strToTime($Date);
                $DateLog = date("d-M-Y", $DateLog);

                $Tag = $Xml->createElement($DateLog, $Data);
                $Xml->appendChild($Tag);
                $Xml->saveXML();
            }
            catch{ //Si le fichier n'est pas trouver, en créer un nouveau
                $Xml = new domxml_new_doc('1.0');
                $Xml->save($DefaultXMLPath.'/rapport/'.$IDTrainer."_RPT.xml");
            }
        }

        //Fonction permettant de récupérer le rapport d'entrevu
        public function LoadEvaluation($IDTrainer){

            //Tante de trouver le fichier Xml
            try {
                $Xml = simplexml_load_file(parent::DefaultXMLPath.'evaluation/'. $IDTrainer."_EVL.xml");

                //Récupère la date passer en paramètre pour l'utiliser comme balise pour le XML
                $DateLog = strToTime($Date);
                $DateLog = date("d-M-Y", $DateLog);

                $Tag = $Xml->createElement($DateLog, $Data);
                $Xml->appendChild($Tag);
                $Xml->saveXML();
            }
            catch{ //Si le fichier n'est pas trouver, en créer un nouveau
                $Xml = new domxml_new_doc('1.0');
                $Xml->save($DefaultXMLPath.'/evaluation/'.$IDTrainer."_EVL.xml");
            }
        }*/
	}
?>