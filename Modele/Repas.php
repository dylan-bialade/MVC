<?php

require_once 'Modele/Modele.php';

class Repas extends Modele
{
	// Renvoie la liste des repas auxquels est inscrit un utilisateur
	public function getRepas($idS)
	{
		$requete = 'SELECT * FROM repas WHERE utilisateur=?';
		$repas = $this->executerRequete($requete,array($idS));
		return $repas;
	}
	public function addRep($session,$date,$periode,$valide,$utilisateur)
	{
		
		$requete="INSERT INTO repas(session,date,periode,valide,utilisateur) VALUES (?,?,?,?,?);";//utilisateur = id utilisateur
		$resultat=$this->executerRequete($requete,array($session,$date,$periode,$valide,$utilisateur));
		return $resultat;
	}
}