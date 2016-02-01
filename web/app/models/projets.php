<?php

	class projets extends models{
		
		//Permet d'afficher tout les stages on le stage affecter � l'�tudiant
		function ShowTrain($IDTrainer){
			
			//Cherche le stage affecter � l'�tudiant
			$TblResult = parent::BDExecute("Select ID, Title, Desc, SupID, Address, Postal from projects where InternID =".$IDTrainer);
			
			//Si le stagiaire n'est pas affecter � un stage, liste tous les stages
			if (count($TblResult) = 0){
				//R�cup�re les bonnes information de tous les stages
				$TblResult = parent::BDRecherche("Select ID, Title, Score, Desc, SupID, Address, Postal from projects inner join 
													ratings on projects.ID = ratings.ProjectID Where ratings.InternID=".$IDTrainer);
			}
			
			return $TblResult;
		}
		
		//Met � jour la note qu'un �l�ve donne � son stage
		function NoteTrain($Note, $Train, $IDTrainer){
			
			parent::BDExecute("UPDATE ratings SET Score=".$Note."Where ProjectID=".$Train." and InternID=".$IDTrainer);
		}
	}

?>