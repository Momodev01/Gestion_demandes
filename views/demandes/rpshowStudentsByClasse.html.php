<?php
if(!isset($_GET["page"])) {
    $page=1;
}else{$page=$_GET["page"];}
$taille=count($classe_students);
$nombre_ligne=5;
$nombre_page=ceil($taille/$nombre_ligne);
$position=($page-1)*$nombre_ligne;
$tab=array_slice($classe_students, $position, $nombre_ligne);
// var_dump($tab);
?>


<section class="fiche">
        <h2> Liste des étudiants de <?= $classe['libelle'] ?> </h2>

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
                <th>Prenom</th>
                <th>Nom</th>
            </tr>
            <?php foreach ($tab as $classe_students):?>
            <tr>
                <td> <?= $classe_students['prenom'] ?> </td>
                <td> <?= $classe_students['nom'] ?> </td>
            </tr>
            <?php endforeach?>
        </table>
        <div class="pagination">
        <?php for ($i=1; $i <=$nombre_page ; $i++):?>
             <a href="<?=WEBROOT?>/?action=classe-students=<?= $i?>"><?= $i ?> </a>
        <?php endfor?>
        </div>
</form>