<?php

class Coordonnateur extends Controller
{
    private $models;//pointe vers la classe model

    //Constructeur de la classe
    public function __construct()
    {
        session_start();
        parent::model("models");
        $this->models = new models();
    }

    //Fonction appeler par défaut
    public function index($name = '')
    {

		//Ouvre l'index du coordonnateur
		parent::view('coordonnateur/index');
    }

    //valide un compte
    public function AccepterCompte($id)
    {
        $this->models->ValidateAccount($id);
    }

    //ajoute un compte dans la bd
    public function CreateUser($firstName, $lastName, $pw, $email, $tel, $type)
    {
        $this->models->CreateUser($firstName, $lastName, $pw, $email, $tel, $type);
    }
	
	//Fonction permettant de récupérer le rapport d'entrevu
	public function LoadReport($IDTrainer){
		
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
	}


}

?>