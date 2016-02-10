<?php
/*
2016-02-09 Marc Lauzon
COMPL�T�... je pense.
*/

//transformation de tableau � objet.
class obj
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

class Models
{
    //Chemin des fichiers XML.
    protected $DefaultXMLPath = '../app/models/xml/';

    //Connexion � la BD.
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