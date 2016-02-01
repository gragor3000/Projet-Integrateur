<?php

	class projets extends models{
		
		//Permet d'afficher tout les stages on le stage affecter à l'étudiant
		function ShowTrain($IDTrainer){
			
			//Cherche le stage affecter à l'étudiant
			$TblResult = parent::BDExecute("Select * where InternID =".$IDTrainer);
			
			//Si le stagiaire n'est pas affecter à un stage, liste tous les stages
			if (count($TblResult) = 0){
				//Récupère les bonnes information de tous les stages
				$TblResult = parent::BDRecherche("Select * from projects inner join ratings on projects.ID = ratings.projectID 
													Where ratings.internID=".$IDTrainer);
			}
			
			return $TblResult;
		}
		
		//Met à jour la note qu'un élève donne à son stage
		function NoteTrain($Note, $Train, $IDTrainer){
			
			parent::BDExecute("UPDATE ratings SET score=".$Note." Where projectID=".$Train." and internID=".$IDTrainer);
		}
		
		//Fonction permenttant de récupérer la description du stage (Pour faire le Ajax sur les stages)
		public function DescTrain ($Train, $IDTrainer){
			return parent::BDExecute("Select desc, supName, equip, info from projects Where ID=".$Train);
		}
	}

?>