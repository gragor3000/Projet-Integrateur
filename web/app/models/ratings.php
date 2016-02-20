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
		
    }
}
