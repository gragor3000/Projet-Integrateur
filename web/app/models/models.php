<?php
//transformation de tableau � objet.
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
    //Contient le chemin pour acc�der au dossier contenant les diff�rent Xml
    protected $DefaultXMLPath = '../app/models/xml/';

    //Connexion � la BD.
    protected function DBConnect()
    {
        //Temporaire, mettre les bonne valeur
        return new PDO('mysql:host=localhost;dbname=db_pIntegrateur;charset=utf8', 'kalahee', 'test');
    }

    //Requ�te avec le retour d'une table.
    protected function DBSearch($Command)
    {
        //Connexion � la BD.
        $pdo = DBConnect();

		//Pr�parer la commande.
        $request = $pdo->prepare($Command);
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_ASSOC);

		//Fermer la connexion.
        $pdo = null;

        return $result;
    }

    //Requ�te avec le retour d'une ligne unique.
    protected function DBExecute($Command)
    {
        //Connexion � la BD.
        $pdo = DBConnect();

		//Pr�parer la commande.
        $request = $pdo->prepare($Command);
        $request->execute();
        $result = $request->fetch(PDO::FETCH_ASSOC);

		//Fermer la connexion.
        $pdo = null;

        return $result;
    }
	
	//Obtenir dernier ID g�n�r�.
	protected function DBLastID()
	{
		//Connexion � la BD.
        $pdo = DBConnect();
		$result = $pdo->lastInsertId();
	}
	
}