<?php

/*
  2016-02-10 Marc Lauzon, Sam Baker
  RÉVISÉ.
 */

class business extends Models {

    //Création d'un entreprise.
    public function CreateBusiness($_address, $_city, $_tel, $_email, $_account) {
        parent::DBExecute("INSERT INTO business (address, city, tel, email, userID)
							VALUES(
							'" . addslashes($_address) . "',
							'" . addslashes($_city) . "',
							'" . addslashes($_tel) . "',
							'" . addslashes($_email) . "',
							" . $_account . ")");
    }

    //Mise à jour des informations d'une entreprise.
    public function UpdateBusiness($_id, $_address, $_city, $_tel, $_email) {
        parent::DBExecute("UPDATE business SET 
							address = '" . addslashes($_address) . "',
							city = '" . addslashes($_city) . "',
							tel = '" . addslashes($_tel) . "',
							email = '" . addslashes($_email) . "',
							WHERE id = " . $_id);
    }

    //Retourne toutes les entreprises.
    public function ShowAllCie() {
        $result = parent::DBSearch("SELECT * FROM cie");


        //Générer un tableau d'objet.
        foreach ($result as $cie)
            $obj[$cie['ID']] = new obj($cie);

        return $obj;
    }

    //Retourne une entreprise selon l'ID.
    public function ShowCieByID($_businessID) {
        //Obtenir l'entreprise.
        $result = parent::DBQuery("SELECT * FROM business WHERE userID = " . $_businessID);
        //Obtenir le nom de l'entreprise.
        $name = parent::DBQuery("SELECT name FROM users WHERE ID = " . $result['userID']);
        $result['name'] = $name['name'];

        return new obj($result);
    }

    //Retourne les entreprises selon le status.
    public function ShowCieByStatus($_status) {
        $result = parent::DBSearch("SELECT users.name, business.ID,business.address,business.city,
                                    business.tel,business.email FROM cie INNER JOIN Users
                                    ON users.ID = business.usersID WHERE status = " . $_status);

        //Générer un tableau d'objet.
        foreach ($result as $cie)
            $obj[$cie['ID']] = new obj($cie);

        return $obj;
    }

    //Valider une entreprise et envoyer un courriel.
    public function AuthCie($_businessID) {
        parent::DBExecute("UPDATE business SET status=1 WHERE ID =" . $_businessID);
        //Obtenir l'ID de compte et courriel.
        $result = parent::DBQuery("SELECT email,userID FROM business WHERE ID =" . $_businessID);
        //Obtenir le nom d'utilisateur et mot de passe.
        $user = parent::DBQuery("SELECT user,pw,name FROM users WHERE ID=" . $result['userID']);

        $msg = "Votre entreprise, " . $user["name"] . ", à été autorisé à soumettre des projets. Voici le nom
        d'utilisateur et un mot de passe :\n Nom d'utilisateur : " . $user['user'] . "\n Mot de passe: " . $user['pw'];

        //Envoi du courriel de confirmation.
        mail($result['email'], $user["name"] . " Compte validée", $msg);
    }

    //refuse une entreprise
    public function DenyCie($_businessID)
    {
        $user = parent::DBQuery("SELECT userID, users.name,business.email FROM business
                                 INNER JOIN users ON users.ID = business.userID WHERE ID =" . $_businessID);
        parent::DBExecute("DELETE FROM business WHERE ID =" . $_businessID);
        parent::DBExecute("DELETE FROM users WHERE ID =" .$user["userID"]);

        $msg = "Votre entreprise, " . $user["name"] . ", à été refusée";

        mail($user["email"],$user["name"]."Compte refusé",$msg);

    }

    //Supprimer une entreprise.
    public function DeleteCie($_userID) {
        parent::DBExecute("DELETE FROM business WHERE userID = " . $_userID);
    }

}
