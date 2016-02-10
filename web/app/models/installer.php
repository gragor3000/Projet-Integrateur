<?php

/**
 * Created by PhpStorm.
 * User: Mic
 * Date: 03/02/2016
 * Time: 13:36
 */
class installer extends models
{
    //délpoie la base de donnée
    public function DeloyDb($_dbAdress, $_dbName, $_name, $_username, $_pw)
    {
        parent::DBExecute("CREATE DATABASE IF NOT EXISTS " . $_dbName);
        //créer la table entreprises
        parent::DBExecute("CREATE TABLE IF NOT EXISTS business (
                          ID int NOT NULL AUTO_INCEREMENT COMMENT 'clé primaire',
                          address varchar(52) NOT NULL COMMENT 'addresse de l''entreprises',
                          city varchar(32) NOT NULL COMMENT 'ville',
                          tel varchar(25) NOT NULL COMMENT 'téléphone et extension',
                          email varchar(52) NOT NULL COMMENT 'addresse courriel',
                          userID int(11) DEFAULT NULL COMMENT 'compte donnée',
                          status tinyint(1) NOT NULL COMMENT '0= en attente 1= approuvée',
                          FOREIGN KEY (account) REFERENCES users (ID),
                          PRIMARY KEY(ID)");

        //créer la table projects
        parent::DBExecute("CREATE TABLE IF NOT EXISTS projects (
                          ID int NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
                          title varchar(64) NOT NULL COMMENT 'titre',
                          supName varchar(64) NOT NULL COMMENT 'Nom du superviseur',
                          supTitle varchar(32) NOT NULL COMMENT 'titre du superviseur',
                          supEmail varchar(52) NOT NULL COMMENT 'email du superviseur',
                          supTel varchar(25) NOT NULL COMMENT 'téléphone du superviseur',
                          desc varchar(512) NOT NULL COMMENT 'description',
                          equip varchar(512) NOT NULL COMMENT 'equipement',
                          extra varchar(512) NOT NULL COMMENT 'exigence ',
                          info varchar(512) NOT NULL COMMENT 'info supplémentaire',
                          status tinyint(1) NOT NULL COMMENT '0=en attente 1= approuvée',
                          internID int(11) DEFAULT NULL COMMENT 'stagiaire affecté au projet',
                          businessID int(11) NOT NULL COMMENT 'entreprise du projet',
                          PRIMARY KEY(ID),
                          FOREIGN KEY (businessID) REFERENCES business (ID),
                          FOREIGN KEY (internID) REFERENCES users (ID)");

        //créer la table ratings
        parent::DBExecute("CREATE TABLE IF NOT EXISTS ratings (
                          ID int NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
                          score int NOT NULL COMMENT 'note d''appréciation',
                          internID int NOT NULL COMMENT 'clé étrangère du stagiaire',
                          projectID int NOT NULL COMMENT 'clé étrangère vers le projet',
                          PRIMARY KEY(ID),
                          FOREIGN KEY (projectID) REFERENCES projects (ID),
                          FOREIGN KEY (internID) REFERENCES users (ID)");

        //créer la table users
        parent::DBExecute("CREATE TABLE IF NOT EXISTS users (
                          ID int NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
                          name varchar(64) NOT NULL COMMENT 'nom de l''utilisateur',
                          user varchar(24) NOT NULL COMMENT 'nom d''utilisateur',
                          pw varchar(24) NOT NULL COMMENT 'mot de passe ',
                          token varchar(32) DEFAULT NULL COMMENT 'numéro d''authentification',
                          rank int(11) NOT NULL COMMENT '0=coordonateur,1=entreprise,2= stagiaire',
                          PRIMARY KEY(ID)");

        //ajoute le premier coordonateur
        parent::DBExecute("INSERT INTO users(name,user,pw,rank) VALUES('" . $_name . "','" . $_username . "','" . $_pw . "',0)");

        //écrit les infos dans un fichier
        $myfile = $myfile = fopen("../app/dbSettings.txt", "w");
        fwrite($myfile,$_dbAdress.",".$_dbName.",".$_username.",".$_pw);
        fclose($myfile);

    }

}