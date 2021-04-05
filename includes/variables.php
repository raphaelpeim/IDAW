<?php
    // Head, Header
    $url = explode('.', explode('/', $_SERVER['REQUEST_URI'])[4])[0];
    $pageName = $url == "" ? 'index' : $url;

    // Head
    $pagesTitles = array(
        'index' => "iMangerMieux",
        'signup' => "iMangerMieux",
        'home' => "Accueil",
        'profile' => "Profil",
        'update' => "Modification",
        'password' => "Modification",
        'food' => "Aliments",
        'diary' => "Journal"
    );

    // Header
    $headerContent = array(
        'index' => array("Bienvenue", "Un grand nombre de fonctionnalités est devenu obsolète après export sur EDEN. Veuillez vous rendre dans le dossier doc/"),
        'signup' => array("Bienvenue", "Inscrivez-vous pour accéder à iMangerMieux"),
        'home' => array("Accueil", "Une application pour enregistrer les aliments que vous consommez"),
        'profile' => array("Profil", "Votre profil"),
        'update' => array("Modifications", "Modifier vos informations"),
        'password' => array("Modifications", "Modifier votre mot de passe"),
        'food' => array("Aliments", "Les aliments"),
        'diary' => array("Journal", "Votre journal")
    );

    // Navigation
    $pagesLinks = array(
        'home.php' => "Accueil",
        'profile.php' => "Profil",
        'food.php?page=1' => "Aliments",
        'diary.php?page=1' => "Journal",
        'disconnection.php' => "Déconnexion"
    );

    // Profil
    $userInformation = array(
        'pseudo' => "Pseudo",
        'age' => "Tranche d'âge",
        'sex' => "Sexe",
        'sport' => "Pratique sport",
        'phone' => "Téléphone",
        'mail' => "E-mail"
    );

    // Update
    $userInformationInputs = array(
        'name_l' => "Nom",
        'name_f' => "Prénom",
        'pseudo' => "Pseudo",
        'phone' => "Téléphone",
        'mail' => "E-mail"
    );

    $userInformationRadio = array(
        'age' => array(
            "Tranche d'âge",
            array(
                "< 40 ans",
                "< 60 ans",
                "> 60 ans"
            )
        ),
        'sex' => array(
            "Sexe",
            array(
                "Masculin",
                "Féminin",
                "Non binaire"
            )
        ),
        'sport' => array(
            "Pratique sport",
            array(
                "Basse",
                "Moyenne",
                "Elevée"
            )
        )
    );

    // Food
    $foodFormInputs = array(
        'calories' => "Calories",
        'lipids' => "Lipides",
        'sodium' => "Sodium",
        'potassium' => "Potassium",
        'carbohydrates' => "Glucides",
        'proteins' => "Protéines"
    );

    $categories = array(
        "Fruit", 
        "Légume", 
        "Viande", 
        "Poisson", 
        "Fromage", 
        "Céréale",
        "Produit transformé"
    );

    // Diary
    $diaryFormInputs = array(
        'quantity' => "Quantité",
        'date' => "Date",
    );

    // Food, diary
    $rowsNumber = 10;

    if (!empty($_GET))
        $firstRow = !$_GET['page'] ? 0 : ($_GET['page']-1)*$rowsNumber;
?>
