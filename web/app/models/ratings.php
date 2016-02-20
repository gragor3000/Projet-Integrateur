<?php

/*
  2016-02-10 Marc Lauzon, Sam Baker
  RÉVISÉ.
 */

class ratings extends models {

    //retourne les notes mit par les étudiants
    public function ShowRatingsByIntern($_internID){
        $result = parent::DBSearch("SELECT * FROM ratings WHERE internID=" . $_internID);

        foreach ($result as $item)
            $rating[$item['ID']] = new obj($item);

        return $rating;
    }
	
	//retourne la note mit par un étudiant pour un stage particulier
	public function FindRateByID($_internID, $_projectID){
		
		return parent::DBQuery("SELECT * FROM ratings WHERE internID=" . $_internID . " and projectID=".$_projectID);
	}
	
	//Permet de notez un stage
	public function RatingProject($_internID, $_projectID, $_value){
		
	}
	
	

}
