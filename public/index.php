<?php
    define("WEBROOT", "http://localhost:9000");
    define("BD","../Database/data.json");
    require_once("../Database/convert.php");
    require_once("../model/model.php");
    // $etudiantConnect = connexion($etudiant['login'], $etudiant['pwd']);
    $anneeEncours = findAnneeEncours();
    // $demandesEtu = findDemandeByEtudiantAndAnnee($etudiantConnect['id'], $anneeEncours['id']);
    // $classes=findclasse($etudiantConnect['classe_id']);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/style.css">
    <title>Gestion Ecole</title>
</head>
<body>
    
    <?php
       if (isset($_REQUEST["action"])) {
        
        if ($_REQUEST["action"] == "form-connexion") {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $etudiantConnect = connexion($username,$password);
                $demandesEtu = findDemandeByEtudiantAndAnnee($etudiantConnect['id'], $anneeEncours['id']);
                $classes=findclasse($etudiantConnect['classe_id']);
                // var_dump($etudiantConnect);
                // die('ok');
                require_once("../views/partials/menu.html.php");
                require_once("../views/demades/demande.etu.html.php");
            }
            
        }
        if ($_REQUEST["action"] == "form-add-demande") {
            // Traitement ajout de Demande
            $newDemande=[
                "id" => uniqid(),
                "date" => date("d/m/Y"),
                "type" => $_REQUEST['type'],
                "etat" => "En cours",
                "etudiant_id" => $etudiantConnect['id'],
                "annee_id" => $anneeEncours['id'],
                "motif" => $_REQUEST['motif']
            ];
                addDemande($newDemande);
                header("location".WEBROOT."/?action=show-demandes");
            } 

    } 
    if (isset($_REQUEST["action"])) {
            
                if ($_REQUEST["action"] == "show-demandes") {
                    
                    require_once("../views/partials/menu.html.php");
                    require_once("../views/demades/demande.etu.html.php");
                    // } 
                } else {
                    if ($_REQUEST["action"] == "new-demande") {
                        require_once("../views/partials/menu.html.php");
                        require_once("../views/demades/form.html.php");
                    }
                } 
                
                if ($_REQUEST["action"] == "deconnexion") {
                    require_once("../views/demades/login.html.php");
                }
        }
        else {
            //Page par défaut
            require_once("../views/demades/login.html.php");
        };
                
        

    ?>

</body>
</html>

