<?php

require_once 'Modele/Modele.php';

class Utilisateur extends Modele
{
	//Renvoie la liste de tous les utilisateurs
	public function getUtilisateurs()
	{
		$requete = 'select * from utilisateur order by categorie, nom, prenom';
		$resultats = $this->executerRequete($requete);
		return $resultats;
	}
	public function addUser($nom,$prenom,$email,$motdepasse,$categorie){
		$requete="INSERT INTO utilisateur(nom,prenom,email,motdepasse,categorie) VALUES (?,?,?,?,?);";
		$resultat=$this->executerRequete($requete,array($nom,$prenom,$email,$motdepasse,$categorie));
		return $resultat;
		// if (isset($_POST['inscrire']))
		// {
		// 	if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mot_de_passe']) && isset($_POST['categorie']))
		// 	{
				
		// 		$sql = "INSERT INTO utilisateur(nom,prenom,email,motdepasse,categorie) VALUES (:nom,:pre,:ema,:mdp,:cat);";
		// 		$stmt=$resultats = $this->executerRequete($sql);
		// 		$stmt->bindValue(':nom', $nom);
		// 		$stmt->bindValue(':pre', $prenom);
		// 		$stmt->bindValue(':ema', $email);
		// 		$stmt->bindValue(':mdp', $mot_de_passe);
		// 		$stmt->bindValue(':cat', $categorie);
		// 		$stmt->execute();
		// 		if (!$stmt)
		// 			echo "Inscription non effectuée";
		// 		else
		// 			echo "Nouvel utilisateur ajouté";
		// 	}

		// }
	}
	//Renvoie les informations d'un utilisateur
	public function getUtilisateur($id)
	{
		$requete = 'SELECT utilisateur.id, nom, prenom, email, libelle FROM utilisateur INNER JOIN categorie ON utilisateur.categorie = categorie.id WHERE utilisateur.id=?';
		$utilisateur = $this->executerRequete($requete,array($id));
		if ($utilisateur->rowCount() == 1)
			return $utilisateur->fetch();  // Retourne la première ligne de résultat
		else
			throw new Exception("Aucun utilisateur ne correspond à l'identifiant '$id'");
	}
}