<?php

class Models
{
    //Connexion à la BD.
    protected function DBConnect()
    {
        //Temporaire, mettre les bonne valeur
        return new PDO('mysql:host=localhost;dbname=db_pIntegrateur;charset=utf8', 'kalahee', 'test');
    }

    //Requête avec le retour d'une table.
    protected function DBSearch($Command)
    {
        //Connexion à la BD.
        $pdo = DBConnect();

		//Préparer la commande.
        $request = $pdo->prepare($Command);
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_ASSOC);

		//Fermer la connexion.
        $pdo = null;

        return $result;
    }

    //Requête avec le retour d'une ligne unique.
    protected function DBExecute($Command)
    {
        //Connexion à la BD.
        $pdo = DBConnect();

		//Préparer la commande.
        $request = $pdo->prepare($Command);
        $request->execute();
        $result = $request->fetch(PDO::FETCH_ASSOC);

		//Fermer la connexion.
        $pdo = null;

        return $result;
    }
	
	//Obtenir dernier ID généré.
	protected function DBLastID()
	{
		//Connexion à la BD.
        $pdo = DBConnect();
		$result = $pdo->lastInsertId();
	}
	
}