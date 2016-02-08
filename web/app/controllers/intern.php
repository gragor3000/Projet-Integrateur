<?php

if (isset($_COOKIE['token'])
	&& isset($_SESSION['ID'])
	&& isset($_SESSION["role"])
	&& $_SESSION["role"] == 0)
{
	class intern extends Controller{
		
		//Index par défaut.
		public function index ()
		{			
			parent::model("projets");
			$projects = new projets();
			
			//Obtenir le projet assigné.
			$data['project'] = $projects->ShowProject($_SESSION['ID']);
			$data['assigner'] = ($data['project'] != null);
			
			//Sinon obtenir tous les projets.
			if($data['project'] == null) $project = $projects->ShowActive();
			
			//Obtenir le journal de bord.
			$path = "../files/" . $_SESSION['ID'] . "_JDB.xml";
			if(file_exists($path) $data['logbook'] = $path;

			parent::view('intern/index', $data);
		}

		//Afficher les informations du compte.
		public function info ()
		{
			parent::model("accounts");
			$accounts = new accounts();
			
			//Changer le mot de passe.
			if(isset($_POST['updatepw']))
			{
				$accounts->UpdatePw($_pass, $_SESSION['ID'])
			}
			
			//Obtenir information du compte.
			$data['account'] = $accounts->ShowUser($_SESSION['ID']);
			
			parent::view('intern/info', $data);
		}
	}
} else {
	//Rediriger vers l'acceuil.
    session_unset();
    session_destroy();
    header("location: " . $_SERVER['SERVER_ADDR']);
}

?>