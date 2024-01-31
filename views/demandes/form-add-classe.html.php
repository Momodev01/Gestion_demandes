<div class="bady">

    <fieldset class="container">
        <legend> Nouvelle classe </legend>
        <form class="form2" action="<?=WEBROOT;?>"  method="post">
            <div class="texte">
                <input type="text" name="libelle"  placeholder="Nom classe" id="classe"/><br/>
            </div>
            <button type="reset"> <a href="<?=WEBROOT?>/?action=rpshow-classes"> Annuler </a> </button>
            <button type="submit" name="action" value="add-classe"> Enregistrer </button>
        </form>
    </fieldset>

</div>