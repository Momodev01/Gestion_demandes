<?php
if(!isset($_GET["page"])) {
    $page=1;
}else{$page=$_GET["page"];}
$taille=count($demandesEtu);
$nombre_ligne=5;
$nombre_page=ceil($taille/$nombre_ligne);
$position=($page-1)*$nombre_ligne;
$tab=array_slice($demandesEtu, $position, $nombre_ligne);
// var_dump($tab);
?>


<section class="fiche">
        <h2> Année Scolaire: <?= $anneeEncours['libelle'] ?> </h2>

        <div class="selection-etat">
           <form action="<?=WEBROOT?>" method="get">
                <label for="etat-demande">Etat:</label>

                <select name="etat" id="etat-demande">
                    <option value="All"> Tout </option>
                    <option value="En cours"> En cours </option>
                    <option value="Accepter"> Accepter </option>
                    <option value="Rejeter"> Rejeter </option>
                </select>

                <button id="etat-demande" class="okbutton" name="action" type="submit" value="show-demandes"> OK </button>
            </form>
           
           <button class="newbutton"> <a href="<?=WEBROOT?>/?action=new-demande"> Ajouter </a>  </button> 
        </div>
        
        <table>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Etat</th>
                <th>Motif</th>
            </tr>
            <?php foreach ($tab as $demandes):?>
            <tr>
                <td> <?= $demandes['date'] ?> </td>
                <td> <?= $demandes['type'] ?> </td>
                <td> <?= $demandes['etat'] ?> </td>
                <td> <a href="Motifs.html"> Détails ? </a> </td>
            </tr>
            <?php endforeach?>
        </table>
        <div class="pagination">
        <?php for ($i=1; $i <=$nombre_page ; $i++):?>
             <a href="<?=WEBROOT?>/?action=show-demandes&page=<?= $i?>"><?= $i ?> </a>
        <?php endfor?>
        </div>
</form>