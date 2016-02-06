<?php

/**
 * Created by PhpStorm.
 * User: Baker
 * Date: 2016-02-06
 * Time: 14:26
 */
/*
class Account extends Controller{

    private $models;//pointe vers la classe model

    //Constructeur de la classe
    public function __construct(){
        session_start();
        parent::model("account");
        $this->models = new models();
    }

    //Fonction appeler par d�faut
    public function index ( $name = '' ){

        //Ouvre l'index de l'acceuil
        parent::view('accueil/index', $TblResultat);
    }

    //Fonction qui permet de se connecter
    public function Login()
    {
        if ($_POST["Action"] == "Login") {
            parent::model("account");
            echo account::Login($_POST["user"], $_POST["pw"]);
        }
        else
            parent::view("index");
    }

    //appel la cr�ation de compte utilisateur
    public function CreateUser()
    {
        if ($_POST["Action"] == "CreateUser") {
            parent::model("account");
            echo account::CreateUser($_POST["user"], $_POST["pw"], $_POST["group"]);
        }
        else
            parent::view("index");
    }

    //appel la cr�ation de compte entreprise
    public function CreateBusiness()
    {
        if ($_POST["Action"] == "CreateBusiness") {
            parent::model("account");
            echo account::CreateBusiness($_POST["address"], $_POST["city"], $_POST["email"], $_POST["account"]);
        }
        else
            parent::view("index");
    }
}*/


