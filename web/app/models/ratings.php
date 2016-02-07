<?php

/**
 * Created by PhpStorm.
 * User: Mic
 * Date: 07/02/2016
 * Time: 14:26
 */
class ratings extends models
{
    //retourne les notes mit par les étudiants
    public function ShowInternsRatings()
    {
        return parent::DBSearch("SELECT users.name,projects.title,ratings.score
                                FROM (users INNER JOIN ratings ON ratings.internID = users.ID)
                                INNER JOIN projects ON ratings.projectID = projects.ID");
    }
}