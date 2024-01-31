<form class="form1" action="<?=WEBROOT?>" method="post">

    <h1> Connexion </h1>

    <div class="infos">

        <div class="lab-inp">
            <label for="username">Nom ou e-mail:</label>
            <input id="username" name="username" type="text" placeholder="Entrer votre identifiant">
        </div>
        <div class="lab-inp">
            <label for="password">Mot de passe:</label>
            <input id="password" name="password" type="password" placeholder="Saisir le mot de passe">
        </div>
    </div>
        <button type="submit"  name="action" value="form-connexion">
            Se connecter 
        </button>

</form>
