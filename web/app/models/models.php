<?php

/**
 * Created by PhpStorm.
 * User: Baker
 * Date: 2016-01-30
 * Time: 16:40
 */
class models
{
    //Se connecte à une base de donnée précise et renvoie la connexion
    protected function DBConnection()
    {
        //Temporaire, mettre les bonne valeur
        return new PDO('mysql:host=localhost;dbname=db_pIntegrateur;charset=utf8', 'kalahee', 'test');
    }

    //Fonction qui permet de récupérer toute les informations d'une recherche
    protected function DBSearch($Command)
    {
        //Récupère la connexion à la base de donnée
        $pdo = DBConnection();

        $request = $pdo->prepare($Command);
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;

        return $result;
    }

    //Fonction qui permet de récupérer la première information d'une recherche
    protected function DBExecute($Command)
    {
        //Récupère la connexion à la base de donnée
        $pdo = DBConnection();

        $request = $pdo->prepare($Command);
        $request->execute();
        $result = $request->fetch(PDO::FETCH_ASSOC);

        $pdo = null;

        return $result;
    }
}