<?php $titre = 'Les utilisateurs inscrits'; ?>

<?php $banniere = 'Liste des utilisateurs'; ?>

<?php
  foreach ($utilisateurs as $utilisateur): ?>
    <article>
      <header>
        <a href="<?= "index.php?action=utilisateur&id=" . $utilisateur['id'] ?>">
				  <h1><?= $utilisateur['id'] ?></h1>
			  </a>
      </header>
      <p><?= $utilisateur['nom'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>