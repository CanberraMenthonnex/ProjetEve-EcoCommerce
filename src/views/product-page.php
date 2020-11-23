<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    
    <section class="produit">
    
        <p class="product_price"><u>Catégorie Gourde</u> : Gourde x8çk</p><br>
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
            <h2 class="white">Avis</h2>
            <hr>
        </div>

        <article class="article_avis">
            <img class="icon-user" src="<?= MAIN_PATH ?>/img/user.svg" alt="icon-user">

            <div class="icons_tree">
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                </div>
                <p class="gray">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Ratione excepturi, cupiditate enim voluptas dolore illum. 
                    Dicta nulla impedit sint doloremque incidunt nisi molestias 
                    voluptatibus officiis, nemo dolore rem, repudiandae tempore!
                </p>
            </article>
            <article class="article_avis">
            <img class="icon-user" src="<?= MAIN_PATH ?>/img/user.svg" alt="icon-user">

            <div class="icons_tree">
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                </div>
                <p class="gray">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Ratione excepturi, cupiditate enim voluptas dolore illum. 
                    Dicta nulla impedit sint doloremque incidunt nisi molestias 
                    voluptatibus officiis, nemo dolore rem, repudiandae tempore!
                </p>
            </article>
            <article class="article_avis">
            <img class="icon-user" src="<?= MAIN_PATH ?>/img/user.svg" alt="icon-user">

            <div class="icons_tree">
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                </div>
                <p class="gray">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Ratione excepturi, cupiditate enim voluptas dolore illum. 
                    Dicta nulla impedit sint doloremque incidunt nisi molestias 
                    voluptatibus officiis, nemo dolore rem, repudiandae tempore!
                </p>
            </article>
            <article class="article_avis">
            <img class="icon-user" src="<?= MAIN_PATH ?>/img/user.svg" alt="icon-user">

            <div class="icons_tree">
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                    <span>&#x1f384;</span>
                </div>
                <p class="gray">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Ratione excepturi, cupiditate enim voluptas dolore illum. 
                    Dicta nulla impedit sint doloremque incidunt nisi molestias 
                    voluptatibus officiis, nemo dolore rem, repudiandae tempore!
                </p>
            </article>
    </section>
    
    <?php require("inc/footer.php"); ?>
    
    </main>
</body>
</html>