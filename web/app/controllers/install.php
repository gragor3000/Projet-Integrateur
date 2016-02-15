<?php

/*
  deploy :	TESTER | FONCTIONNEL -> 2016-02-11 Marc Lauzon
 */

class install extends Controller {

    private $installer; //pointe vers la classe model

    //Constructeur de la classe

    public function __construct() {
        parent::model("models");
        parent::model("installer");
        $this->installer = new installer();
    }

    //appelle la méthode deployDb pour déployer la base de donnée
    public function deploy() {
        $this->installer->DeployDb($_POST["name"], $_POST["user"], $_POST["pass"], $_POST["adminName"], $_POST["adminUser"], $_POST["adminPass"]);
        ////// MANQUE UN RETOUR /////
    }

}
