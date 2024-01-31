<?php

function findAllAnnees():array|null{
        $annees = jsonToArray("annees");
        return $annees;
    };

    function findAllClasses(){
        $classes = jsonToArray("classes");
        return $classes;
    };

    function findclasse($idClasse):string{
       $classes = jsonToArray("classes");
        foreach ($classes as $class) {
            if ($class['id'] == $idClasse) {
                return $class['libelle'];
            }
        }
        return $class['libelle'];
    };

    function findclasseById(int $idClasse):array|null{
        $classes = jsonToArray("classes");
         foreach ($classes as $class) {
             if ($class['id'] == $idClasse) {
                 return $class;
             }
         }
         return null;
     };

    function findAllData($key):array{
        return jsonToArray($key);
    };
    function findAllUsers():array{
        return findAllData("users");
    };

    function findAllEtudiants():array{
        $users = findAllUsers();
        $etudiants = [];
        foreach ($users as $user) {
            if ($user["role"] == "ROLE_ETUDIANT") {  
                $etudiants[] = $user;
            }
        }
        return $etudiants; 
    };

    function findEtudiantById($etudiantId):array|null{
        $etudiants = findAllEtudiants();
        foreach ($etudiants as $etudiant) {
            if ($etudiant["id"] == $etudiantId) { 
                return $etudiant;
            }
        }
        return null;
    };

    function findEtudiantByClasse($classeId):array|null{
        $classes = findAllClasses();
        foreach ($classes as $classe) {
            if ($classe["id"] == $classeId) { 
                return $classe;

            }
        }
        return null;
    };

    function findEtudiantByclasseId($classeId):array{
        
        $etudiants = findAllEtudiants();
        $Etu = [];
        foreach ($etudiants as $etudiant) {
            if ($etudiant["classe_id"] == $classeId) { 
                $Etu[] = $etudiant;
            }
        }
        return $Etu;
    };
    
    // function findAllDemandes():array {
    //     $demandes = jsonToArray("demandes");
    //     $demandeEtu = [];

    //     foreach ($demandes as $demande) {
    //     $etudiantId = $demande['user_id'];
    //     // if($etudiantId != null){
    //     $etudiant = findEtudiantById($etudiantId);
    //     // dump_degub($etudiant);
    //     $classe = findclasseById($etudiant["classe_id"]);
    //     $mergeclassetu = array_merge($classe, $etudiant);
    //     // dump_degub($mergeclassetu);
    //     $demandeEtu[] = array_merge($mergeclassetu, $demande);  
    //     // dump_degub($demandeEtu);
    // }
    //     return $demandeEtu ;
    // }

    function findAllDemandes(string $etat = "All"):array {
        $demandes = jsonToArray("demandes");
        $demandeEtu = [];
        if ($etat == "All") {
            foreach ($demandes as $demande) {
                $etudiantId = $demande['user_id'];
                // if($etudiantId != null){
                $etudiant = findEtudiantById($etudiantId);
                // dump_degub($etudiant);
                $classe = findclasseById($etudiant["classe_id"]);
                $mergeclassetu = array_merge($classe, $etudiant);
                // dump_degub($mergeclassetu);
                $demandeEtu[] = array_merge($mergeclassetu, $demande);  
                // dump_degub($demandeEtu);
            }
        }
        else {
            foreach ($demandes as $demande) {
                if ($demande['etat'] == $etat) {
                $etudiantId = $demande['user_id'];
                // if($etudiantId != null){
                $etudiant = findEtudiantById($etudiantId);
                // dump_degub($etudiant);
                $classe = findclasseById($etudiant["classe_id"]);
                $mergeclassetu = array_merge($classe, $etudiant);
                // dump_degub($mergeclassetu);
                $demandeEtu[] = array_merge($mergeclassetu, $demande);  
                // dump_degub($demandeEtu);
            }
        }
    }
    return $demandeEtu ;
}

    function findAllEtudiantmergeClasse():array{
        $users = findAllUsers();
        $etudiants = [];
        foreach ($users as $user) {
            if ($user["role"] == "ROLE_ETUDIANT") { 
                $classe = findclasseById($user["classe_id"]);
                $mergeetuclasse=  array_merge($classe,$user );
                $etudiants[] = $mergeetuclasse;
            }
        }
        return $etudiants; 
    };
    

    function connexion(string $username, string $password): array|null {
        // Récupérer tous les étudiants
        $users = findAllUsers();
        // Parcourir la liste des étudiants
        foreach ($users as $user) {
            // Vérifier les identifiants correspondants
            if ($user['login'] == $username && $user['pwd'] == $password) {
                return $user; // Retourner l'étudiant si correspondance
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
    
    function findDemandeByEtudiantAndAnnee( int $userId, int $anneeId, string $filtre = "All"):array|null{
        // Obtenir toutes les demandes
        $demandes = findAllDemandes();
        // Tableau vide pour stocker les demandes correspondantes
        $demandesEtu = [];
        if ($filtre == "All") {
            foreach ($demandes as $demande) {
                // Vérifie si l'étudiant et l'année correspondent aux identifiants passés en paramètres
                if ($demande['user_id'] == $userId && $demande['annee_id'] == $anneeId) {
                    $demandesEtu[] = $demande;  // Ajoute la demande correspondante au tableau
                }
            }
        } else {
            foreach ($demandes as $demande) {
                // Vérifie si l'étudiant et l'année correspondent aux identifiants passés en paramètres
                if ($demande['user_id'] == $userId && $demande['annee_id'] == $anneeId  && $demande['etat'] == $filtre) {
                    $demandesEtu[] = $demande;  // Ajoute la demande correspondante au tableau
                }
            }
        }
        // Retourne le tableau contenant les demandes correspondantes, null si aucune demande n'est trouvée
        return $demandesEtu;
    };

    function findDemandeByEtudiantAndAnneeAndEtat(int $userId, int $anneeId, string $filtre): array|null {
        // Obtenir toutes les demandes
        $demandes = findAllDemandes();
        // Tableau vide pour stocker les demandes correspondantes
        $demandesEtu = [];
        foreach ($demandes as $demande) {
            // Vérifie si l'étudiant, l'année et l'état correspondent aux identifiants passés en paramètres
            if ($demande['user_id'] == $userId && $demande['annee_id'] == $anneeId && $demande['etat'] == $filtre) {
                // Vérifie si l'état correspond (ou si "All" est sélectionné)
                if ($filtre == "All" || $demande['etat'] == $filtre) {
                    $demandesEtu[] = $demande; // Ajoute la demande correspondante au tableau
                }
            }
        }
        // Retourne le tableau contenant les demandes correspondantes, null si aucune demande n'est trouvée
        return $demandesEtu;
    };

    function addDemande(array $newDemande):void {
        arrayToJson($newDemande, "demandes");
    };

    function addclasse(array $newclasse):void {
        arrayToJson2($newclasse, "classes");
    };
    function addstudent(array $newstudent):void {
        arrayToJson2($newstudent, "users");
    };

    function getId(string $target){
        return count(jsonToArray($target)) + 1;
    }

    // Function to get ID from JSON string
    // function getId(string $target){
    // // Convert JSON to array
    // $array = jsonToArray($target);

    // // Count array elements and add 1
    // return count($array) + 1;
    // }

    function dump_degub($variable){
        echo "<pre>";
         var_dump($variable);
         echo "</pre>"; ; 
         exit("C'est OK");
    }