<?php $titre = "Utilisateur ".$utilisateur['id']; ?>

<?php $banniere = 'Inscriptions repas'; ?>

<article>
  <header>
    <h1><?= $utilisateur['nom']." ".$utilisateur['prenom'] ?></h1>
  </header>
  Adresse de messagerie : <?= $utilisateur['email'] ?>
  <br />
  Catégorie : <?= $utilisateur['libelle'] ?>
  <br />
  <hr />
  <h1>Liste des repas auxquels il est inscrit :</h1>
  <ul>
  <?php foreach ($repas as $rep): ?>
  <li>Le <time><?= $rep['date'] ?></time> à <?= $rep['periode'] ?></li>
  <?php endforeach; ?>
  </ul>     
</article>