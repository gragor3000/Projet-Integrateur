<?php
/*
index : 		TESTER | FONCTIONNEL -> 2016-02-11 Marc Lauzon
login : 		TESTER | FONCTIONNEL -> 2016-02-11 Marc Lauzon
----> rediriger adéquatement. Manque les $data.
submitCie : 	TESTER | FONCTIONNEL -> 2016-02-11 Marc Lauzon
logout :		TESTER | FONCTIONNEL -> 2016-02-11 Marc Lauzon
----> rediriger logout vers l'acceuil.
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
			$result = (isset($_COOKIE['token'])) ? $account->TokenLogin($_COOKIE['token']) : null;
			var_dump($result);
			
			if(isset($result)){
				//Sauvegarde des informations de connexion.
				setcookie("token", $_COOKIE['token'], time() + (86400 * 30), "/");
				$_SESSION["ID"]=$result['ID'];
				$_SESSION["name"]=$result['name'];
				$_SESSION["role"]=$result['rank'];
				
				//Rediriger vers l'acceuil selon le groupe.
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
			$result = $account->UserLogin($_POST['logUser'], $_POST['logPass']);
			
			if(isset($result["token"])){
				//Sauvegarde des informations de connexion.
				setcookie("token", $result['token'], time() + (86400 * 30), "/");
				$_SESSION["ID"]=$result['ID'];
				$_SESSION["name"]=$result['name'];
				$_SESSION["role"]=$result['rank'];
				
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

		//Ajouter une compagnie
		public function submitCie()
		{
			//Ajouter l'entête.
			parent::view('shared/header');
			parent::view('home/menu');
			
			parent::model("models");
			parent::model("business");
			parent::model("accounts");

			$business = new business();
			$user = new accounts();

			if($user->UsernameExist($_POST["user"]))
				$_POST["user"] = $user->PassGen();
				
			try{
				$user->CreateUser($_POST["name"], $_POST["user"], $user->PassGen(), 1);
				$business->CreateBusiness($_POST["address"], $_POST["city"], $_POST["tel"], $_POST["email"], $user->DBLastInsertedID('users'));
				$data['message'] = "L'entreprise a été soumis aux coordonnateurs de stage. Merci de votre participation.";
			}
			catch(PDOException $e){ echo($e); }
			
			parent::view('home/index');
			parent::view('shared/footer');
		}
		
		//Déconnexion de l'utilisateur.
		public function logout(){
			setcookie("token", '', time() - 1, '/');
			session_unset();
			session_destroy();
			
			//Redirigé vers l'acceuil.
		}
	}
	
?>