<?php

use Core\Router\PathGenerator;
use Core\View\Template\Template;

ob_start()
?>  
    <section class="p-2">
        <?php if( $keywords) :  ?>
            <h1 class="f-white search-title py-1 py-3-phone">Vous avez recherché "<?= $keywords ?>"</h1>
        <?php endif; ?>
        <?php if( $category) :  ?>
            <h1 class="f-white search-title py-1 py-3-phone">Vous avez recherché dans la catégorie "<?= $category ?>"</h1>
        <?php endif; ?>
        <section class="flex justify-tablet--center align--stretch">
            <?php foreach($products as $product) : ?>

                <a href="<?= PathGenerator::generatePath( PRODUCT_DESC_ROUTE . $product->getId() )?>" class="col3 m-1">
                    <article class="col12 product-card flex-fill--height">
                        <img src="<?= PathGenerator::generatePath("upload/" . $product->getImageUrl())?>" alt="" class="product-card--img">
                        <div class="product-card--content">
                            <span class="product-card--price"><?= $product->getPrice(); ?>€</span>
                            <h3 class="product-card--title"><?= $product->getName(); ?></h3>
                        </div>
                    </article>
                </a>

            <?php endforeach; ?>
        </section>
    </section>
    <div class="flex-fill--width flex justify--center py-2 py-5-phone">
        <a href="#" class="btn-page "></a>
        <a href="#" class="btn-page "></a>
        <a href="#" class="btn-page--selected "></a>
    </div>
         
    

<?php
$content = ob_get_clean();
$temp = new Template("Recherche : $keywords", [], ['index']);
$temp->transmitVarToContext(compact("userSession"));
$temp->render($content);