<?php

/**
 * Created by PhpStorm.
 * User: Mic
 * Date: 06/02/2016
 * Time: 16:10
 */
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

    //retourne les entreprises non approuvée
    public function ShowInactiveCie()
    {
        return parent::DBSearch("SELECT * FROM entreprises WHERE Status = 0");
    }
}