<?php
/**
 * Created by PhpStorm.
 * User: Mic
 * Date: 03/02/2016
 * Time: 13:19
 */
class install extends Controller
{
    private $installer;//pointe vers la classe model

    //Constructeur de la classe
    public function __construct()
    {
        parent::model("models");
        $this->installer = new installer();
    }

    //appelle la méthode deployDb pour déployer la base de donnée
    public function deploy($_dbName,$_username,$_pw)
    {
        $this->installer->DeloyDb($_dbName,$_username,$_pw);
    }

}