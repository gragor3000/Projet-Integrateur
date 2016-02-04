<?php

class Coordonnateur extends Controller
{
    private $account;//pointe vers la classe model

    //Constructeur de la classe
    public function __construct()
    {
        session_start();
        parent::model("models");
        $this->account = new account();
    }

    //Fonction appeler par défaut
    public function index($name = '')
    {

		//Ouvre l'index du coordonnateur
		parent::view('coordonnateur/index');
    }
	
	//Fonction permettant d'atteindre les differente page de la section
		public function Access($PageWanting = 0){
			
			switch ($PageWanting){
				case 0:
					index();
					break;
				case 1:
					parent::view('coordonnateur/compte');
					break;
				case 2:
					parent::view('superviseur/rapport');
					break;
			}
		}

    //valide un compte
    public function AccepterCompte($id)
    {
        $this->account->ValidateAccount($id);
    }

    //ajoute un compte dans la bd
    public function CreateUser($firstName, $lastName, $pw, $email, $tel, $type)
    {
        $this->account->CreateUser($firstName, $lastName, $pw, $email, $tel, $type);
    }
	
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