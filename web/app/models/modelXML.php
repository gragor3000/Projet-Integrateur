<?php

	class modelXML extends models{
		
		//Mettre à jour le journal de bord.
		public function SaveLog()
		{
			//Sauvegarder le journal.
			if(isset($_POST['savelog']) && isset($_POST['entry']))
			{
				try {
					//Rechercher le fichier.
					$xml = simplexml_load_file("../files/" . $_SESSION['ID'] . "_JDB.xml");
					
					//Obtenir la date et l'heure courante.
					$date = date();
						
					$tag = $xml->createElement($date, $_POST['entry']);
					$xml->prependChild($tag);
					$xml->saveXML();
				}
				catch{ 
					//Créer nouveau fichier.
					$Xml = new domxml_new_doc('1.0');
					$Xml->save($DefaultXMLPath.'/journal_de_bord/'.$_SESSION['ID']."_JDB.xml");
				}	
			}
		}
		
		
		//Fonction permettant de r?cup?rer le rapport d'entrevu
		public function SaveReport($_IDTrainer){
			
			//Tante de trouver le fichier Xml
			try {
				$Xml = simplexml_load_file(parent::DefaultXMLPath.'rapport/'.$IDTrainer."_RPT.xml");
			}
			catch{ //Si le fichier n'est pas trouver, en créer un nouveau
				$Xml = new domxml_new_doc('1.0');
				$Xml->save($DefaultXMLPath.'/rapport/'.$IDTrainer."_RPT.xml");
			}	
			
			//Tante d'enregistrer les nouvelle information
			try{
				
				//Boucle sur tout les éléments du poste
				foreach($_POST as $ =>$valeur){
					
				}
				
				//Crée un nouveau tag					
				$Tag = $Xml->createElement($DateLog, $Data);
				$Xml->appendChild($Tag);
				$Xml->saveXML();
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