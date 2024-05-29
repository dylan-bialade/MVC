<?php $titre = 'Inscription utilisateur'; ?>

<?php $banniere = "Formulaire d'inscription"; ?>

<?php

    echo '
            <form action="index.php?action=addUser" method="post">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
                <br/>

                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
                <br/>

                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                <br/>

                <label for="motdepasse">Mot de passe :</label>
                <input type="password" id="motdepasse" name="motdepasse" required>
                <br/>

                <label for="categorie">Votre catégorie :</label>
                <select name="categorie" id="categorie">';

                foreach ($listeCategories as $cat): 
                    echo '<option value="'.$cat['id'].'">'.$cat['libelle'].'</option>';
                endforeach;


    echo '           </select>
                <br/>

                <button type="submit" name="inscrire" value="clic">S\'inscrire</button>
                <button type="submit" name="changement" value="clicmdp">changer le mdp</button>
                
            </form>';

