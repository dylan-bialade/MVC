<?php

abstract class Modele
{
	//Attribut de la classe PDO d'accès à la base
	private $bdd;

	//Exécute une requête SQL éventuellement paramétrée
	protected function executerRequete($sql, $params = null)
	{
		if ($params == null)
		{
			$resultat = $this->getConnexionBdd()->query($sql);    //Exécution directe
		}
		else
		{
			$resultat = $this->getConnexionBdd()->prepare($sql);  //Requête préparée
			$resultat->execute($params);
		}
		return $resultat;
	}

	//Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
	private function getConnexionBdd()
	{
		if ($this->bdd == null)
		{
			$this->bdd = new PDO('mysql:host=localhost;dbname=base_garbadge;charset=utf8', 'root','');
		}
		return $this->bdd;
	}
}