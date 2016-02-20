<?php

class interns extends models{
    
    //Retourne tous les comptes d'un type.
    public function ShowInterns() {
        $result = parent::DBSearch("SELECT ID,name,user,rank FROM users WHERE rank = 2");

        //Générer un tableau d'objet.
        foreach ($result as $user)
            $obj[$user['ID']] = new obj($user);

        return $obj;
    }
    
}

?>