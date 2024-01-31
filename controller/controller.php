<?php

session_start();

require_once("../Database/convert.php");
require_once("../model/model.php");

$userConnect = [];
$anneeEncours = findAnneeEncours();


    
    if (isset($_REQUEST["action"])) {
        // if ($_REQUEST["action"] != "form-connexion" && !isset($_SESSION['$userConnect'])) {
        //     header("location:".WEBROOT);
        //     exit;
        // }
        if ($_REQUEST["action"] == "form-connexion") {
            
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $userConnect = connexion($username, $password);
                // Vérifier si la connexion a réussi
                if ($userConnect !== null) {
                    if ($userConnect['role'] == "ROLE_ETUDIANT") {
                        $_SESSION["userConnect"] =$userConnect;
                        $demandesEtu = findDemandeByEtudiantAndAnnee($userConnect['id'], $anneeEncours['id']);
                        $classes = findclasse($userConnect['classe_id']);
                        $_SESSION["classes"] =$classes ;
                        require_once("../views/partials/menu.html.php");
                        require_once("../views/demandes/showdemande.etu.html.php");
                        // dump_degub($demandesEtu);
                    }
                    elseif ($userConnect['role'] == "ROLE_AC") {
                        $_SESSION["userConnect"] = $userConnect;
                        $demandesAc = findAllDemandes();
                        // $classes = findclasse($demandes['classe_id']);
                        // $_SESSION["classes"] =$classes ;
                        require_once("../views/partials/menu.html.php");
                        require_once("../views/demandes/showdemande.ac.html.php");
                        // dump_degub($demandesEtu);
                    }
                    elseif ($userConnect['role'] == "ROLE_RP") {
                        $_SESSION["userConnect"] =$userConnect;
                        // $demandesAc = findAllDemandes();
                        // $classes = findclasse($classes['libelle']);
                        $classes = findAllClasses();
                        // dump_degub($classes);
                        // $_SESSION["classes"] =$classes ;
                        require_once("../views/partials/menu.html.php");
                        require_once("../views/demandes/rpshow-classes.html.php");
                        // dump_degub($demandesEtu);
                    }
                    
                } else{
                    header("location:".WEBROOT);
                }
            }
        }

        elseif ($_REQUEST["action"] == "form-add-demande") {
            // Traitement ajout de Demande 
            $newDemande=[
                "id" => getId("demandes"),
                "date" => date("d/m/Y"),
                "type" => $_REQUEST['type'],
                "etat" => "En cours",
                "user_id" => $_SESSION["userConnect"]['id'],
                "annee_id" => $anneeEncours['id'],
                "motif" => $_REQUEST['motif']
            ];
                addDemande($newDemande);
                header("location:".WEBROOT."/?action=show-demandes");
            }
            elseif ($_REQUEST["action"] == "form-add-student") {
                // Traitement ajout Etudiant 
                // dump_degub($_REQUEST['libelle']);
                $newstudent=[
                    "id" => getId("users"),
                    "nom" => $_REQUEST['nom'],
                    "prenom" => $_REQUEST['prenom'],
                    "role" => "ROLE_ETUDIANT",
                    "login" => $_REQUEST['login'],
                    "pwd" => $_REQUEST['pwd'],
                    "classe_id" => $_REQUEST['classe'],
                ];
                    addstudent($newstudent);
                    header("location:".WEBROOT."/?action=rpshow-students");
                } 
                elseif ($_REQUEST["action"] == "add-classe") {
                    // Traitement ajout Classe 
                    $newclasse=[
                        "id" => getId("classes"),
                        "libelle" => $_REQUEST['libelle'],
                    ];
                        addclasse($newclasse);
                        header("location:".WEBROOT."/?action=rpshow-classes");
                    }
                elseif ($_REQUEST["action"] == "show-demandes") {
                // dump_degub($demandesEtu);
                $filtre = isset($_GET['etat'])?$_GET['etat']:"All";
                $demandesEtu = findDemandeByEtudiantAndAnnee($_SESSION["userConnect"]['id'], $anneeEncours['id'], $filtre);
                require_once("../views/partials/menu.html.php");
                require_once("../views/demandes/showdemande.etu.html.php");
                // dump_degub($demandesEtu);
            } 
            elseif ($_REQUEST["action"] == "new-demande") {
                    require_once("../views/partials/menu.html.php");
                    require_once("../views/demandes/form.html.php");
            } 
            elseif ($_REQUEST["action"] == "show-demandes-ac") { 
                $etat = isset($_GET['etat'])?$_GET['etat']:"All";
                // $etat = "Rejeter";
                $demandesAc = findAllDemandes($etat);
                // header("location:".WEBROOT."../views/demandes/showdemande.ac.html.php");
                require_once("../views/partials/menu.html.php");
                require_once("../views/demandes/showdemande.ac.html.php");
                // dump_degub($demandesEtu);
            }
            elseif ($_REQUEST["action"] == "rpshow-classes") {  
                $classes = findAllClasses();
                // header("location:".WEBROOT."../views/demandes/rpshow-classes.html.php");
                require_once("../views/partials/menu.html.php");
                require_once("../views/demandes/rpshow-classes.html.php");
                // dump_degub($demandesEtu);
            } 
            elseif ($_REQUEST["action"] == "rpshow-students") {
                // $classe = findclasse($userConnect['classe_id']);
                // dump_degub($classe);
                $etudiantsClasse = findAllEtudiantmergeClasse();
                // header("location:".WEBROOT."../views/demandes/rpshow-students.html.php");
                require_once("../views/partials/menu.html.php");
                require_once("../views/demandes/rpshow-students.html.php");
                // dump_degub($demandesEtu);
            }
            elseif ($_REQUEST["action"] == "rpclasse-students-show") {
                $classe = findclasseById($_REQUEST["classeId"]);
                $classe_students = findEtudiantByclasseId($_REQUEST["classeId"]);
                // header("location:".WEBROOT."../views/demandes/rpshow-students.html.php");
                require_once("../views/partials/menu.html.php");
                require_once("../views/demandes/rpshowStudentsByClasse.html.php");
                // dump_degub($demandesEtu);
            }
            elseif ($_REQUEST["action"] == "new-classe") {
                require_once("../views/partials/menu.html.php");
                require_once("../views/demandes/form-add-classe.html.php");
            } 
            elseif ($_REQUEST["action"] == "new-student") {
                $listclasses = findAllClasses();
                require_once("../views/partials/menu.html.php");
                require_once("../views/demandes/form-add-student.html.php");
            } 
            elseif ($_REQUEST["action"] == "logout") {
                unset($_SESSION["userConnect"]);
                session_destroy();
                header("location:".WEBROOT);
            }

     }  else{
        // Page par défaut
        require_once("../views/demandes/login.html.php");
    }
