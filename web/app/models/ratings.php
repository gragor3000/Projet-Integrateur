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
		
		//Si aucune note n'avait été donné avant, la rajouter.
		if(parent::DBQuery("SELECT * FROM ratings WHERE internID=" . $_internID . " and projectID=".$_projectID) == null){
			parent::DBExecute("INSERT INTO ratings (score,internID, projectID)
								VALUES(
								" . $_value . ",
								" . $_internID . ",
								" . $_projectID . ")");
		}
		else{	//Sinon, mettre à jour la base de donnée
			parent::DBExecute("Update ratings 
								SET
								score = " . $_value . "
								WHERE
								internID = " . $_internID . " AND
								projectID = " . $_projectID . ";");
		}
    }
    
    //retourne la note mit par un étudiant pour un stage particulier
    public function FindRateByID($_internID, $_projectID){
		return parent::DBQuery("SELECT * FROM ratings WHERE internID=" . $_internID . " AND projectID=".$_projectID);
    }
}
