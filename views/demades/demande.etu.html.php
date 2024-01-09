<section class="fiche">
        <h2> Année Scolaire: <?= $anneeEncours['libelle'] ?> </h2>

        

        <div class="selection-etat">
           <div>
                <label for="etat-demande">Etat:</label>

                <select name="etat" id="etat-demande">
                    <option value="Encours"> En cours </option>
                    <option value="Rejeter"> Rejetée </option>
                    <option value="Accepter"> Acceptée </option>
                </select>

                <button id="etat-demande" class="okbutton"> OK </button>
           </div>
           
           <button class="newbutton"> <a href="<?=WEBROOT?>/?action=new-demande"> Nouvelle </a>  </button> 
        </div>
        
        <table>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Etat</th>
                <th>Motif</th>
            </tr>
            <?php foreach ($demandesEtu as $demandes):?>
            <tr>
                <td> <?= $demandes['date'] ?> </td>
                <td> <?= $demandes['type'] ?> </td>
                <td> <?= $demandes['etat'] ?> </td>
                <td> <a href="Motifs.html"> Détails ? </a> </td>
            </tr>
            <?php endforeach?>
        </table>

</section>