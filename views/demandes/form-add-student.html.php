<div class="bady">

    <fieldset class="container">
        <legend> Ajout Etudiant </legend>
        <form class="form2" action="<?=WEBROOT;?>"  method="post">
            <div class="texte">
                <label for="Prenom"> Prenom </label>
                <input type="text" name="prenom"  id="Prenom"/><br/>
                <label for="Nom"> Nom </label>
                <input type="text" name="nom"  id="Nom"/><br/>
                <label for="Login"> Login </label>
                <input type="text" name="login"  id="Login"/><br/>
                <label for="pwd"> Mot de pass </label>
                <input type="text" name="pwd"  id="pwd"/><br/>
                <label for="class"> Classe </label>
                <select name="classe" id="class">
                    <?php foreach ($listclasses as $classe): ?>
                        <option value="<?=$classe['id'];?>"><?=$classe['libelle']?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="reset"> <a href="<?=WEBROOT?>/?action=rpshow-students"> Annuler </a> </button>
            <button type="submit" name="action" value="form-add-student"> Enregistrer </button>
        </form>
    </fieldset>

</div>