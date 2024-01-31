<section class="profil">
        <div class="profil-desc">
            <div> <img src="img/photoprofil.jpg" alt=""> </div>
            <div>
                <p> <?= $_SESSION["userConnect"]['prenom'] ?> </p>
                <p> <?= $_SESSION["userConnect"]['nom'] ?> </p>
                <p> <?= $_SESSION["userConnect"]["role"] ?> </p>
                <?php if ($_SESSION["userConnect"]['role'] == "ROLE_ETUDIANT"): ?> 
                <p> <?= $_SESSION["classes"] ?> </p>
                <?php endif ?> 
            </div>
            
        </div>
     
        <div class="lesoptions">
            <?php if ($_SESSION["userConnect"]['role'] == "ROLE_ETUDIANT"): ?> 
                <a href="<?=WEBROOT?>/?action=show-demandes"> <span> Mes Demandes </span> </a>
                <a href="<?=WEBROOT?>/?action=new-demande"> <span> Nouvelle demande </span> </a>
            <?php endif ?> 
            
            <?php if ($_SESSION["userConnect"]['role'] == "ROLE_AC"): ?>
            <a href="<?=WEBROOT?>/?action=show-demandes-ac"> <span> Toutes les Demandes </span> </a>
            <?php endif ?> 
            <?php if ($_SESSION["userConnect"]['role'] == "ROLE_RP"): ?>
                <a href="<?=WEBROOT?>/?action=rpshow-classes"> <span> Liste des Classes </span> </a>
                <a href="<?=WEBROOT?>/?action=rpshow-students"> <span> Liste des Etudiants </span> </a>
                <a href="<?=WEBROOT?>/?action=new-student"> <span> Inscription </span> </a>
            <?php endif ?> 
        </div>
        <button class="logoutbtn" name="action" value="logout"><a href="<?=WEBROOT;?>"> Déconnexion </a></button>
    </section>
