<?php

/*
  DeployDB : 	TESTER | FONCTIONNEL -> 2016-02-11 Marc Lauzon
  ---> Supprimer Install.html et rediriger vers l'acceuil (Location);
 */

class installer extends models {

    //délpoie la base de donnée
    public function DeployDB($_dbName, $_dbUser, $_dbPass, $_name, $_username, $_pw) {
        //Création de la base de données.
        $pdo = new PDO('mysql:host=localhost;charset=utf8', $_dbUser, $_dbPass);
        $request = $pdo->prepare("CREATE DATABASE IF NOT EXISTS " . addslashes($_dbName));
        $request->execute();

        //écrit les infos dans un fichier.
        $myfile = $myfile = fopen("../app/models/dbSettings.txt", "w");
        fwrite($myfile, "localhost," . addslashes($_dbName) . "," . $_dbUser . "," . $_dbPass);
        fclose($myfile);

        $pdo = new PDO('mysql:host=localhost;dbname=' . addslashes($_dbName) . ';charset=utf8', $_dbUser, $_dbPass);
        //créer la table users
        try {
            $request = $pdo->prepare("CREATE TABLE IF NOT EXISTS users (
                          ID int NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
                          name varchar(64) NOT NULL COMMENT 'nom de l''utilisateur',
                          user varchar(32) NOT NULL COMMENT 'nom d''utilisateur',
                          pw varchar(32) NOT NULL COMMENT 'mot de passe ',
                          token varchar(32) DEFAULT NULL COMMENT 'numéro d''authentification',
                          rank int(11) NOT NULL COMMENT '0=coordonateur,1=entreprise,2= stagiaire',
                          PRIMARY KEY(ID));");
            $request->execute();
        } catch (PDOException $e) {
            echo($e);
        }

        //créer la table business
        try {
            $request = $pdo->prepare("CREATE TABLE IF NOT EXISTS business (
                          ID int NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
                          address varchar(64) NOT NULL COMMENT 'addresse de l''entreprises',
                          city varchar(32) NOT NULL COMMENT 'ville',
                          tel varchar(32) NOT NULL COMMENT 'téléphone et extension',
                          email varchar(64) NOT NULL COMMENT 'addresse courriel',
                          userID int DEFAULT NULL COMMENT 'compte donnée',
                          status tinyint NOT NULL COMMENT '0= en attente 1= approuvée',
                          FOREIGN KEY (userID) REFERENCES users (ID),
                          PRIMARY KEY(ID));");
            $request->execute();
        } catch (PDOException $e) {
            echo($e);
        }

        //créer la table projects
        try {
            $request = $pdo->prepare("CREATE TABLE IF NOT EXISTS projects (
                          ID int NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
                          title varchar(64) NOT NULL COMMENT 'titre',
                          supName varchar(64) NOT NULL COMMENT 'Nom du superviseur',
                          supTitle varchar(32) NOT NULL COMMENT 'titre du superviseur',
                          supEmail varchar(64) NOT NULL COMMENT 'email du superviseur',
                          supTel varchar(32) NOT NULL COMMENT 'téléphone du superviseur',
                          descr text NOT NULL COMMENT 'description',
                          equip text NOT NULL COMMENT 'equipement',
                          extra text NOT NULL COMMENT 'exigence ',
                          info text NOT NULL COMMENT 'info supplémentaire',
                          status tinyint NOT NULL COMMENT '0=en attente 1= approuvée',
                          internID int DEFAULT NULL COMMENT 'stagiaire affecté au projet',
                          businessID int NOT NULL COMMENT 'entreprise du projet',
                          PRIMARY KEY(ID),
                          FOREIGN KEY (businessID) REFERENCES business (ID),
                          FOREIGN KEY (internID) REFERENCES users (ID));");
            $request->execute();
        } catch (PDOException $e) {
            echo($e);
        }

        //créer la table ratings
        try {
            $request = $pdo->prepare("CREATE TABLE IF NOT EXISTS ratings (
                          ID int NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
                          score int NOT NULL COMMENT 'note d''appréciation',
                          internID int NOT NULL COMMENT 'clé étrangère du stagiaire',
                          projectID int NOT NULL COMMENT 'clé étrangère vers le projet',
                          PRIMARY KEY(ID),
                          FOREIGN KEY (projectID) REFERENCES projects (ID),
                          FOREIGN KEY (internID) REFERENCES users (ID));");
            $request->execute();
        } catch (PDOException $e) {
            echo($e);
        }

        //ajoute le premier coordonateur
        try {
            $request = $pdo->prepare("INSERT INTO users(name,user,pw,rank) VALUES('" . addslashes($_name) . "','" . addslashes($_username) . "','" . md5($_pw) . "',0);");
            $request->execute();
        } catch (PDOException $e) {
            echo($e);
        }

        //////SUPPRIMER INSTALL.HTML //////
        //////REDIRIGER VERS INDEX.PHP /////
    }

}
