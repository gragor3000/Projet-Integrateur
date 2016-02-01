<?php

	class projets extends models{
		
		//Permet d'afficher tout les stages on le stage affecter à l'étudiant
		function ShowTrain($IDTrainer){
			
			//Cherche le stage affecter à l'étudiant
			$TblResult = parent::BDExecute("Select ID, Title, Desc, SupID, Address, Postal from projects where InternID =".$IDTrainer);
			
			//Si le stagiaire n'est pas affecter à un stage, liste tous les stages
			if (count($TblResult) = 0){
				//Récupère les bonnes information de tous les stages
				$TblResult = parent::BDRecherche("Select ID, Title, Score, Desc, SupID, Address, Postal from projects inner join 
													ratings on projects.ID = ratings.ProjectID Where ratings.InternID=".$IDTrainer);
			}
			
			return $TblResult;
		}
		
		//Met à jour la note qu'un élève donne à son stage
		function NoteTrain($Note, $Train, $IDTrainer){
			
			parent::BDExecute("UPDATE ratings SET Score=".$Note."Where ProjectID=".$Train." and InternID=".$IDTrainer);
		}
	}

?>