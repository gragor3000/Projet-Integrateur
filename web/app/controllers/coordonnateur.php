<?php

class Coordonnateur extends Controller
{

    //Constructeur de la classe
    public function __construct()
    {
        session_start();
    }

    //Fonction appeler par défaut
    public function index($name = '')
    {

    }

    //valide un compte
    public function AccepterCompte($token)
    {
        //parent::BDExecute("Update ValDate Set " + date('Y-m-d H:i:s') + " WHERE Token = " + $token);
    }

    //ajoute un compte dans la bd
    public function CreerCompte($firstName, $lastName, $password, $email, $tel, $type)
    {

        }


}

?>