<?php

/**
 * Created by PhpStorm.
 * User: 1229753
 * Date: 01/02/2016
 * Time: 15:07
 */
class account extends models
{
    public function account()
    {
        session_start();
    }

    //génération de token et vérification de doublons
    public function TokenGen()
    {
        $data = "qwertyuiopasdfghjklzxcvbnm1234567890";
        $token = "";
        for($i = 0; $i < 32; $i++)
        {
            $rng = rand(0,strlen($data));
            $token += $data[$rng];
        }

        $cmd = "SELECT token FROM users WHERE token=" + $token;
        //pas certain de ce que la BD renvoie si trouve rien
        $result = $this->DBSearch($cmd);
        if($result[0][0] == null)
            $this->TokenGen();
        return $token;
    }

    //création d'usager
    public function CreateUser($user, $pw, $group)
    {
        //verifier que "Type" cause pas de probleme
        $cmd = "INSERT INTO users (user, pw, Group)";
        $values = " VALUES(" + $user + "," + md5($pw) + "," + $group +")";
        $this->DBExecute($cmd + $values);
    }

    //connexion de l'utilisateur avec nom et mot de passe
    public function Login($user, $pw)
    {
        $cmd = "SELECT ID, group FROM users WHERE user= " + $user + " Password= " + md5($pw);
        $result = $this->DBSearch($cmd);
        $_SESSION["id"] = $result[0][0];
        $_SESSION["group"] = $result[0][1];

        $token = TokenGen();
        $cmd = "UPDATE users SET token= " + $token + "WHERE ID = " + $_SESSION["id"];
        $this->DBExecute($cmd);
        $_SESSION["token"] = $token;

        //expire apres une journee et sur tout le domaine
        setcookie("token", $result[0][0], time() + (86400 * 30), "/");
    }

    //connexion automatique de l'utilisateur avec un token
    public function TokenLogin($token)
    {
        if($token != "")
        {
            $cmd = "SELECT ID, group FROM users WHERE token = " + $token;
            $result = $this->DBSearch($cmd);
            $_SESSION["token"] = $token;
            $_SESSION["id"] = $result[0][0];
            $_SESSION["group"] = $result[0][1];
        }
    }

    public function Logoff($id)
    {
        $cmd = "UPDATE users SET Token= '' WHERE ID = " + $_SESSION["id"];
        session_destroy();
    }
}