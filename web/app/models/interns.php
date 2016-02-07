<?php
/**
 * Created by PhpStorm.
 * User: Mic
 * Date: 07/02/2016
 * Time: 15:57
 */

class interns extends models
{
    //retourne tous les stagiaires
    public function ShowInterns()
    {
        return parent::DBSearch("Select name FROM users WHERE rank = 2");
    }

    //retourn les évaluation d'un stagiaire
    public function ShowEval($_id)
    {
        $result = parent::DBSearch("SELECT user FROM users WHERE ID = ".$_id);
        $user = $result[0][0];

        /**** va chercher les info dans fichier text *****/
    }

    //met à jour l'évaluation d'un stagiaire
    public function UpdateEval($_id)
    {
        $result = parent::DBSearch("SELECT user FROM users WHERE ID = ".$_id);
        $user = $result[0][0];

        /**** modifie le fichier du stagiaire ****/
    }
}