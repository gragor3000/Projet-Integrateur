<?php

/////////// Utiliser ShowUsersByRank d'Account ///////////////////

/*
  2016-02-10 Marc Lauzon, Sam Baker
  RÉVISÉ.
 */

class interns extends models {

    //Retourner tous les stagiaires
    public function ShowInterns() {
        $result = parent::DBSearch("Select ID, name FROM users WHERE rank = 2");

        foreach ($result as $item) {
            $intern[$item["ID"]] = new obj($item);
        }
    }

}
