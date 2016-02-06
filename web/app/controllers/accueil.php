<?php
<<<<<<< HEAD
	//Contrôleur d'acceuil.
	class home extends Controller{
=======

	class accueil extends Controller{
>>>>>>> origin/master
		
		//Index par défaut.
		public function index ( $name = '' ){
			parent::model("account");
			$account = new account();
			
			$info = $account.TokenLogin($_COOKIE['token']);
			
			//Ouvre l'index du de l'acceuil
			parent::view('accueil/index', $TblResultat);
		}
		
		//Connexion de l'utilisateur.
		public function login(){
			parent::model("account");
			$account = new account();
			
			$info = $account.UserLogin($_POST['user'], $_POST['pass']);
			
			//expire apres une journee et sur tout le domaine
			setcookie("token", $result['token'], time() + (86400 * 30), "/");
			$_SESSION["role"]=$result['group'];
		}
		
		//Déconnexion de l'utilisateur.
		public function logout(){
			setcookie("token", '', -1, '/');
			session_unset();
			session_destroy();
		}
	}
	
?>