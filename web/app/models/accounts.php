<?php
/*
2016-02-10 Marc Lauzon, Sam Baker
RÉVISÉ.
*/

class accounts extends models
{
    //Génération de token.
    public function TokenGen()
    {
		//Création du token.
        $token = md5(uniqid(rand(), TRUE));

		//Vérification d'un doublon.
        $cmd = "SELECT token FROM users WHERE token='" . $token . "'";
        $result = $this->DBSearch($cmd);

        if($result == null)
			TokenGen();
		else
			return $token;
    }
	
	//Génération d'un mot de passe.
	public function PassGen()
	{
		//Création du token.
        $pass = md5(uniqid(rand(), TRUE));
		
		return substr($pass, -10);
	}
	
	////////////////// DÉBUT GESTION DE COMPTE ////////////////////
	
	//Création d'un compte.
    public function CreateUser($_name, $_user, $_pw, $_rank)
    {
        parent::DBExecute("INSERT INTO users (name,user,pw,rank)
							VALUES(
							'" . addslashes($_name) . "',
							'" . addslashes($_user) . "',
							'" . md5($_pw) . "',
							" . $_rank . ")");
    }
	
	//Mise à jour des information d'un compte.
    public function UpdateUser($_id,$_name,$_user,$_rank)
    {
        parent::DBExecute("UPDATE users SET 
							name = '" . addslashes($_name) . "', 
							user ='" . addslashes($_user) . "',
							rank =" . $_rank . "
							WHERE ID =" . $_id);
    }

    //Retourne tous les comptes.
    public function ShowAllUsers()
    {		
		$result = parent::DBSearch("SELECT ID, name, user, rank FROM users");
		
		//Générer un tableau d'objet.
		foreach($result as $user) $obj[$user['ID']] = new obj($user);
			
		return $obj;
    }
	
	//Retourne tous les comptes d'un type.
    public function ShowUsersByRank($_rank)
    {
        $result = parent::DBSearch("SELECT ID,name,user,rank FROM users WHERE rank =" .$_rank);
		
		//Générer un tableau d'objet.
		foreach($result as $user) $obj[$user['ID']] = new obj($user);
			
		return $obj;
    }

    //Retourne les infos d'un compte.
    public function ShowUserByID($_userID)
    {
        return new obj(parent::DBExecute("SELECT ID,name,user,rank FROM users WHERE ID =" . $_userID));
    }

    public function UsernameExist($_name)
    {
        $result = parent::DBSearch("SELECT ID FROM user WHERE rank=" . $_name);

        if(isset($result))
            return true;
        return false;
    }

    //Modifie le mot de passe d'un compte.
    public function UpdatePW($_id, $_pw)
    {
        parent::DBExecute("UPDATE users SET pw ='" . md5($_pw) . "' WHERE ID =" . $_id);
    }
	
	//Supprime un utilisateur.
    public function DeleteUser($_id)
    {
        parent::DBExecute("DELETE FROM users WHERE ID = " . $_id);
    }
	
	////////////////// FIN GESTION DE COMPTE ////////////////////
	
	////////////////// DÉBUT CONNEXION DE COMPTE ////////////////////

    //Connexion de l'utilisateur.
    public function UserLogin($_user, $_pw)
    {
		//Valider la connexion.
        $cmd = "SELECT ID, name, rank FROM users WHERE user='" . addslashes($_user) . "' password='" . md5($_pw) . "'";
        $result = DBSearch($cmd);

		if($result != null){
			//Génération du token.
			$token = TokenGen();
			
			//Mise à jour de l'utilisateur.
			$cmd = "UPDATE users SET token= " . $token . "WHERE ID = " . $result['ID'];
			parent::DBExecute($cmd);
			
			//Ajouter token dans le résultat.
			$result['token'] = $token;
		}
		
        return $result;
    }

    //Connexion par token.
    public function TokenLogin($_token)
    {
		//Valider la connexion.
        $cmd = "SELECT ID, rank FROM users WHERE token = " . $_token;
        $result = DBSearch($cmd);
		
		return $result;
    }
	
	//Déconnexion.
	public function Logout($_token)
	{
		$token = TokenGen();
		
		//Mise à jour de l'utilisateur.
		$cmd = "UPDATE users SET token= " . $token . "WHERE token = " . $_token;
		parent::DBExecute($cmd);
	}
	
	////////////////// FIN CONNEXION DE COMPTE ////////////////////
}