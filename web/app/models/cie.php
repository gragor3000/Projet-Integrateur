<?php

/**
 * Created by PhpStorm.
 * User: Mic
 * Date: 06/02/2016
 * Time: 16:10
 */
class entreprises
{
    private $properties;

    public function __construct($_data)
    {
        $this->properties = $_data;
    }

    public function __get($property)
    {
        return $this->properties[$property];
    }
}
class cie extends models
{
    //valide une entreprise
    public function ValidateEntreprise($id)
    {
        parent::DBExecute("UPDATE entreprises SET status=1 WHERE ID =" . $id);

        $cmd = "SELECT users.user,users.pw,entreprises.email FROM users INNER JOIN
                entreprises on users.ID = entreprises.account WHERE entreprises.ID = " . $id;

        $result = parent::DBSearch($cmd);
        $user = $result[0][0];
        $pw = $result[0][1];
        $email = $result[0][2];
        $msg = "Votre entreprise à été validé voici votre nom d'utilisateur et votre mot de passe :
                \n Nom d'utilisateur : " . $user . "\n Mot de passe: " . $pw;

        /**** envoyer info par email****/
        mail($email, "Compte validée", $msg);
    }

    //retourne les entreprises selon le status
    public function ShowCie($_status)
    {
        return new entreprises(parent::DBSearch("SELECT * FROM entreprises WHERE status = ".$_status));
    }
}