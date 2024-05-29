<?php $titre = "Utilisateur ".$utilisateur['id']; ?>

<?php $banniere = 'Informations concernant cet utilisateur'; ?>

<article>
  <header>
    <h1><?= $utilisateur['nom']." ".$utilisateur['prenom'] ?></h1>
  </header>
  Adresse de messagerie : <?= $utilisateur['email'] ?>
  <br />
  Catégorie : <?= $utilisateur['libelle'] ?>
  <br />
  <a href="<?= "index.php?action=repas&id=" . $utilisateur['id'] ?>">
	Inscriptions aux repas
  </a>
  <a href="<?= "index.php?action=addUser&id=" . $utilisateur['id'] ?>">
	Inscriptions nouveau utilisateur
  </a>
  <a href="<?= "index.php?action=addRep&id=" . $utilisateur['id'] ?>">
	Inscriptions Repas
  </a>
 
</article>
<hr />