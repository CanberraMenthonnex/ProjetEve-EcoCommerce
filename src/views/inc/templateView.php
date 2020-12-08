<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach($templateStyles as $style) : ?>
       <link rel="stylesheet" href="<?= MAIN_PATH ?> .'style/<?=$style?>.css">
    <?php endforeach; ?>
    <title><?= $templateTitle ?></title>
</head>
<body>

    <?php
        require(ROOT . "/src/views/inc/header.php");
    ?>

    <main class="py-5 container-fluid">
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