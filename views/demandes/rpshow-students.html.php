<?php
if(!isset($_GET["page"])) {
    $page=1;
}else{$page=$_GET["page"];}
$taille=count($etudiantsClasse);
$nombre_ligne=5;
$nombre_page=ceil($taille/$nombre_ligne);
$position=($page-1)*$nombre_ligne;
$tab=array_slice($etudiantsClasse, $position, $nombre_ligne);
// var_dump($tab);
?>


<section class="fiche">
        <h2> Année Scolaire: <?= $anneeEncours['libelle'] ?> </h2>

        <!-- <div class="selection-etat">
           <div>
                <label for="etat-demande">Etat:</label>

                <select name="etat" id="etat-demande">
                    <option value="Tout"> Tout </option>
                    <option value="Absence"> Absence </option>
                    <option value="Annulation"> Annulation </option>
                    <option value="Suspension"> Suspension </option>
                </select>

                <button id="etat-demande" class="okbutton" name="action" value="filtre"> OK </button>
           </div> -->
           
           <button class="newbutton"> <a href="<?=WEBROOT?>/?action=new-student"> Ajouter </a>  </button> 
        </div>
        
        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Classes</th>
            </tr>
            <?php foreach ($tab as $etudiantsClasse):?>
            <tr>
                <td> <?= $etudiantsClasse['nom'] ?> </td>
                <td> <?= $etudiantsClasse['prenom'] ?> </td>
                <td> <?= $etudiantsClasse['libelle'] ?> </td>
            </tr>
            <?php endforeach?>
        </table>
        <div class="pagination">
        <?php for ($i=1; $i <=$nombre_page ; $i++):?>
             <a href="<?=WEBROOT?>/?action=rpshow-students&page=<?= $i?>"><?= $i ?> </a>
        <?php endfor?>
        </div>
</form>