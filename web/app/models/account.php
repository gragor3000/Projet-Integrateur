<?php

class account extends models
{
<<<<<<< HEAD
    //Génération de token.
=======

    //gï¿½nï¿½ration de token et vï¿½rification de doublons
>>>>>>> origin/master
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
        $cmd = "SELECT token FROM users WHERE token=" + $token;
        $result = $this->DBSearch($cmd);
<<<<<<< HEAD
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
=======
        if ($result[0][0] == null)
            $this->TokenGen();
        return $token;
    }


    /*//crï¿½ation d'usager
    public function CreateIntern($user, $pw, $group)
    
    //crï¿½ation d'usager
    public function CreateUser($user, $pw, $group)

>>>>>>> origin/master
    {
        //verifier que "Type" cause pas de probleme
        $cmd = "INSERT INTO users (user, pw, Group)";
        $values = " VALUES(" + $user + "," + md5($pw) + "," + $group +")";
        $this->DBExecute($cmd + $values);

    }

    //crï¿½ation d'entreprise
    public function CreateBusiness($address, $city, $tel, $email, $account)
    {

    }*/

    //crÃ©ation d'un compte
    public function CreateUser($name, $user, $pw, $rank)
    {
        parent::DBExecute("INSERT INTO users (name,user,pw,rank)
                          VALUES('" . $name . "','" . $user . "','" . $pw . "'," . $rank . ")");
    }

    //retourne tous les comptes
    public function ShowUsers()
    {
        return parent::DBSearch("SELECT name,rank FROM users");
    }

    //supprime un utilisateur
    public function DeleteUser($id)
    {
        parent::DBExecute("DELETE FROM users WHERE ID = ".$id);
    }

    //modifie les infos d'un compte
    public function UpdateUser($id,$name,$user,$rank)
    {
        parent::DBExecute("UPDATE users SET name = '".$name."', user ='".$user."',rank =".$rank ." WHERE ID =".$id);
    }

    //modifie le mot de passe d'un compte
    public function UpdatePw($id,$pw)
    {
        parent::DBExecute("UPDATE users SET pw ='".$pw."' WHERE ID =".$id);
    }

    //modifie ses infos
    public function UpdateMyInfo($token,$name,$user)
    {
        parent::DBExecute("UPDATE users SET name ='".$name."',"."user = '".$user."' WHERE token = ".$token);
    }

    //modife son mot de passe
    public function UpdateMyPw($token,$pw)
    {
        parent::DBExecute("UPDATE users SET pw ='".$pw."' WHERE token =".$token);
    }

    //retourne les ses infos
    public function ShowMyInfo($token)
    {
        return parent::DBSearch("SELECT name,user,pw FROM users WHERE token =".$token);

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
<<<<<<< HEAD
		//Valider la connexion.
        $cmd = "SELECT ID, group FROM users WHERE token = " + $token;
        $result = $this->DBSearch($cmd);
		
		return $result;
=======
        if($token != "")
        {
=======
        if ($token != "") {
>>>>>>> origin/master
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