<?php
class projects extends models
{

    function ShowProjectByStatus($_status)
    {
        $result = parent::DBSearch("Select * from projects WHERE projects.status =" . $_status);

        $projects = null;    //Contient tous les projets à récupérer

        foreach ($result as $item) {
            $projects[$item["ID"]] = new obj($item); //un projet du tableau
        }

        return $projects;
    }

    //Permet d'afficher le stage affecté
    function ShowProjectByIntern($_internId)
    {

        //Cherche si un stage à été affecter à l'étudiant
        if (parent::DBQuery("Select * from projects where internID =" . $_internId)) {
            //Si oui, renvoie le stage
            return new obj(parent::DBQuery("Select * from projects where internID =" . $_internId));
        } else {    //Sinon renvoie null
            return NULL;
        }
    }

    //Permet d'afficher un stage
    function ShowProjectByID($_projectId)
    {
        //Cherche le stage
        return new obj(parent::DBQuery("Select * from projects where ID =" . $_projectId));
    }

    //Permet d'afficher tout les stages qu'un superviseur particulier à proposer
    function ShowProjectsByCie($_cie)
    {
        //Trouve tous les stages qui on été ajouté par l'entreprise dont l'id est passé en paramètre
        $result = parent::DBSearch("Select * from projects Where businessID=" . $_cie);

        $projects = null;

        foreach ($result as $item) {
            $projects[$item["ID"]] = new obj($item); //un projet du tableau
        }

        return $projects;
    }

    //Mettre à jour la note qu'un élève donne à son stage
    function RateProject($_internId, $_projectId, $_score)
    {
        parent::DBExecute("UPDATE ratings SET score=" . $_score . " Where projectID=" . $_projectId . " and internID=" . $_internId);
    }


    //Fonction permettant de modifier le status d'un projet
    public function EditProjectStatus($_internId, $_status)
    {
        parent::DBExecute("UPDATE projects Set status=" . $_status . " Where ID=" . $_internId);
    }

    //Fonction permenttant de modifier un projet dans la base de donnée
    public function CreateProject($_title, $_supName, $_supTitle, $_supTel, $_supEmail, $_desc, $_equip, $_extra, $_info, $_cieID)
    {
        parent::DBExecute("INSERT INTO projects (title, supName, supTitle, supEmail, supTel, descr, equip, extra, info, businessID) 
				Values  ('" . addslashes($_title) . "','" . addslashes($_supName) . "','" . addslashes($_supTitle) . "','" . $_supEmail . "','" . $_supTel . "',
				'" . addslashes($_desc) . "','" . addslashes($_equip) . "','" . addslashes($_extra) . "','" . addslashes($_info) . "'," . $_cieID . ");");
    }

    //Fonction permettant de modifier un projet dans la base de donnée
    public function UpdateProject($_projectID, $_title, $_supName, $_supTitle, $_supTel, $_supEmail, $_desc, $_equip, $_extra, $_info)
    {
        parent::DBExecute
		("UPDATE projects 
		    SET 
			title='" . $_title . 
            "', supName='" . addslashes($_supName) .
            "', supTitle= '" . addslashes($_supTitle) .
            "', supEmail= '" . addslashes($_supEmail) .
            "', supTel= '" . addslashes($_supTel) .
            "', descr= '" . addslashes($_desc) .
            "', equip= '" . addslashes($_equip) .
            "', extra= '" . addslashes($_extra) .
            "', info= '" . addslashes($_info) . 
            "'WHERE ID =" . $_projectID . ";"
		);
    }

    //valide un projet
    public function ValidateProject($_projectID)
    {
        parent::DBExecute("UPDATE projects SET status = 1 WHERE ID = ".$_projectID);

        $projectTitle = parent::DBQuery("SELECT title FROM projects
                                       WHERE projects.ID = " . $_projectID);

        $businessID = parent::DBQuery("SELECT business.ID FROM business
                                       INNER JOIN projects ON business.ID = projects.businessID
                                       WHERE projects.ID = " . $_projectID);

        $result = parent::DBQuery("SELECT email,userID FROM business WHERE ID =" . $businessID['ID']);
        $user = parent::DBQuery("SELECT name FROM users WHERE ID=" . $result['userID']);

        $msg = "Votre projet, " . $projectTitle['title'] . ", de l'entreprise,". $user["name"] .",a été autorisé.";

        //Envoi du courriel de confirmation.
        //mail($result['email'], $user["name"] . " projet validé", $msg);
    }

    //refuse un projet
    public function DenyProject($_projectID)
    {
        $projectTitle = parent::DBQuery("SELECT title FROM projects
                                       WHERE ID = " . $_projectID);

        $businessID = parent::DBQuery("SELECT business.ID FROM business
                                       INNER JOIN projects ON business.ID = projects.businessID
                                       WHERE projects.ID = " . $_projectID);

        $result = parent::DBQuery("SELECT email,userID FROM business WHERE ID = " . $businessID['ID']);
        $user = parent::DBQuery("SELECT name FROM users WHERE ID=" . $result['userID']);

		parent::DBExecute("DELETE FROM ratings WHERE projectID = ".$_projectID);
        parent::DBExecute("DELETE FROM projects WHERE ID = ".$_projectID);

        $msg = "Votre projet, " . $projectTitle['title'] . ", de l'entreprise,". $user["name"] .",a été refusé.";


        //Envoi du courriel de confirmation.
        //mail($result['email'], $user["name"] . " projet non validé", $msg);
    }

    //Jumeller un stagiaire à un projet
    public function PairProjectToIntern($_projectId, $_internId)
    {
        parent::DBExecute("UPDATE projects SET internID = " . $_internId . " WHERE ID = " . $_projectId);
    }

	//Supprimer un projet de stage par un superviseur
    public function DeleteProject($_projectId)
	{
		parent::DBExecute("DELETE FROM ratings WHERE projectID = ".$_projectId);
        parent::DBExecute("DELETE FROM projects WHERE ID = ".$_projectId);
	}
}

?>