<?php

require_once 'Modele/Utilisateur.php';
require_once 'Modele/Repas.php';
require_once 'Vue/Vue.php';

class ControleurRepas
{
	private $utilisateur;
	private $repas;

	public function __construct()
	{
		$this->utilisateur = new Utilisateur();
		$this->repas = new Repas();
	}

	//Affiche les repas auxquels est inscrit un utilisateur
	public function repas($identifiant)
	{
		$utilisateur = $this->utilisateur->getUtilisateur($identifiant);
		$repas = $this->repas->getRepas($identifiant);
		$vue = new Vue("Repas");
		$vue->generer(array('utilisateur' => $utilisateur, 'repas' => $repas));
	}
	public function add($tab = null)
	{
		if ($tab == null)
		{
			
			$vue = new Vue("InscriptionRepas");
			$vue->generer(array());
		}
		else
		{
			$repas = $this->repas->addUser($tab['session'],$tab['date'],$tab['periode'],$tab['valide']);
	
			$this->repas();
		}
	}
}