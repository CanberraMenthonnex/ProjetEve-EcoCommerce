
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/css/template.css">
       <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/css/index.css">

    <title><?= $templateTitle ?></title>
</head>
<body class="bg--very-dark-grey template-container">

<header class="flex--column headerBack" id="headerAfficheArticle">
        <img class="headerBack--logo" src="<?= MAIN_PATH ?>/img/logoBackOffice.png">
</header>


    <main class="template-container--main">
    <div class="flex--column align--center ">
        <div class="bg--light-grey text-center py-2 paddingX2 semiRadius">
            <p class="f-white fixeMargin3 mainTitle">Connect</p>
            
                <form action="<?=MAIN_PATH . ADMIN_LOG_ROUTE?>" method ="POST">
                    <div id="divInputLog">
                    <input class="semiRadius py-1 paddingX3" type="text"  id="id" name="email" placeholder="Identifiant" autocomplete="off"> <br>
                    <input class="my-3 semiRadius py-1 paddingX3" type="password" id="pwd" name="pwd" placeholder="Mot de passe" autocomplete="off"> <br>
                    </div>
                    <div id="divSubmit">
                    <input class="fixeMargin3 semiRadius py-1 paddingX3" type="submit" name="send" value="Connexion" id="buttonLog">
                </div>
                </form>
        </div>
            
        </div>
    </main>
    
</body>
</html>
    


