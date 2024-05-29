<?php

require_once 'Modele/Modele.php';

class Categorie extends Modele
{
	// Renvoie la liste des repas auxquels est inscrit un utilisateur
	public function getCategorie($idCat)
	{
		$requete = 'SELECT * FROM categorie WHERE id=?,cat=?';
		$categorie = $this->executerRequete($requete,array($id,$cat));
		return $categorie;
	}

    public function getCategories()
	{
		$requete = 'select * from categorie;';
		$resultatsCat = $this->executerRequete($requete);
		return $resultatsCat;
	}
}