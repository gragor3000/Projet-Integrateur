<?php

	class projets extends models{
		
		//Permet d'afficher tout les stages on le stage affecter � l'�tudiant
		function ShowTrain($IDTrainer){
			
			//Cherche le stage affecter � l'�tudiant
			$TblResult = parent::BDExecute("Select * where InternID =".$IDTrainer);
			
			//Si le stagiaire n'est pas affecter � un stage, liste tous les stages
			if (count($TblResult) = 0){
				//R�cup�re les bonnes information de tous les stages
				$TblResult = parent::BDRecherche("Select * from projects inner join ratings on projects.ID = ratings.projectID 
													Where ratings.internID=".$IDTrainer);
			}
			
			return $TblResult;
		}
		
		//Met � jour la note qu'un �l�ve donne � son stage
		function NoteTrain($Note, $Train, $IDTrainer){
			
			parent::BDExecute("UPDATE ratings SET score=".$Note." Where projectID=".$Train." and internID=".$IDTrainer);
		}
		
		//Fonction permenttant de r�cup�rer la description du stage (Pour faire le Ajax sur les stages)
		public function DescTrain ($Train, $IDTrainer){
			return parent::BDExecute("Select desc, supName, equip, info from projects Where ID=".$Train);
		}
	}

?>