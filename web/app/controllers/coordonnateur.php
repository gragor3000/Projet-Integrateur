<?php

class Coordonnateur extends Controller
{
    private $models;//pointe vers la classe model

    //Constructeur de la classe
    public function __construct()
    {
        session_start();
        parent::model("models");
        $this->models = new models();
    }

    //Fonction appeler par défaut
    public function index($name = '')
    {

		//Ouvre l'index du coordonnateur
		parent::view('coordonnateur/index');
    }

    //valide un compte
    public function AccepterCompte($id)
    {
        $this->models->ValidateAccount($id);
    }

    //ajoute un compte dans la bd
    public function CreateUser($firstName, $lastName, $pw, $email, $tel, $type)
    {
        $this->models->CreateUser($firstName, $lastName, $pw, $email, $tel, $type);
    }


}

?>