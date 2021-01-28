<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/css/template.css">
    <?php foreach($templateStyles as $style) : ?>
       <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/css/<?=$style?>.css">
    <?php endforeach; ?>
    <title><?= $templateTitle ?></title>
</head>
<body class="bg--very-dark-grey template-container">

<header class="flex--column headerBack" id="headerAfficheArticle">
    <div class="flex--row justify--between">
        <span class="headerBack--link">Connecté en tant que administrateur <b><?= $admin->getMail(); ?></b></span>
        <div>
            <a class="headerBack--link" href="<?=MAIN_PATH . ADMIN_LOGOUT_ROUTE?>">Déconnexion</a>
            <a class="headerBack--link" href="<?=MAIN_PATH . ADMIN_CREATE_PRODUCT_ROUTE ?>" id="ajoutArticle">Ajouter un article</a>
            <a class="headerBack--link" href="<?=MAIN_PATH . ADMIN_GET_PRODUCT_ROUTE ?>" >Stock article</a>
            <a class="headerBack--link" href="<?=MAIN_PATH . ADMIN_CREATE_ARTICLE ?>" >Blog</a> 
        </div>
    </div>
        <img class="headerBack--logo" src="<?= MAIN_PATH ?>/img/logoBackOffice.png">
</header>


    <main class="template-container--main">
       <?= $content ?> 
    </main>

    <?= array_reduce($templateScripts, function ($acc , $script) {
        return $acc .= '<script  src="'. MAIN_PATH . '/js/dist/' . $script . '.js"></script>';
    }) 
    ?>
</body>
</html>