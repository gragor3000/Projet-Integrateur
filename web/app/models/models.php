<?php

/**
 * Created by PhpStorm.
 * User: Baker
 * Date: 2016-01-30
 * Time: 16:40
 */
class models
{

    //Fonction qui permet de récupérer toute les informations d'une recherche
    protected function BDRecherche($Commande){

        //Récupère la connexion à la base de donnée
        $BD = Connexion();

        $Requete = $BD->prepare($Commande);
        $Requete->execute();
        $Resultat = $Requete->fetchAll(PDO::FETCH_ASSOC);

        $BD = null;

        return $Resultat;
    }

    //Fonction qui permet de récupérer la première information d'une recherche
    protected function BDExecute($Commande){

        //Récupère la connexion à la base de donnée
        $BD = Connexion();

        $Requete = $BD->prepare($Commande);
        $Requete->execute();
        $Resultat = $Requete->fetch(PDO::FETCH_ASSOC);

        $BD = null;

        return $Resultat;
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
        $result = $this->BDExecute($command);
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
        $this->BDExecute($command + $values);
    }

    //connexion de l'utilisateur avec email et mot de passe
    public function Login($email, $pw)
    {
        $command = "SELECT Type, Token FROM users WHERE Email= " + $email + " Password= " + md5($pw);
        $result = $this->BDExecute($command);
        $_SESSION["token"] = $result[0][0];
        $_SESSION["type"] = $result[0][1];

        //expire apres une journee et surtout le domaine
        setcookie("token", $result[0][0], time() + (86400 * 30), "/");
    }

    //connexion automatique de l'utilisatuer avec un token
    public function TokenLogin($token)
    {
        $command = "SELECT Type FROM users WHERE Token = " + $token;
        $result = $this->BDExecute($command);
        $_SESSION["token"] = $token;
        $_SESSION["type"] = $result[0][0];
    }
}