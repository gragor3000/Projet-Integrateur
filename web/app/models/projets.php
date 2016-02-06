<?php

class projects extends models
{

    //Permet d'afficher tout les stages on le stage affecter � l'�tudiant
    function ShowTrain($IDTrainer)
    {

        //Cherche le stage affecter � l'�tudiant
        $TblResult = parent::BDExecute("Select * from projects where internID =" . $IDTrainer);

        //Si le stagiaire n'est pas affecter � un stage, liste tous les stages
        if (count($TblResult) = 0) {
            //R�cup�re les bonnes information de tous les stages
            $TblResult = parent::BDRecherche("Select * from projects inner join ratings on projects.ID = ratings.projectID
													Where ratings.internID=" . $IDTrainer . " and projects.status =1");
        }

        return $TblResult;
    }

    //Permet d'afficher tout les stages qu'un supperviseur particulier � proposer
    function ShowSupTrain($IDSup)
    {

        //Trouve tous les stages qui on �t� ajout� par l'entreprise dont l'id est pass� en param�tre
        return parent::BDRecherche("Select * from projects Where entID=" . $IDSup);
    }

    //Permet d'afficher tout les stages au coordinateur selon leur status
    function ShowCoorTrain($Status)
    {

        //Trouve tous les stages qui on �t� ajout� par l'entreprise dont l'id est pass� en param�tre
        return parent::BDRecherche("Select * from projects Where status=" . $Status);
    }

    //Met � jour la note qu'un �l�ve donne � son stage
    function NoteTrain($Note, $Train, $IDTrainer)
    {

        parent::BDExecute("UPDATE ratings SET score=" . $Note . " Where projectID=" . $Train . " and internID=" . $IDTrainer);
    }

    //Fonction permenttant de r�cup�rer la description du stage (Pour faire le Ajax sur les stages)
    public function DescTrain($Train, $IDTrainer)
    {
        return parent::BDExecute("Select desc, supName, equip, info from projects Where ID=" . $Train);
    }

    //Fonction permetant de modifier le status d'un projet
    public function TrainStatus($IDTrain, $IsAccepted)
    {

        //S'il est accepter, changer le status pour le bon num�ro
        if ($IsAccepted) {
            parent::BDExecute("UPDATE projects Set status=1 Where ID=" . $IDTrain);
        } else {    //Sinon m'�tre le status qui implique qu'il a �t� refuser
            parent::BDExecute("UPDATE projects Set status=2 Where ID=" . $IDTrain);
        }
    }

    //Fonction permenttant de modifier un projet dans la base de donn�e
    public function EditTrain($IDTrain, $Title, $SupName, $SupTitle, $SupEmail, $SupTel, $Desc, $Equip, $Extra, $IDSup)
    {

        //Si le superviseur � travailler sur un projet d�j� existant, il fera une modification
        if ($IDTrain >= 0) {
            parent::BDExecute("UPDATE projects Set title="$Title . ", supName=" . $SupName . ", supTitle=" . $SupTitle . ", supEmail=" . $SupEmail .
            ", supTel=" . $SupTel . ", desc=" . $Desc . ", equip=" . $Equip . ", extra=" . $Extra . ", status = 0
									 Where ID=" . $IDTrain . " and entID=" . $IDSpv);
			} else {    //Sinon cela fera un ajout dans la base de donn�e
            parent::BDExecute("Insert into projects(title,supName,supTitle,supEmail,supTel,desc,equip,extra,status,entID)
									values(" . $Title . "," . $SupName . "," . $SupTitle . "," . $SupEmail . "," . $SupTel . "," . $Desc . "," . $Equip . "," . $Extra . ", 0," . $IDSup . ")");
        }
    }

    //retourne les projets non validée
    public function ShowInactiveProjects()
    {
        return parent::DBSearch("SELECT * FROM projects WHERE status = 0");
    }

    //valide un projet
    public function ValidateProjects($id)
    {
        parent::DBExecute("UPDATE projects SET status = 1 WHERE ID = ".$id);
    }

    //supprime un projet
    public function DeleteProject($id)
    {
        parent::DBExecute("DELETE FROM projects WHERE ID =".$id);
    }
}

?>