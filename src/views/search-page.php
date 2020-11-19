<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/common.css"/>
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/header.css" />
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/footer.css">
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/search-page.css">
    <title>Page de recherche</title>
</head>
<body>
    <?php require("inc/header.php"); ?>
    <main class="container">
        <h1 class="f-white search-title">Vous avez recherché "<?= $keywords ?>"</h1>
        <ul class="product-container">
            <?php foreach($products as $product) : ?>

                <a href="#">
                    <article class="product-card">
                        <img src="<?= MAIN_PATH ?>/img/product-img.png" alt="" class="product-card--img">
                        <div class="product-card--content">
                            <span class="product-card--price"><?= $product->getPrice(); ?>€</span>
                            <h3 class="product-card--name"><?= $product->getName(); ?></h3>
                        </div>
                    </article>
                </a>

            <?php endforeach; ?>
        </ul> 
    </main>
    <?php require("inc/footer.php"); ?>
</body>
</html>