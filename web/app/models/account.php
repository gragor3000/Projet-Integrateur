<?php

/**
 * Created by PhpStorm.
 * User: 1229753
 * Date: 01/02/2016
 * Time: 15:07
 */
class account extends models
{

    //g�n�ration de token et v�rification de doublons
    public function TokenGen()
    {
        $data = "qwertyuiopasdfghjklzxcvbnm1234567890";
        $token = "";
        for ($i = 0; $i < 32; $i++) {
            $rng = rand(0, strlen($data));
            $token += $data[$rng];
        }

        $cmd = "SELECT token FROM users WHERE token=" + $token;
        //pas certain de ce que la BD renvoie si trouve rien
        $result = $this->DBSearch($cmd);
        if ($result[0][0] == null)
            $this->TokenGen();
        return $token;
    }

    /*//cr�ation d'usager
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

    }*/

    //création d'un compte
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
        if ($token != "") {
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