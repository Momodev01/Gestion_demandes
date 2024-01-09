<section class="profil">
        <div class="profil-desc">
            <div> <img src="img/photoprofil.jpg" alt=""> </div>
            <div>
                <p> <?= $etudiantConnect['prenom'] ?> </p>
                <p> <?= $etudiantConnect['nom'] ?> </p>
                <p> <?= $classes ?> </p>
            </div>
        </div>
     
        <div class="lesoptions">
            <a href="<?=WEBROOT?>/?action=show-demandes"> <span> Mes Demandes </span> </a>
            <a href="<?=WEBROOT?>/?action=new-demande"> <span> Nouvelle demande </span> </a>
        </div>
        <button class="logoutbtn"> <a href="<?=WEBROOT?>/?action=deconnexion"> Déconnexion </a></button>
    </section>
