<?php
//Contrôleur d'acceuil.
class home extends Controller {

    public function __construct() {
        parent::model("models");
    }

    //Index par défaut.
    public function index($name = '') {
        parent::view('shared/header');

        parent::model("accounts");
        $account = new accounts();

        //Obtenir les informations de compte.
        $result = (isset($_COOKIE['token'])) ? $account->TokenLogin($_COOKIE['token']) : null;

        if ($result != null) {
            //Sauvegarde des informations de connexion.
            setcookie("token", $_COOKIE['token'], time() + (86400 * 30), "/");
            $_SESSION["ID"] = $result['ID'];
            $_SESSION["name"] = $result['name'];
            $_SESSION["role"] = $result['rank'];

            //Rediriger vers l'acceuil selon le groupe.
            switch ($_SESSION["role"]) {
                case 2: //stagiaire
                    header('location:/intern/index');
                    break;
                case 1: //superviseur
                    header('location:/cie/index');
                    break;
                case 0: //coordonnateur
                    header('location:/advisor/index');
                    break;
            }
        } else {
            //Afficher l'acceuil des visiteurs.
            parent::view('home/menu');
            parent::view('home/index');
            parent::view('shared/footer');
        }
    }

    //Connexion de l'utilisateur.
    public function login() {
        //Ajouter l'entête.
        parent::view('shared/header');

        parent::model("accounts");
        $account = new accounts();

        //Obtenir les informations de compte.
        $result = $account->UserLogin($_POST['logUser'], $_POST['logPass']);

        if ($result != null) {
            //Sauvegarde des informations de connexion.
            setcookie("token", $result['token'], time() + (86400 * 30), "/");
            $_SESSION["ID"] = $result['ID'];
            $_SESSION["name"] = $result['name'];
            $_SESSION["role"] = $result['rank'];

            //Rediriger vers le menu et l'acceuil selon le groupe.
            switch ($_SESSION["role"]) {
                case 2: //stagiaire
                    header('location:/intern/index');
                    break;
                case 1: //superviseur
                    header('location:/cie/index');
                    break;
                case 0: //coordonnateur
                    header('location:/advisor/index');
                    break;
            }
        } else {
            $data['alert'] = "alert-danger";
            $data['message'] = "La connexion n'a pas pu être autentifiée. Veuillez réessayer.";
            //Afficher l'acceuil des visiteurs.
            parent::view('home/menu');
            parent::view('home/index', $data);
            parent::view('shared/footer');
        }        
    }

    //Ajouter une compagnie
    public function submitCie() {

        parent::model("business");
        parent::model("accounts");

        $business = new business();
        $user = new accounts();

          
		if(!($business->EmailExist($_POST["email"]))) //Vérifier que le email n'existe pas déjà
		{
			if (($user->UsernameExist($_POST["user"]) || $_POST["user"] == ""))
            $_POST["user"] = $user->PassGen();

            try 
			{
                $user->CreateUser($_POST["name"], $_POST["user"], $user->PassGen(), 1);
                $business->CreateBusiness($_POST["address"], $_POST["city"], $_POST["tel"], $_POST["email"], $user->DBLastInsertedID('users'));
            
                $data['alert'] = "alert-success";
                $data['message'] = "L'entreprise a été soumise aux coordonnateurs de stage. Merci de votre participation.";
            } 
			catch (PDOException $e) 
			{
               $data['alert'] = "alert-warning";
               $data['message'] = "L'entreprise n'a pu être soumise aux coordonnateurs de stage. Veuillez réessayer.";
            }
		}
		else			
		{
			$data['alert'] = "alert-warning";
            $data['message'] = "Une entreprise avec ce même email existe déjà.";
		}

        parent::view('shared/header');
        parent::view('home/menu');
        parent::view('home/index', $data);
        parent::view('shared/footer');
    }

    //Déconnexion de l'utilisateur.
    public function logout() {
        setcookie("token", '', time() - 1, '/');
        session_unset();
        session_destroy();

        //Message d'alerte.
        $data['alert'] = "alert-success";
        $data['message'] = "Vous avez été déconnectés avec succès.";
        
        parent::view('shared/header');
        parent::view('home/menu');
        parent::view('home/index', $data);
        parent::view('shared/footer');
    }

}

?>