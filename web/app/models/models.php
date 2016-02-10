<?php
/*
2016-02-10 Marc Lauzon, Baker
RÉVISÉ
*/

<<<<<<< HEAD
//transformation de tableau � objet.
class obj
{
    private $properties;
=======
//transformation de tableau à objet.
class obj{
	private $properties;
>>>>>>> origin/master

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
        $myfile = fopen("../app/dbSettings.txt", "r");
        if ($myfile != null) {

            $fileText = fread($myfile, filesize("../app/dbSetings.txt"));
            $result = explode(",", $fileText);
            fclose($myfile);

            return new PDO('mysql:host=' . $result[0] . ';dbname=' . $result[1] . ';charset=utf8', $result[2], $result[3]);
        }
        return null;
    }

    //Requête avec le retour d'une table.
    protected function DBSearch($Command)
    {
        //Connexion à la BD.
        $pdo = DBConnect();

<<<<<<< HEAD
        //Pr�parer la commande.
=======
		//Préparer la commande.
>>>>>>> origin/master
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

<<<<<<< HEAD
        //Pr�parer la commande.
=======
		//Préparer la commande.
>>>>>>> origin/master
        $request = $pdo->prepare($Command);
        $request->execute();
        $result = $request->fetch(PDO::FETCH_ASSOC);

        //Fermer la connexion.
        $pdo = null;

        return $result;
    }
<<<<<<< HEAD

    //Obtenir dernier ID g�n�r�.
    protected function DBLastID()
    {
        //Connexion � la BD.
        $pdo = DBConnect();
        $result = $pdo->lastInsertId();
    }

=======
	
	//Obtenir dernier ID généré.
	protected function DBLastID()
	{
		//Connexion à la BD.
        $pdo = DBConnect();
        return $pdo->lastInsertId();
	}
	
>>>>>>> origin/master
}