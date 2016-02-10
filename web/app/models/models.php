<?php
/*
2016-02-10 Marc Lauzon, Baker
RÉVISÉ
*/

//transformation de tableau à objet.
class obj{
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

class Models
{
    //Chemin des fichiers XML.
    protected $DefaultXMLPath = '../app/models/xml/';

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
        return $pdo->lastInsertId();
	}
	
}