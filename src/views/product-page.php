
<?php

    use Core\View\Template\Template;

?>
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

        <div class="flex justify--between align--stretch justify-phone--center">
            <?php foreach($relationProducts as $product) : ?>
                <a href="<?= MAIN_PATH . PRODUCT_DESC_ROUTE . $product->getId() ?>" class="col2 col5-tablet my-2-tablet col9-phone">
                    <article class="product-card flex-fill--height">
                        <img src="<?= MAIN_PATH ?>/img/product-img.png" alt="" class="product-card--img">
                        <div class="product-card--content">
                            <span class="product-card--price"><?= $product->getPrice() ?>€</span>
                            <h3 class="product-card--title"><?= $product->getName() ?></h3>
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
<?php
$content = ob_get_clean();
$temp = new Template($product->getName(), [], ["index"]);
$temp->transmitVarToContext(compact("userSession"));
$temp->render($content);
