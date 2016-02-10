<?php
/*
2016-02-09 Marc Lauzon
COMPLÉTÉ.
*/

class business extends models
{
	//Création d'un entreprise.
    public function CreateBusiness($_address, $_city, $_tel, $_email, $_account){
		parent::DBExecute("INSERT INTO cie (address, city, tel, email, account)
							VALUES(
							'" . addslashes($_address) . "',
							'" . addslashes($_city) . "',
							'" . addslashes($_tel) . "',
							'" . addslashes($_email) . "',
							" . $_account . ")");
    }
	
	//Mise à jour des informations d'une entreprise.
	public function UpdateBusiness($_id, $_address, $_city, $_tel, $_email){
		parent::DBExecute("UPDATE cie SET 
							address = '" . addslashes($_address) . "',
							city = '" . addslashes($_city) . "',
							tel = '" . addslashes($_tel) . "',
							email = '" . addslashes($_email) . "',
							WHERE id = " . $_id);
	}

	//Retourne toutes les entreprises.
	public function ShowAllCie()
	{
		$result = parent::DBSearch("SELECT * FROM cie");
		
		//Générer un tableau d'objet.
		foreach($cie in $result) $obj[$cie['ID']] = new obj($cie);
			
		return $obj;
	}
	
	//Retourne une entreprise selon l'ID.
    public function ShowCieByID($_businessID)
    {
		//Obtenir l'entreprise.
		$result = parent::DBExecute("SELECT * FROM cie WHERE ID = " . $_businessID);
		//Obtenir le nom de l'entreprise.
		$result['name'] = parent::DBExecute("SELECT name FROM users WHERE ID = " . $result['userID'])
		
        return new obj($result);
    }
	
    //Retourne les entreprises selon le status.
    public function ShowCieByStatus($_status)
    {
        $result = parent::DBSearch("SELECT * FROM entreprises WHERE status = ".$_status));
		
		//Générer un tableau d'objet.
		foreach($cie in $result) $obj[$cie['ID']] = new obj($cie);
			
		return $obj;
    }
	
	//Valider une entreprise et envoyer un courriel.
    public function AuthCie($_businessID)
    {
        parent::DBExecute("UPDATE cie SET status=1 WHERE ID =" . $_businessID);
		//Obtenir l'ID de compte et courriel.
		$result = parent::DBExecute("SELECT email,userID FROM cie WHERE ID =" . $_businessID);
		//Obtenir le nom d'utilisateur et mot de passe.
		$user = parent::DBExecute("SELECT user,pw FROM users WHERE ID=" . $result['userID']);
		
        $msg = "Votre entreprise à été autorisé à soumettre des projets. Voici le nom d'utilisateur et un mot de passe :
                \n Nom d'utilisateur : " . $user['user'] . "\n Mot de passe: " . $user['pw'];

        //Envoi du courriel de confirmation.
        mail($result['email'], "Compte validée", $msg);
    }
	
	//Supprimer une entreprise.
	public function DeleteCie($_businessID)
	{
		parent::DBExecute("DELETE FROM cie WHERE account = " . $_businessID);
	}
}