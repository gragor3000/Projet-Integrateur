<?php

class account extends models
{
    //Génération de token.
    public function TokenGen()
    {
		//Création du token.
        $data = "qwertyuiopasdfghjklzxcvbnm1234567890";
        $token = "";
        for($i = 0; $i < 32; $i++)
        {
            $rng = rand(0,strlen($data));
            $token += $data[$rng];
        }

		//Vérification d'un doublon.
        $cmd = "SELECT token FROM users WHERE token=" + $token;
        $result = $this->DBSearch($cmd);
        if($result == null) TokenGen();
		
        return $token;
    }

<<<<<<< HEAD
    //Création de stagiare.
    public function CreateIntern($user, $pw, $group)
=======
    //création d'usager
    public function CreateUser($user, $pw, $group)
>>>>>>> origin/master
    {
        //verifier que "Type" cause pas de probleme
        $cmd = "INSERT INTO users (user, pw, Group)";
        $values = " VALUES(" + $user + "," + md5($pw) + "," + $group +")";
        $this->DBExecute($cmd + $values);

    }

    //création d'entreprise
    public function CreateBusiness($address, $city, $tel, $email, $account)
    {
        $cmd = "INSERT INTO entreprises (address, city, tel, email, account)";
        $values = "VALUES(" + $address + "," + $city + "," + $tel + "," + $email + "," + $account + ")";
        $this->DBExecute($cmd + $values);
    }

    //Connexion de l'utilisateur.
    public function UserLogin($user, $pw)
    {
		//Valider la connexion.
        $cmd = "SELECT ID, group FROM users WHERE user='" . addslashes($user) . "' password='" . addslashes(md5($pw))) . "'";
        $result = DBSearch($cmd);

		if($result != null){
			//Génération du token.
			$token = TokenGen();
			
			//Mise à jour de l'utilisateur.
			$cmd = "UPDATE users SET token= " + $token + "WHERE ID = " + $result['ID'];
			DBExecute($cmd);
			
			//Ajouter token dans le résultat.
			$result['token'] = $token;
		}
		
        return $result;
    }

    //Connexion par token.
    public function TokenLogin($token)
    {
<<<<<<< HEAD
		//Valider la connexion.
        $cmd = "SELECT ID, group FROM users WHERE token = " + $token;
        $result = $this->DBSearch($cmd);
		
		return $result;
=======
        if($token != "")
        {
            $cmd = "SELECT ID, group FROM users WHERE token = " + $token;
            $result = $this->DBSearch($cmd);
            $_SESSION["token"] = $token;
            $_SESSION["id"] = $result[0][0];
            $_SESSION["group"] = $result[0][1];
        }
    }

    //deconnexion
    public function Logoff($id)
    {
        $cmd = "UPDATE users SET Token= '' WHERE ID = " + $_SESSION["id"];
        session_destroy();
>>>>>>> origin/master
    }
}