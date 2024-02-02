<?php
if(!isset($_GET["page"])) {
    $page=1;
}else{$page=$_GET["page"];}
$taille=count($classes);
$nombre_ligne=5;
$nombre_page=ceil($taille/$nombre_ligne);
$position=($page-1)*$nombre_ligne;
$tab=array_slice($classes, $position, $nombre_ligne);
// var_dump($tab);
?>

<section class="fiche">
    <h2> Année Scolaire: <?= $anneeEncours['libelle'] ?> </h2>

    <button class="newbutton"> 
        <a href="<?=WEBROOT?>/?action=new-classe"> Ajouter </a>  
    </button> 
        
        <table>
            <tr>
                <th> Classe </th>
                <th> Etudiants </th>
            </tr>
            <?php foreach ($tab as $classe):?>
            <tr>
                <td> <?= $classe['libelle'] ?> </td>
                <td> <a href="<?=WEBROOT?>?action=rpclasse-students-show&classeId=<?=$classe["id"]?>"> Liste des étudiants </a> </td>
            </tr>
            <?php endforeach?>
        </table>
        <div class="pagination">
            <?php for ($i=1; $i <=$nombre_page ; $i++):?>
                 <a href="<?=WEBROOT?>/?action=rpshow-classes&page=<?= $i?>"><?= $i ?> </a>
            <?php endfor?>
        </div>

</section>