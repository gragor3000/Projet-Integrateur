<?php

/**
 * Created by PhpStorm.
 * User: Baker
 * Date: 2016-01-30
 * Time: 16:40
 */
class models
{
    //Se connecte � une base de donn�e pr�cise et renvoie la connexion
    protected function DBConnection()
    {
        //Temporaire, mettre les bonne valeur
        return new PDO('mysql:host=localhost;dbname=db_pIntegrateur;charset=utf8', 'kalahee', 'test');
    }

    //Fonction qui permet de r�cup�rer toute les informations d'une recherche
    protected function DBSearch($Command)
    {
        //R�cup�re la connexion � la base de donn�e
        $pdo = DBConnection();

        $request = $pdo->prepare($Command);
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;

        return $result;
    }

    //Fonction qui permet de r�cup�rer la premi�re information d'une recherche
    protected function DBExecute($Command)
    {
        //R�cup�re la connexion � la base de donn�e
        $pdo = DBConnection();

        $request = $pdo->prepare($Command);
        $request->execute();
        $result = $request->fetch(PDO::FETCH_ASSOC);

        $pdo = null;

        return $result;
    }
}