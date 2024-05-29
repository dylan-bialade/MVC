<?php $titre = 'InscriptionRep'; ?>

<?php $banniere = "InscriptionRep"; ?>


<form action="<?php echo "index.php?action=addRep&id=".$idUtilisateur; ?>" method="post">
                <label for="jour">Jour :</label>
                <select id="jour" name="jour">
                    
                    <?php
                        for ( $i = 1; $i <= 31; $i++) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                </select>
                <br><br>
        
                <label for="mois">Mois :</label>
                <select id="mois" name="mois">
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
        
                <label for="periode">Année :</label>
                <select id="periode" name="periode">
                  
                    <?php
                        for ( $i = 2024; $i <= 2040; $i++) {
                          echo'<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                </select>
                <br><br>
              
                <label>Moment de la journée :</label>
                <input type="radio" id="MS" name="ms" value="midi">
                <label for="midi">midi</label>
                <input type="radio" id="MS" name="ms" value="soir">
                <label for="soir">Soir</label>
                <br><br>
        
                <input type="submit" name="soumettre" value="Soumettre">
                
            </form>
        </body>
        </html>