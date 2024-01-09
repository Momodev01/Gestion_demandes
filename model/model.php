<?php

function findAllAnnees():array|null{
        $annees = jsonToArray("annees");
        return $annees;
    };

    function findAllClasses(){
        $classes = jsonToArray("classes");
        return $classes;
    };

    function findclasse($idClasse):string|null{
       $classes = jsonToArray("classes");
        foreach ($classes as $key => $class) {
            if ($class['id']==$idClasse) {
                return $class['libelle'];
            }
        }

        return null;
    };

    function findAllEtudiants():array{
        $etudiants = jsonToArray("etudiants");
        return $etudiants;
    };


    function findAllDemandes():array {
        $demandes = jsonToArray("demandes");
        return $demandes;
    }

    function connexion(string $login, string $pwd): array|null {
        // Récupérer tous les étudiants
        $etudiants = findAllEtudiants();
        // Parcourir la liste des étudiants
        foreach ($etudiants as $etudiant) {
            // Vérifier les identifiants correspondants
            if ($etudiant['login'] == $login && $etudiant['pwd'] == $pwd) {
                return $etudiant; // Retourner l'étudiant si correspondance
            } 
        }
    
        return null; // Retourner null si aucune correspondance
    }

    function findAnneeEncours() {
        // Obtenir toutes les années
        $annees = findAllAnnees();
        
        // Parcourir chaque année
        foreach ($annees as $annee) {
            // Vérifier si l'année est en cours
            if($annee["etat"] == 1){
                return $annee;
            }
        } 
        return null;  // Retourner null si aucune année en cours
    }
    
    function findDemandeByEtudiantAndAnnee( int $etudiantId, int $anneeId):array|null{
        // Obtenir toutes les demandes
        $demandes = findAllDemandes();
        // Tableau vide pour stocker les demandes correspondantes
        $demandesEtu = [];
        foreach ($demandes as $demande) {
            // Vérifie si l'étudiant et l'année correspondent aux identifiants passés en paramètres
            if ($demande['etudiant_id'] == $etudiantId && $demande['annee_id'] == $anneeId) {
                $demandesEtu[] = $demande;  // Ajoute la demande correspondante au tableau
            }
        }
        // Retourne le tableau contenant les demandes correspondantes, null si aucune demande n'est trouvée
        return $demandesEtu;
    };

    function findDemandeByEtudiantAndAnneeAndEtat(int $etudiantId, int $anneeId, string $etat):array|null {
        // Obtenir toutes les demandes
        $demandes = findAllDemandes();
        // Tableau vide pour stocker les demandes correspondantes
        $demandesEtu = [];
        foreach ($demandes as $demande) {
            // Vérifie si l'étudiant, l'année et l'état correspondent aux identifiants passés en paramètres
            if ($demande['etudiant_id'] == $etudiantId && $demande['annee_id'] == $anneeId && $demande['etat'] == $etat) {
                $demandesEtu[] = $demande;  // Ajoute la demande correspondante au tableau
            }
        }
        // Retourne le tableau contenant les demandes correspondantes, null si aucune demande n'est trouvée
        return $demandesEtu;
    };

    function addDemande(array $newDemande):void {
        arrayToJson($newDemande, "demandes");
    };