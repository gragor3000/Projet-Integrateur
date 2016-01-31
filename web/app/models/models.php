<?php

/**
 * Created by PhpStorm.
 * User: Baker
 * Date: 2016-01-30
 * Time: 16:40
 */
class models
{
    //Se connecte à une base de donnée précise et renvoie la connexion
    protected function DBConnection()
    {
        //Temporaire, mettre les bonne valeur
        return new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'User', 'Passe');
    }

    //Fonction qui permet de récupérer toute les informations d'une recherche
    protected function DBSearch($Command)
    {
        //Récupère la connexion à la base de donnée
        $pdo = DBConnection();

        $request = $pdo->prepare($Command);
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;

        return $result;
    }

    //Fonction qui permet de récupérer la première information d'une recherche
    protected function DBExecute($Command)
    {
        //Récupère la connexion à la base de donnée
        $pdo = DBConnection();

        $request = $pdo->prepare($Command);
        $request->execute();
        $result = $request->fetch(PDO::FETCH_ASSOC);

        $pdo = null;

        return $result;
    }

    //génération de token et vérification de doublons
    public function TokenGen()
    {
        $data = "qwertyuiopasdfghjklzxcvbnm1234567890";
        $token = "";
        for($i = 0; $i < 32; $i++)
        {
            $rng = rand(0,31);
            $token += $data[$rng];
        }

        $command = "SELECT Token FROM users WHERE Token=" + $token;
        //pas certain de ce que la BD renvoie si trouve rien
        $result = $this->DBSearch($command);
        if($result[0][0] == null)
            $this->TokenGen();
        return $token;
    }

    //création d'usager non validé
    public function CreateUser($fName, $lName, $pw, $email, $tel, $type)
    {
        //verifier que "Type" cause pas de probleme
        $command = "INSERT INTO users (FirstName, LastName, Password, Email, Tel, Type, Token)";
        $values = " VALUES(" + $fName + "," + $lName + "," + md5($pw) + "," + $email + "," + $tel + "," + $type + "," + $this->TokenGen() + ")";
        $this->DBExecute($command + $values);
    }

    //connexion de l'utilisateur avec email et mot de passe
    public function Login($email, $pw)
    {
        $command = "SELECT Type, Token FROM users WHERE Email= " + $email + " Password= " + md5($pw);
        $result = $this->DBSearch($command);
        $_SESSION["token"] = $result[0][0];
        $_SESSION["type"] = $result[0][1];

        //expire apres une journee et sur tout le domaine
        setcookie("token", $result[0][0], time() + (86400 * 30), "/");
    }

    //connexion automatique de l'utilisatuer avec un token
    public function TokenLogin($token)
    {
        $command = "SELECT Type FROM users WHERE Token = " + $token;
        $result = $this->DBSearch($command);
        $_SESSION["token"] = $token;
        $_SESSION["type"] = $result[0][0];
    }

    //valide le compte mettant la date de validation dans la bd
    public function ValidateAccount($id)
    {
        $this->DBExecute("Update ValDate Set " + date('Y-m-d H:i:s') + " WHERE ID = " + $id);
    }
}