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
  <a href="<?= "index.php?action=addRep&id=" . $utilisateur['id'] ?>">
	Inscriptions Repas
  </a>

            <form action="addRep" method="post">
                <label for="day">Jour :</label>
                <select id="day" name="day">
                    
                    <?php
                        for ( $i = 1; $i <= 31; $i++) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                </select>
                <br><br>
        
                <label for="month">Mois :</label>
                <select id="month" name="month">
                    <option value="1">Janvier</option>
                    <option value="2">Février</option>
                    <option value="3">Mars</option>
                    <option value="4">Avril</option>
                    <option value="5">Mai</option>
                    <option value="6">Juin</option>
                    <option value="7">Juillet</option>
                    <option value="8">Août</option>
                    <option value="9">Septembre</option>
                    <option value="10">Octobre</option>
                    <option value="11">Novembre</option>
                    <option value="12">Décembre</option>
                </select>
                <br><br>
        
                <label for="year">Année :</label>
                <select id="year" name="year">
                    <!-- Générer des options pour les années de 1900 à 2100 -->
                    <?php
                        for ( $i = 2024; $i <= 2040; $i++) {
                          echo'<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                </select>
                <br><br>
        
                <label>Moment de la journée :</label>
                <input type="radio" id="morning" name="timeOfDay" value="morning">
                <label for="morning">Matin</label>
                <input type="radio" id="evening" name="timeOfDay" value="evening">
                <label for="evening">Soir</label>
                <br><br>
        
                <input type="submit" value="Soumettre">
            </form>
        </body>
        </html>
        
</article>