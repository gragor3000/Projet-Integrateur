<?php

//Contient toutes les informations d'un projet
class project
{
    private $properties;

    public function __construct($_data)
    {
        $this->properties = $_data;
    }

    public function __get($property)
    {
        return $this->properties[$property];
    }
}

//Contient les informations d'une évaluation
class rating
{
    private $properties;

    public function __construct($_data)
    {
        $this->properties = $_data;
    }

    public function __get($property)
    {
        return $this->properties[$property];
    }
}

class projects extends models
{
	//Permet d'afficher tout les projets
    function ShowProjects($_status)
	{
		$result = parent::BDRecherche("Select * from projects WHERE projects.status =" . $_status);
		
		$tabproject = new array(); //tableau des projets selon un statuts
	   
	   foreach($item in $result)
	   {
		   $project = new project ($item); //un projet du tableau
		   array_push($tabproject, $project);
	   }
	   
		return $projects;		
	}

    //Permet d'afficher le stage affecté
    function ShowProjectIntern($_internId)
    {
        //Cherche le stage affecter � l'�tudiant
		return new project(parent::BDExecute("Select * from projects where internID =" . $_internId));
    }
	
	//Permet d'afficher un stage
    function ShowProject($_projectId)
    {
        //Cherche le stage
		return new project(parent::BDExecute("Select * from projects where ID =" . $_projectId));
    }

    //Permet d'afficher tout les stages qu'un superviseur particulier à proposer
    function ShowProjectsCie($_cie)
    {
        //Trouve tous les stages qui on �t� ajout� par l'entreprise dont l'id est pass� en param�tre
       $result = parent::BDRecherche("Select * from projects Where entID=" . $_cie);			
	   
	   $tabproject = new array(); //tableau des projets d'une compagnie
	   
	   foreach($item in $result)
	   {
		   $project = new project ($item); //un projet du tableau
		   array_push($tabproject, $project);
	   }
	   
		return $projects;
    }

    //Met � jour la note qu'un �l�ve donne � son stage
    function NoteProject($_note, $_projectId, $_internId)
    {
        parent::BDExecute("UPDATE ratings SET score=" . $_note . " Where projectID=" . $_projectId . " and internID=" . $_internId);
    }

    //Fonction permettant de modifier le status d'un projet
    public function EditProjectStatus($_internId, $IsAccepted)
    {
        //S'il est accepté, changer le status pour le bon num�ro
        if ($IsAccepted) {
            parent::BDExecute("UPDATE projects Set status=1 Where ID=" . $_internId);
        } else {    //Sinon m'�tre le status qui implique qu'il a �t� refuser
            parent::BDExecute("UPDATE projects Set status=2 Where ID=" . $_internId);
        }
    }

    //Fonction permenttant de modifier un projet dans la base de donn�e
    public function EditProject($_projectId, $_title, $_supName, $_supTitle, $_supEmail, $_supTel, $_desc, $_equip, $_extra, $_supID)
    {

        //Si le superviseur � travailler sur un projet d�j� existant, il fera une modification
        if ($_projectID >= 0) {
            parent::BDExecute("UPDATE projects Set title=".$_title . ", supName=" . $_supName . ", supTitle=" . $_supTitle . ", supEmail=" . $_supEmail .
            ", supTel=" . $_supTel . ", desc=" . $_desc . ", equip=" . $_equip . ", extra=" . $_extra . ", status = 0
									 Where ID=" . $_projectId . " and entID=" . $_supID);
			} else {    //Sinon cela fera un ajout dans la base de donn�e
            parent::BDExecute("Insert into projects(title,supName,supTitle,supEmail,supTel,desc,equip,extra,status,entID)
									values(" . $_title . "," . $_supName . "," . $_supTitle . "," . $_supEmail . "," . $_supTel . "," . $_desc . "," . $_equip . "," . $_extra . ", 0," . $_supID . ")");
        }
    }

    //supprime un projet
    public function DeleteProject($_projectId)
    {
        parent::DBExecute("DELETE FROM projects WHERE ID =".$_projectId);
    }

    //Jumelle un stagiaire a un projet
    public function PairInternProject($_internId,$_projectId)
    {
        parent::DBExecute("UPDATE projects SET internID = ".$_internId ."WHERE ID = ".$_projectId);
    }
}

?>