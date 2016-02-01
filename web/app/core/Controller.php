<?php

class Controller{
	
	//Contient le chemin pour accèder au dossier contenant les différent Xml
	$DefaultXMLPath = "../models/xml/";
	
	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
	}

	public function view($view, $data = [])
	{
		require_once '../app/views/' . $view . '.php';
	}	
}