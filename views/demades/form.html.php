<div class="bady">

    <fieldset class="container">
        <legend> Nouvelle Demande </legend>
        <form class="form2" action="<?=WEBROOT;?>" method="post">
                <div><span class="type"> Type </span></div>
                <select name="type" id="">
                    <option value="Absence">Absence</option>
                    <option value="Suspension">Suspension</option>
                    <option value="Annulation">Annulation</option>
                </select>
                <div class="texte">
                    <div><span class="motif"> Motif </span></div>
                    <textarea name="motif" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="btns">
                    <button type="reset"> <a href="<?=WEBROOT?>/?action=show-demandes"> Annuler </a> </button>
                    <button type="submit" name="action" value="form-add-demande"> Enregistrer </button>
                </div>
        </form>
    </fieldset>

</div>