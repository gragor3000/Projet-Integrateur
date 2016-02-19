<?php

/*
  2016-02-10 Marc Lauzon, Baker
  RÉVISÉ
 */

//transformation de tableau à objet.
class obj {

    private $properties;

    public function __construct($_data) {
        $this->properties = $_data;
    }

    public function __get($property) {
        return $this->properties[$property];
    }

}

class Models {

    //Chemin des fichiers XML.
    const DefaultXMLPath = "../app/models/xml/";

    //Connexion à la BD.
    protected function DBConnect() {
        $filepath = "../app/models/dbSettings.txt";
        $myfile = fopen($filepath, "r");
        if ($myfile != null) {

            $fileText = fread($myfile, filesize($filepath));
            $result = explode(",", $fileText);
            fclose($myfile);

            $pdo = new PDO('mysql:host=localhost;dbname=' . $result[1] . ';charset=utf8', $result[2], $result[3]);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        }
        return null;
    }

    //Requête avec le retour d'une table.
    protected function DBSearch($Command) {
        //Connexion à la BD.
        $pdo = $this->DBConnect();

        //Préparer la commande.
        $request = $pdo->prepare($Command);
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        //Fermer la connexion.
        $pdo = null;

        return $result;
    }

    //Requête avec le retour d'une ligne unique.
    protected function DBQuery($Command) {
        //Connexion à la BD.
        $pdo = $this->DBConnect();

        //Préparer la commande.
        $request = $pdo->prepare($Command);
        $request->execute();
        $result = $request->fetch(PDO::FETCH_ASSOC);

        //Fermer la connexion.
        $pdo = null;

        return $result;
    }

    //Requête avec le retour d'une ligne unique.
    protected function DBExecute($Command) {
        //Connexion à la BD.
        $pdo = $this->DBConnect();

        //Préparer la commande.
        $request = $pdo->prepare($Command);
        $result = $request->execute();

        //Fermer la connexion.
        $pdo = null;

        return $result;
    }

    //Obtenir dernier ID généré.
    public function DBLastInsertedID($_table) {
        //Connexion à la BD.
        $pdo = $this->DBConnect();
        $request = $pdo->prepare("SELECT id FROM " . $_table . " ORDER BY ID DESC LIMIT 1");
        $request->execute();
        $result = $request->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }

}
