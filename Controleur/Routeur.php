<?php

require_once 'Controleur/ControleurUtilisateur.php';
require_once 'Controleur/ControleurRepas.php';
require_once 'Vue/Vue.php';

class Routeur
{
	private $ctrlUtilisateur;
	private $ctrlRepas;

	public function __construct()
	{
		$this->ctrlUtilisateur = new ControleurUtilisateur();
		$this->ctrlRepas = new ControleurRepas();
	}

	// Traite une requête entrante
	public function routerRequete()
	{
		try
		{
			if (isset($_GET['action']))
			{
				$action = htmlspecialchars($_GET['action']);
				if ($action == 'utilisateur')
				{
					if (isset($_GET['id']))
					{
						$idUtilisateur = htmlspecialchars($_GET['id']);
						$this->ctrlUtilisateur->utilisateur($idUtilisateur);
					}
					else
						throw new Exception("Aucun identifiant renseigné");
				}
				else
				{
				
					if ($action == 'repas')
					{
						if (isset($_GET['id']))
						{
							$ident = intval($_GET['id']);
							$this->ctrlRepas->repas($ident);
						}
						else
							throw new Exception("Aucun identifiant renseigné");
					}
					else
					{
						if ($action=='addUser')
						{
							if (isset($_POST['inscrire']))
							{
								$monTableau['nom']=$_POST['nom'];
								$monTableau['prenom']=$_POST['prenom'];
								$monTableau['email']=$_POST['email'];
								$monTableau['motdepasse']=$_POST['motdepasse'];
								$monTableau['categorie']=$_POST['categorie'];
								$this->ctrlUtilisateur->add($monTableau);
							}
							else
							{
								$this->ctrlUtilisateur->add();
							}
							
						}
						else
						{
							if ($action=='addRep')
							{
								if (isset($_POST['soumettre']))
								{
									$jour = $_POST['jour'];
                   					$mois = $_POST['mois'];
                  				    $periode = $_POST['periode'];
									$date = $periode . '-' . $mois . '-' . $jour;
									$monTableau['session']=$_POST['periode'];
									$monTableau['date']=$date;
									$monTableau['periode']=$_POST['ms'];
									$monTableau['valide']=1;
									$util = intval($_GET['id']);
									$this->ctrlRepas->add($util,$monTableau);
								}
								else
								{
									if (isset($_GET['id']))
									{
										$util = intval($_GET['id']);
										$this->ctrlRepas->add($util);
									}
								}
								
							}
							else
								throw new Exception("Action non proposée");
						}
					}
					
				}
			}
			else
			{
				$this->ctrlUtilisateur->utilisateurs();  // action par défaut
			}
		}
		catch (Exception $e)
		{
			$this->erreur($e->getMessage());
		}
	}

	// Affiche une erreur
	private function erreur($msgErreur)
	{
		$vue = new Vue("Erreur");
		$vue->generer(array('msgErreur' => $msgErreur));
	}
}