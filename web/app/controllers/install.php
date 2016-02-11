<?php

/*
2016-02-10 Marc Lauzon, Sam Baker
RÉVISÉ
*/

class install extends Controller
{
    private $installer;//pointe vers la classe model

    //Constructeur de la classe
    public function __construct()
    {
        parent::model("models");
		parent::model("installer");
        $this->installer = new installer();
    }

    //appelle la méthode deployDb pour déployer la base de donnée
    public function deploy()
    {
		echo('this');
        $this->installer->DeloyDb($_POST["name"],$_POST["user"],$_POST["pass"],$_POST["adminName"],$_POST["adminUser"],$_POST["adminPass"]);
		echo('that');
    }

}