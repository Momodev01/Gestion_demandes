<div class="bady">

    <fieldset class="container">
        <legend> Nouvelle classe </legend>
        <form class="form4 form5" action="<?=WEBROOT;?>"  method="post">
            
                <input type="text" name="libelle"  placeholder="Nom classe" id="classe"/><br/>
            
            <button type="reset"> <a href="<?=WEBROOT?>/?action=rpshow-classes"> Annuler </a> </button>
            <button type="submit" name="action" value="add-classe"> Enregistrer </button>
        </form>
    </fieldset>
    
</div>