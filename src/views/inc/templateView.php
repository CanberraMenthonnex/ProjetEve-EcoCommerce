<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach($templateStyles as $style) : ?>
       <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/css/<?=$style?>.css">
    <?php endforeach; ?>
    <title><?= $templateTitle ?></title>
</head>
<body class="bg--light-green">

    <?php
        require(ROOT . "/src/views/inc/header.php");
    ?>

    <main>
       <?= $content ?> 
    </main>
    
    <?php
        require(ROOT . "/src/views/inc/footer.php");
    ?>
    <?= array_reduce($templateScripts, function ($acc , $script) {
        return $acc .= '<script src="'. MAIN_PATH . '/js/' . $script . '.js"></script>';
    }) 
    ?>
</body>
</html>