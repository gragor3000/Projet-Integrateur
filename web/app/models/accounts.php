<?php

/*
  TokenGen : 			TESTER | FONCTIONNEL -> 2016-02-11 Marc Lauzon
  PassGen : 			TESTER | FONCTIONNEL -> 2016-02-11 Marc Lauzon
  CreateUser : 		TESTER | FONCTIONNEL -> 2016-02-11 Marc Lauzon
  UpdateUser :
  ShowAllUsers :
  ShowUsersByRank :
  ShowUserByID :
  UsernameExists : 	TESTER | FONCTIONNEL -> 2016-02-11 Marc Lauzon
  UpdatePW :
  DeleteUser :
  UserLogin : 		TESTER | FONCTIONNEL -> 2016-02-11 Marc Lauzon
  TokenLogin : 		TESTER | FONCTIONNEL -> 2016-02-11 Marc Lauzon
  Logout :
 */

class accounts extends models {

    //Génération de token.
    public function TokenGen() {
        //Création du token.
        $token = md5(uniqid(rand(), TRUE));

        //Vérification d'un doublon.
        $cmd = "SELECT token FROM users WHERE token='" . $token . "'";
        $result = parent::DBSearch($cmd);

        if ($result != null)
            $this->TokenGen();
        else
            return $token;
    }

    //Génération d'un mot de passe.
    public function PassGen() {
        //Création du token.
        $pass = md5(uniqid(rand(), TRUE));
        //var_dump(substr($pass, -10));
        return substr($pass, -10);
    }

    ////////////////// DÉBUT GESTION DE COMPTE ////////////////////
    //Création d'un compte.
    public function CreateUser($_name, $_user, $_pw, $_rank) { //100%.
        parent::DBExecute("INSERT INTO users (name,user,pw,rank)
							VALUES(
							'" . addslashes($_name) . "',
							'" . addslashes($_user) . "',
							'" . md5($_pw) . "',
							" . $_rank . ")");
    }

    //Mise à jour des information d'un compte.
    public function UpdateUser($_id, $_name, $_user) {
        parent::DBExecute("UPDATE users SET 
							name = '" . addslashes($_name) . "', 
							user ='" . addslashes($_user) . "'
							WHERE ID =" . $_id);
    }

    //Retourne tous les comptes.
    public function ShowAllUsers() {
        $result = parent::DBSearch("SELECT ID, name, user, rank FROM users");

        $obj = null;

        //Générer un tableau d'objet.
        foreach ($result as $user)
            $obj[$user['ID']] = new obj($user);

        return $obj;
    }

    //Retourne tous les comptes d'un type.
    public function ShowUsersByRank($_rank) {
        $result = parent::DBSearch("SELECT ID,name,user,rank FROM users WHERE rank =" . $_rank);

		$obj = null;
        //Générer un tableau d'objet.
        foreach ($result as $user)
            $obj[$user['ID']] = new obj($user);

        return $obj;
    }
	
    //Retourne les infos d'un compte par ID
    public function ShowUserByID($_userID) {
        return new obj(parent::DBQuery("SELECT ID,name,user,rank FROM users WHERE ID =" . $_userID));
    }

    //retourne les infos d'un compte par token
    public function ShowUserByToken($_userToken){
        return new obj(parent::DBQuery("SELECT ID,name,user,rank FROM users WHERE token =" . $_userToken));
    }

    //Valider l'existence du nomd e compte.
    public function UsernameExist($_name) {
        $result = parent::DBQuery("SELECT ID FROM users WHERE rank=0 AND user='" . $_name . "'");
        return ($result != NULL);
    }

    //Modifie le mot de passe d'un compte.
    public function UpdatePW($_id, $_pw) {
        parent::DBExecute("UPDATE users SET pw ='" . md5($_pw) . "' WHERE ID =" . $_id);
    }

    //Supprime un utilisateur.
    public function DeleteUser($_id) {
        parent::DBExecute("DELETE FROM users WHERE ID = " . $_id);
    }

    ////////////////// FIN GESTION DE COMPTE ////////////////////
    ////////////////// DÉBUT CONNEXION DE COMPTE ////////////////////
    //Connexion de l'utilisateur.
    public function UserLogin($_user, $_pw) {
        //Valider la connexion.
        $cmd = "SELECT ID, name, rank FROM users WHERE user='" . addslashes($_user) . "' AND pw='" . md5($_pw) . "'";
        $result = parent::DBQuery($cmd);

        if ($result != null) {
            //Génération du token.
            $token = $this->TokenGen();

            //Mise à jour de l'utilisateur.
            $cmd = "UPDATE users SET token= '" . $token . "' WHERE ID = " . $result['ID'];
            parent::DBExecute($cmd);

            //Ajouter token dans le résultat.
            $result['token'] = $token;
        }

        return $result;
    }

    //Connexion par token.
    public function TokenLogin($_token) {
        //Valider la connexion.
        $cmd = "SELECT ID, name, rank FROM users WHERE token = '" . $_token . "'";
        $result = parent::DBQuery($cmd);

        return $result;
    }

    //Déconnexion.
    public function Logout($_token) {
        $token = $this->TokenGen();

        //Mise à jour de l'utilisateur.
        $cmd = "UPDATE users SET token= " . $token . "WHERE token = " . $_token;
        parent::DBExecute($cmd);
    }

    ////////////////// FIN CONNEXION DE COMPTE ////////////////////
}
