<?php

/*
  2016-02-10 Marc Lauzon, Sam Baker
  RÉVISÉ.
 */

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
        return new obj(parent::DBQuery("Select * from projects inner join business where ID =" . $_projectId));
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
    public function CreateProject($_title, $_supName, $_supTitle, $_supEmail, $_supTel, $_desc, $_equip, $_extra, $_info, $_cieID)
    {
        parent::DBExecute("INSERT INTO projects (title, supName, supTitle, supEmail, supTel, descr, equip, extra, info, businessID) 
				Values  ('" . $_title . "','" . $_supName . "','" . $_supTitle . "','" . $_supEmail . "','" . $_supTel . "',
				'" . $_desc . "','" . $_equip . "','" . $_extra . "','" . $_info . "'," . $_cieID . ");");
    }

    //Fonction permenttant de modifier un projet dans la base de donnée
    public function UpdateProject($_projectID, $_title, $_supName, $_supTitle, $_supEmail, $_supTel, $_desc, $_equip, $_extra, $_info, $_cieID)
    {
        parent::DBExecute("UPDATE projects SET title=" . $_title .
            ", supName=" . $_supName .
            ", supTitle=" . $_supTitle .
            ", supEmail=" . $_supEmail .
            ", supTel=" . $_supTel .
            ", descr=" . $_desc .
            ", equip=" . $_equip .
            ", extra=" . $_extra .
            ", info=" . $_info .
            " WHERE ID=" . $_projectID .
            " AND businessID=" . $_cieID);
    }

    //valide un projet
    public function ValidateProject($_projectID)
    {
        parent::DBExecute("UPDATE projects SET status = 1 WHERE ID = ".$_projectID);

        $projectTitle = parent::DBQuery("SELECT title FROM project
                                       WHERE project.ID = " . $_projectID);

        $businessID = parent::DBQuery("SELECT business.ID FROM business
                                       INNER JOIN projects ON business.ID = project.businessID
                                       WHERE project.ID = " . $_projectID);

        $result = parent::DBQuery("SELECT email,userID FROM business WHERE ID =" . $businessID);
        $user = parent::DBQuery("SELECT name FROM users WHERE ID=" . $result['userID']);

        $msg = "Votre projet, " . $projectTitle[0][0] . ", de l'entreprise,". $user["name"] .",à été autorisé";

        //Envoi du courriel de confirmation.
        mail($result['email'], $user["name"] . " projet validée", $msg);
    }

    //refuse un projet
    public function DenyProject($_projectID)
    {
        $projectTitle = parent::DBQuery("SELECT title FROM project
                                       WHERE project.ID = " . $_projectID);

        $businessID = parent::DBQuery("SELECT business.ID FROM business
                                       INNER JOIN projects ON business.ID = project.businessID
                                       WHERE project.ID = " . $_projectID);

        $result = parent::DBQuery("SELECT email,userID FROM business WHERE ID =" . $businessID);
        $user = parent::DBQuery("SELECT name FROM users WHERE ID=" . $result['userID']);

        parent::DBExecute("DELETE FROM projects WHERE ID = ".$_projectID);

        $msg = "Votre projet, " . $projectTitle[0][0] . ", de l'entreprise,". $user["name"] .",à été refusé";

        //Envoi du courriel de confirmation.
        mail($result['email'], $user["name"] . " projet validée", $msg);
    }

    //Jumeller un stagiaire à un projet
    public function PairProjectToIntern($_projectId, $_internId)
    {
        parent::DBExecute("UPDATE projects SET internID = " . $_internId . "WHERE ID = " . $_projectId);
    }


}

?>