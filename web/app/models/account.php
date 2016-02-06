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

    //Création de stagiare.
    public function CreateIntern($user, $pw, $group)
    {
        //verifier que "Type" cause pas de probleme
        $cmd = "INSERT INTO users (user, pw, Group)";
        $values = " VALUES(" + $user + "," + md5($pw) + "," + $group +")";
        $this->DBExecute($cmd + $values);
    }

    public function CreateCoordonator()
    {

    }

    public function CreateBusiness()
    {

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
		//Valider la connexion.
        $cmd = "SELECT ID, group FROM users WHERE token = " + $token;
        $result = $this->DBSearch($cmd);
		
		return $result;
    }
}