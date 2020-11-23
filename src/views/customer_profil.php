<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/common.css"/>
        <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/header.css" />
        <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/home.css">
        <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/customerProfil.css">
        <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/footer.css">

        <title>Document</title>
    </head>
    <body>

        <?php require("inc/header.php") ?>

        <h1>Bonjour <?= $userSession->getFirstname() . " " . $userSession->getLastname();  ?></h1>
        
        <section id="sommaire">
            <div id="avatar">
                <img src="<?= MAIN_PATH ?>/img/Avatar.png" alt="">
            </div>
            <div id="eltProfil">
                <a href="" class="white">Profil</a>
                <a href="" class="white">Historique d'achats</a>
                <a href="" class="white">Panier</a>
                <a href="" class="white">Catégorie</a>
            </div>
        </section>
        
        
        <section id="profil">
            <h2>Votre profil : </h2>
            <div>
                <span>
                    <?php
                        echo "Prénom : " . $userSession->getFirstname() . "<br>";
                        echo "Nom : " . $userSession->getLastname() . "<br>";
                        echo "Email : " . $userSession->getEmail() . "<br>";
                        echo "Date de naissance : " . $userSession->getBirth_date()->format("d-m-Y") . "<br>";
                        echo "Adresse : " . $userSession->getAdress() . "<br>";
                        echo "Numéro de téléphone : " . $userSession->getPhone() . "<br>";
                    ?>
                </span>    

            </div>
        </section>
        <div id="sendBtn">
            <a href="<?= MAIN_PATH . CUSTOMER_LOGOUT_ROUTE?>" class="border">Se déconnecter</a>
        </div>
        
        <?php require("inc/footer.php") ?>

        <script src="<?= MAIN_PATH ?>/js/index.js"></script>
    </body>
</html>