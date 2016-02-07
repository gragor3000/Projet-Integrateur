<?php

class account extends Models
{

    //Génération de token.
    public function TokenGen()
    {
		//Création du token.
        $data = "qwertyuiopasdfghjklzxcvbnm1234567890";
        $token = "";
        for ($i = 0; $i < 32; $i++) {
            $rng = rand(0, strlen($data));
            $token += $data[$rng];
        }

		//Vérification d'un doublon.
        $cmd = "SELECT token FROM users WHERE token='" . $token . "'";
        $result = $this->DBSearch($cmd);

        if($result == null) TokenGen();
		
        return $token;
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

    //Création d'un entreprise.
    public function CreateBusiness($_address, $_city, $_tel, $_email, $_account)
    {
		parent::DBExecute("INSERT INTO cie (address, city, tel, email, account)
							VALUES(
							'" . addslashes($_address) . "',
							'" . addslashes($_city) . "',
							'" . addslashes($_tel) . "',
							'" . addslashes($_email) . "',
							" . $_account . ")");
		
    }    

    //Retourner tous les comptes.
    public function ShowUsers($_address, $_city, $_tel, $_email, $_account)
    {
        return parent::DBSearch("SELECT ID,name,rank FROM users");
    }

    //Retourner les infos d'un compte.
    public function ShowInfo($_id)
    {
        return parent::DBSearch("SELECT name,user FROM users WHERE ID =" . $_id);
    }
	
    //Modifier les infos d'un compte.
    public function UpdateUser($_id,$_name,$_user,$_rank)
    {
        parent::DBExecute("UPDATE users SET 
			name = '" . addslashes($_name) . "', 
			user ='" . addslashes($_user) . "',
			rank =" . $rank . " 
				WHERE ID =" . $_id);
    }
	
	//Modifier les infos d'une entreprise.
	public function UpdateCie($_address, $_city, $_tel, $_email, $_account)
    {
		parent::DBExecute("UPDATE cie SET
			address = '" . addslashes($_address) . "',
			city = '" . addslashes($_city) . "',
			tel = '" . addslashes($_tel) . "',
			email = '" . addslashes($_email) . "',
				WHERE account = " . $_account);
		
    }    

    //Modifier le mot de passe d'un compte.
    public function UpdatePw($_id, $_pw)
    {
        parent::DBExecute("UPDATE users SET pw ='" . md5($_pw) . "' WHERE ID =" . $_id);
    }
	
	//Supprimer un utilisateur.
    public function DeleteUser($_id)
    {
        parent::DBExecute("DELETE FROM users WHERE ID = " . $_id);
    }
	
	//Supprimer une entreprise.
	public function DeleteCie($_id)
	{
		parent::DBExecute("DELETE FROM cie WHERE account = " . $_id);
		DeleteUser($_id)
	}
	
	////////////////// FIN GESTION DE COMPTE ////////////////////
	
	////////////////// DÉBUT CONNEXION DE COMPTE ////////////////////

    //Connexion de l'utilisateur.
    public function UserLogin($_user, $_pw)
    {
		//Valider la connexion.
        $cmd = "SELECT ID, name, group FROM users WHERE user='" . addslashes($_user) . "' password='" . md5($_pw) . "'";
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
        $cmd = "SELECT ID, group FROM users WHERE token = " . $_token;
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