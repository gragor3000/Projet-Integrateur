<?php
	//Contrôleur d'acceuil.
	class home extends Controller{
		
		//Index par défaut.
		public function index ( $name = '' ){
			parent::model("account");
			$account = new account();
			
			//Obtenir les informations de compte.
			$info = $account.TokenLogin($_COOKIE['token']);
			
			if($info != null){
				//Sauvegarde des informations de connexion.
				setcookie("token", $_COOKIE['token'], time() + (86400 * 30), "/");
				$_SESSION["ID"]=$result['ID'];
				$_SESSION["name"]=$result['name'];
				$_SESSION["role"]=$result['group'];
				
				//Rediriger vers l'acceuil selon le groupe.
				switch($_SESSION["role"]){
					case 2: parent::view('intern/index'); break;
					case 1: parent::view('advisor/index'); break;
					case 0: parent::view('business/index'); break;
				}
			} else {
				//Afficher l'acceuil des visiteurs.
				parent::view('home/index')
			}
		}
		
		//Connexion de l'utilisateur.
		public function login(){
			parent::model("account");
			$account = new account();
			
			//Obtenir les informations de compte.
			$info = $account.UserLogin($_POST['user'], $_POST['pass']);
			
			if($info != null){
				//Sauvegarde des informations de connexion.
				setcookie("token", $result['token'], time() + (86400 * 30), "/");
				$_SESSION["ID"]=$result['ID'];
				$_SESSION["name"]=$result['name'];
				$_SESSION["role"]=$result['group'];
				
				//Rediriger vers l'acceuil selon le groupe.
				switch($_SESSION["role"]){
					case 2: parent::view('intern/index'); break;
					case 1: parent::view('advisor/index'); break;
					case 0: parent::view('business/index'); break;
				}
			} else {
				//Erreur de connexion.
				$data['error'] = "La connexion n'a pas pu &ecirc;tre &eacute;tabli."
				parent::view('home/index', $data)
			}
		}
		
		//Déconnexion de l'utilisateur.
		public function logout(){
			setcookie("token", '', time() - 1, '/');
			session_unset();
			session_destroy();
		}
	}
	
?>