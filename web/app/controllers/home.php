<?php
/*
2016-02-09 Marc Lauzon
INDEX [TERMINÉ]
LOGIN [TERMINÉ]
LOGOUT [TERMINÉ]
[TEST à faire]
*/

	//Contrôleur d'acceuil.
	class home extends Controller{
		
		//Index par défaut.
		public function index ( $name = '' ){
			parent::view('shared/header');
			
			parent::model("models");
			parent::model("accounts");
			$account = new accounts();
			
			//Obtenir les informations de compte.
			$info = (isset($_COOKIE['token'])) ? $account->TokenLogin($_COOKIE['token']) : null;
			
			if($info != null){
				//Sauvegarde des informations de connexion.
				setcookie("token", $_COOKIE['token'], time() + (86400 * 30), "/");
				$_SESSION["ID"]=$result['ID'];
				$_SESSION["name"]=$result['name'];
				$_SESSION["role"]=$result['group'];
				
				//Rediriger vers l'acceuil selon le groupe.
				switch($_SESSION["role"]){
					case 2:
						parent::view('intern/menu');
						parent::view('intern/index');
						break;
					case 1:
						parent::view('advisor/menu');
						parent::view('advisor/index');
						break;
					case 0:
						parent::view('cie/menu');
						parent::view('cie/index');
						break;
				}
			} else {
				//Afficher l'acceuil des visiteurs.
				parent::view('home/menu');
				parent::view('home/index');
			}
			parent::view('shared/footer');
		}
		
		//Connexion de l'utilisateur.
		public function login(){
			//Ajouter l'entête.
			parent::view('shared/header');
			
			parent::model("models");
			parent::model("accounts");
			$account = new accounts();
			
			//Obtenir les informations de compte.
			$result = $account->UserLogin($_POST['user'], $_POST['pass']);
			
			if(isset($result["token"])){
				//Sauvegarde des informations de connexion.
				setcookie("token", $result['token'], time() + (86400 * 30), "/");
				$_SESSION["ID"]=$result['ID'];
				$_SESSION["name"]=$result['name'];
				$_SESSION["role"]=$result['group'];
				
				//Rediriger vers le menu et l'acceuil selon le groupe.
				switch($_SESSION["role"]){
					case 2:	//stagiaire
						parent::view('intern/menu');
						parent::view('intern/index');
						break;
					case 1:	//superviseur
						parent::view('cie/menu');
						parent::view('cie/index');
						break;
					case 0:	//coordonnateur
						parent::view('advisor/menu');
						parent::view('advisor/index');
						break;
				}
			} else {
				//Afficher l'acceuil des visiteurs.
				parent::view('home/menu');
				parent::view('home/index');
			}
			//Ajouter le pied.
			parent::view('shared/footer');
		}
		
		//Déconnexion de l'utilisateur.
		public function logout(){
			setcookie("token", '', time() - 1, '/');
			session_unset();
			session_destroy();
		}
	}
	
?>