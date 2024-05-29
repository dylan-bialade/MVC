<?php

require_once 'Modele/Utilisateur.php';
require_once 'Modele/Categorie.php';
require_once 'Vue/Vue.php';

class ControleurUtilisateur
{
	private $utilisateur;
	private $categorie;

	public function __construct()
	{
		$this->utilisateur = new Utilisateur();
		$this->categorie = new Categorie();
	}

	//Affiche les informations d'un utilisateur
	public function utilisateur($identifiant)
	{
		$utilisateur = $this->utilisateur->getUtilisateur($identifiant);
		$vue = new Vue("Utilisateur");
		$vue->generer(array('utilisateur' => $utilisateur));
	}
	public function add($tab = null)
	{
		if ($tab == null)
		{
			$categories = $this->categorie->getCategories();
			$vue = new Vue("Inscription");
			$vue->generer(array('listeCategories' => $categories));
		}
		else
		{
			$utilisateur = $this->utilisateur->addUser($tab['nom'],$tab['prenom'],$tab['email'],$tab['motdepasse'],$tab['categorie']);
	
			$this->utilisateurs();
		}
	}

	//public function add($nom,$prenom,$email,$mot_de_passe,$categorie)
	//{
	//	$utilisateur = $this->utilisateur->addUser($nom,$prenom,$email,$mot_de_passe,$categorie);
	//	$this->utilisateurs();
	//}
	//Affiche la liste de tous les utilisateurs
	public function utilisateurs()
	{
		$utilisateurs = $this->utilisateur->getUtilisateurs();
		$vue = new Vue("Utilisateurs");
		$vue->generer(array('utilisateurs' => $utilisateurs));
	}
}