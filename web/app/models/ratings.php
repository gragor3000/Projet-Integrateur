<?php

/*
  2016-02-10 Marc Lauzon, Sam Baker
  RÉVISÉ.
 */

class ratings extends models {

    //Retournes toues les évaluations.
    public function ShowAllRatings(){
        $result = parent::DBSearch("SELECT score, projectID, internID FROM ratings");
        return $result;
    }
	
    //Permet de notez un stage
    public function RatingProject($_internID, $_projectID, $_value){
        parent::DBExecute("INSERT INTO ratings (score,internID, projectID)
							VALUES(
							'" . $_value . "',
							'" . $_internID . "',
							" . $_projectID . ")");
    }
    
    //retourne la note mit par un étudiant pour un stage particulier
    public function FindRateByID($_internID, $_projectID){
	return parent::DBQuery("SELECT * FROM ratings WHERE internID=" . $_internID . " and projectID=".$_projectID);
    }
}
