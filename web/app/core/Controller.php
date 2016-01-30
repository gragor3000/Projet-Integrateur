<?php

class Controller{
	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
	}

	public function view($view, $data = [])
	{
		require_once '../app/views/' . $view . '.php';
	}	
	
	//Se connecte à une base de donnée précise et renvoie la connexion
	private function Connexion(){
		
		//Temporaire, mettre les bonne valeur
		$BD = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'User', 'Passe');
		
		return $BD;		
	}

	//deplacer vers le modele
	//Fonction qui permet de récupérer toute les informations d'une recherche
	protected function BDRecherche($Commande){
		
		//Récupère la connexion à la base de donnée
		$BD = Connexion();
		
		$Requete = $BD->prepare($Commande);
		$Requete->execute();
		$Resultat = $Requete->fetchAll(PDO::FETCH_ASSOC);
		
		$BD = null;
		
		return $Resultat;
	}
	
	//Fonction qui permet de récupérer la première information d'une recherche
	protected function BDExecute($Commande){
		
		//Récupère la connexion à la base de donnée
		$BD = Connexion();
		
		$Requete = $BD->prepare($Commande);
		$Requete->execute();
		$Resultat = $Requete->fetch(PDO::FETCH_ASSOC);
		
		$BD = null;
		
		return $Resultat;
	}
}