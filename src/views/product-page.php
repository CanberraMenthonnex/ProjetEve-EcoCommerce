<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/common.css">
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/product-page.css">
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/header.css" />
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/footer.css">
    <title>Page Produit</title>
</head>
<body>
    <?php require("inc/header.php") ?>
    <main>

    <input type="hidden" value="<?= $product->getId() ?>" id="prdtId">
    
    <section class="produit">
    
        <p class="product_price"><u>Catégorie Gourde</u> <?= $product->getName() ?></p><br>
        <article>
            <img id="product_image" src="<?= MAIN_PATH ?>/img/gourde.jpg" alt="product-image">
            <div class="description_product">
                <form action="<?= MAIN_PATH . ADD_CART_ROUTE ."/" . $product->getId() ?>" method="POST" class="cart-form">
                    <button href="<?= MAIN_PATH . ADD_CART_ROUTE . "/" . $product->getId(); ?>" class="cart-button">
                        <img id="basket_image" src="<?= MAIN_PATH ?>/img/basket-icon.svg" alt="votre panier"> 
                    </button> 
                    <input type="number" min="1" name="quantity" value="1">
                </form>
                
                <p class="price"><?= $product->getPrice() ?></p>
                <p class="description_text white 17px"><?= $product->getDescription() ?></p>
            </div>
        </article>

    </section>
    <section>
        <div class="title_lined">
            <hr>
            <h2 class="white">Les produits qui pourraient vous interesser</h2>
            <hr>
        </div>

        <div class="sugestion">
        <?php foreach($relationProducts as $product) : ?>

            <a href="<?= MAIN_PATH . PRODUCT_DESC_ROUTE . $product->getId() ?>" class="w-15">
                <article class="product-card">
                    <img src="<?= MAIN_PATH ?>/img/product-img.png" alt="" class="product-card--img">
                    <div class="product-card--content">
                        <span class="product-card--price"><?= $product->getPrice(); ?>€</span>
                        <h3 class="product-card--name"><?= $product->getName(); ?></h3>
                    </div>
                </article>
            </a>

        <?php endforeach; ?>
          
        </div>

        <div class="controler_slider">
            <p class="arrow_left">< </p>
            <p class="arrow_right"> ></p>
        </div>

    </section>
    <section class="avis">
    <div class="title_lined">
            <hr>
            <h2 class="white">Avis (<?= $total->total ?>) - <?= round($total->avgrate, 1) ?> &#x1f384;</h2>
            <hr>
    </div>

    <div id="review"></div>

    </section>

    <div class="divPgt">
        <?php
            $avis = $total->total;
            $page = 1;
            for ($i=0; $i < $avis; $i += 5) {
                echo "<a href='" . $i . "' class='pagination'>" . $page . "</a>";
                $page += 1;
            }
        ?>
    </div>

    
    <?php require("inc/footer.php"); ?>
    
    </main>


</body>
</html>