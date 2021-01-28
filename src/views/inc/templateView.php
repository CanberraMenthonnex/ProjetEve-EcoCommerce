<?php
    use Core\Router\PathGenerator;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= PathGenerator::generateStylePath('template.css')?>">
    <?php foreach($templateStyles as $style) : ?>
       <link rel="stylesheet" href="<?= PathGenerator::generateStylePath("$style.css") ?>">
    <?php endforeach; ?>
    <title><?= $templateTitle ?></title>
</head>
<body class="bg--light-green template-container">

    <?php
        require(ROOT . "/src/views/inc/header.php");
    ?>

    <main class="template-container--main">
       <?= $content ?> 
    </main>
    
    <?php
        require(ROOT . "/src/views/inc/footer.php");
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="<?= MAIN_PATH ?>/js/header.js"></script>
    <script>const MAIN_PATH = <?= json_encode(MAIN_PATH) ?></script>
    <script src="<?= MAIN_PATH ?>/js/ajax-cart.js"></script>
    <?= array_reduce($templateScripts, function ($acc , $script) {
        return $acc .= '<script src="'. MAIN_PATH . '/js/dist/' . $script . '.js"></script>';
    }) 
    ?>
</body>
</html>