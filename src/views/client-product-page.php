<?php

use Core\Router\PathGenerator;
use Core\View\Template\Template;

ob_start()

?>
    <section class="m-3 product-banner">
    
        <p class="product-banner--title"><u>Catégorie Gourde</u> <?= $product->getName() ?></p><br>
        <article class="product-banner--container">
            <img id="product_image" class="product-banner--img-frame " src="<?= PathGenerator::generateImgPath('gourde.jpg') ?>" alt="product-image">
            <div class="product-banner--desc-container">
                <div class="product-banner--desc-container-child">
                    <form action="<?= MAIN_PATH . ADD_CART_ROUTE ."/" . $product->getId() ?>" method="POST" class="product-banner--cart-wrapper">
                        <button href="<?= MAIN_PATH . ADD_CART_ROUTE . "/" . $product->getId(); ?>" class="product-banner--cart-btn">
                            
                            <svg  width="41.616" height="32.368" viewBox="0 0 41.616 32.368">
                                <path id="Icon_awesome-shopping-basket" data-name="Icon awesome-shopping-basket" d="M41.616,15.544V16.7a1.734,1.734,0,0,1-1.734,1.734H39.3L37.418,31.641a3.468,3.468,0,0,1-3.433,2.978H7.632A3.468,3.468,0,0,1,4.2,31.641L2.312,18.434H1.734A1.734,1.734,0,0,1,0,16.7V15.544A1.734,1.734,0,0,1,1.734,13.81H6.6L14.314,3.2a2.312,2.312,0,1,1,3.74,2.72L12.317,13.81H29.3L23.562,5.922A2.312,2.312,0,0,1,27.3,3.2L35.017,13.81h4.865A1.734,1.734,0,0,1,41.616,15.544ZM22.542,28.26V20.168a1.734,1.734,0,1,0-3.468,0V28.26a1.734,1.734,0,1,0,3.468,0Zm8.092,0V20.168a1.734,1.734,0,1,0-3.468,0V28.26a1.734,1.734,0,1,0,3.468,0Zm-16.184,0V20.168a1.734,1.734,0,1,0-3.468,0V28.26a1.734,1.734,0,1,0,3.468,0Z" transform="translate(0 -2.25)" fill="#e4e4e4"/>
                            </svg>
    
                        </button> 
                        <input type="number" min="1" name="quantity" value="1" class="product-banner--cart-input">
                    </form>
                    <div class="product-banner--desc-wrapper">
                        <p class="product-banner--price"><?= $product->getPrice() ?>€</p>
                        <p class="product-banner--desc"><?= $product->getDescription() ?></p>
                    </div>
                </div>  
            </div>
            
        </article>

    </section>
    <section class="px-2">
        <header class="delimiter-title">
            <h2 class="separator-header--title f-white py-2">Les produits qui pourraient vous interesser</h2>
        </header>
        <div class="">
            <div class="flex justify--between align--stretch justify-phone--center my-1">
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
            <div class="flex justify--center">
                <div class="arrow-btn-wrapper">
                    <!-- LEFT ARROW -->
                    <button>
                        <svg  viewBox="0 0 56.221 54.797">
                            <path id="Icon_awesome-arrow-left" data-name="Icon awesome-arrow-left" d="M32.314,53.774,29.528,56.56a3,3,0,0,1-4.254,0L.881,32.179a3,3,0,0,1,0-4.254L25.274,3.532a3,3,0,0,1,4.254,0l2.786,2.786a3.015,3.015,0,0,1-.05,4.3L17.143,25.027H53.206a3,3,0,0,1,3.012,3.012v4.015a3,3,0,0,1-3.012,3.012H17.143L32.263,49.47A2.993,2.993,0,0,1,32.314,53.774Z" transform="translate(0.004 -2.647)" fill="#5e6e3f"/>
                        </svg>
                    </button>
                    
                    <!-- RIGHT ARROW -->
                    <button>
                        <svg viewBox="0 0 56.221 54.797">
                            <path id="Icon_awesome-arrow-right" data-name="Icon awesome-arrow-right" d="M23.9,6.318l2.786-2.786a3,3,0,0,1,4.254,0L55.336,27.913a3,3,0,0,1,0,4.254L30.943,56.56a3,3,0,0,1-4.254,0L23.9,53.774a3.015,3.015,0,0,1,.05-4.3l15.12-14.405H3.011A3,3,0,0,1,0,32.054V28.038a3,3,0,0,1,3.011-3.012H39.074L23.954,10.622A2.993,2.993,0,0,1,23.9,6.318Z" transform="translate(0 -2.647)" fill="#5e6e3f"/>
                        </svg>
                    </button>
                    

                </div> 
            </div>
            
        </div>
        


    </section>
    <section class="px-2">
        <header class="delimiter-title">
            <h2 class="separator-header--title f-white py-2">Avis</h2>
        </header>
        <div class='flex--column pb-2'>
        <?php
            $avis = $total->total;
            var_dump($total);
            $page = 1;
            for ($i=0; $i < $avis; $i += 5) {
                echo "<a href='" . $i . "' class='pagination'>" . $page . "</a>";
                $page += 1;
            }
        ?>
            <article class="comment-area">
                <div class='comment-area--user'>
                   <img src="<?= PathGenerator::generateImgPath('user.svg') ?>" alt="icon-user"> 
                </div>
                
                <div class="comment-area--trees-wrapper">
                    
                    <svg  viewBox="0 0 29.801 39.737" class="comment-area--tree">
                        <path id="Icon_awesome-tree" data-name="Icon awesome-tree" d="M29.36,29.374l-6.2-7.023h2.377a1.763,1.763,0,0,0,1.613-1.014,1.711,1.711,0,0,0-.255-1.866l-6.064-7.054h2.242a1.758,1.758,0,0,0,1.619-1.056,1.727,1.727,0,0,0-.329-1.869L15.806.375a1.278,1.278,0,0,0-1.81,0L5.437,9.492a1.728,1.728,0,0,0-.329,1.869,1.76,1.76,0,0,0,1.62,1.056H8.97L2.906,19.473a1.713,1.713,0,0,0-.254,1.866,1.763,1.763,0,0,0,1.613,1.013H6.642l-6.2,7.023a1.716,1.716,0,0,0-.276,1.883A1.8,1.8,0,0,0,1.8,32.285H12.417v1.9l-2.351,3.756a1.242,1.242,0,0,0,1.111,1.8h7.447a1.242,1.242,0,0,0,1.111-1.8l-2.351-3.756v-1.9H28.006a1.8,1.8,0,0,0,1.631-1.028A1.716,1.716,0,0,0,29.36,29.374Z" transform="translate(0 0.001)" fill="#e7df00"/>
                    </svg>

                    <svg  viewBox="0 0 29.801 39.737" class="comment-area--tree">
                        <path id="Icon_awesome-tree" data-name="Icon awesome-tree" d="M29.36,29.374l-6.2-7.023h2.377a1.763,1.763,0,0,0,1.613-1.014,1.711,1.711,0,0,0-.255-1.866l-6.064-7.054h2.242a1.758,1.758,0,0,0,1.619-1.056,1.727,1.727,0,0,0-.329-1.869L15.806.375a1.278,1.278,0,0,0-1.81,0L5.437,9.492a1.728,1.728,0,0,0-.329,1.869,1.76,1.76,0,0,0,1.62,1.056H8.97L2.906,19.473a1.713,1.713,0,0,0-.254,1.866,1.763,1.763,0,0,0,1.613,1.013H6.642l-6.2,7.023a1.716,1.716,0,0,0-.276,1.883A1.8,1.8,0,0,0,1.8,32.285H12.417v1.9l-2.351,3.756a1.242,1.242,0,0,0,1.111,1.8h7.447a1.242,1.242,0,0,0,1.111-1.8l-2.351-3.756v-1.9H28.006a1.8,1.8,0,0,0,1.631-1.028A1.716,1.716,0,0,0,29.36,29.374Z" transform="translate(0 0.001)" fill="#e7df00"/>
                    </svg>

                    <svg  viewBox="0 0 29.801 39.737" class="comment-area--tree">
                        <path id="Icon_awesome-tree" data-name="Icon awesome-tree" d="M29.36,29.374l-6.2-7.023h2.377a1.763,1.763,0,0,0,1.613-1.014,1.711,1.711,0,0,0-.255-1.866l-6.064-7.054h2.242a1.758,1.758,0,0,0,1.619-1.056,1.727,1.727,0,0,0-.329-1.869L15.806.375a1.278,1.278,0,0,0-1.81,0L5.437,9.492a1.728,1.728,0,0,0-.329,1.869,1.76,1.76,0,0,0,1.62,1.056H8.97L2.906,19.473a1.713,1.713,0,0,0-.254,1.866,1.763,1.763,0,0,0,1.613,1.013H6.642l-6.2,7.023a1.716,1.716,0,0,0-.276,1.883A1.8,1.8,0,0,0,1.8,32.285H12.417v1.9l-2.351,3.756a1.242,1.242,0,0,0,1.111,1.8h7.447a1.242,1.242,0,0,0,1.111-1.8l-2.351-3.756v-1.9H28.006a1.8,1.8,0,0,0,1.631-1.028A1.716,1.716,0,0,0,29.36,29.374Z" transform="translate(0 0.001)" fill="#e7df00"/>
                    </svg>

                    <svg   viewBox="0 0 29.801 39.737" class="comment-area--tree">
                        <path id="Icon_awesome-tree" data-name="Icon awesome-tree" d="M29.36,29.374l-6.2-7.023h2.377a1.763,1.763,0,0,0,1.613-1.014,1.711,1.711,0,0,0-.255-1.866l-6.064-7.054h2.242a1.758,1.758,0,0,0,1.619-1.056,1.727,1.727,0,0,0-.329-1.869L15.806.375a1.278,1.278,0,0,0-1.81,0L5.437,9.492a1.728,1.728,0,0,0-.329,1.869,1.76,1.76,0,0,0,1.62,1.056H8.97L2.906,19.473a1.713,1.713,0,0,0-.254,1.866,1.763,1.763,0,0,0,1.613,1.013H6.642l-6.2,7.023a1.716,1.716,0,0,0-.276,1.883A1.8,1.8,0,0,0,1.8,32.285H12.417v1.9l-2.351,3.756a1.242,1.242,0,0,0,1.111,1.8h7.447a1.242,1.242,0,0,0,1.111-1.8l-2.351-3.756v-1.9H28.006a1.8,1.8,0,0,0,1.631-1.028A1.716,1.716,0,0,0,29.36,29.374Z" transform="translate(0 0.001)" fill="#e7df00"/>
                    </svg>

                    <svg  viewBox="0 0 29.801 39.737" class="comment-area--tree comment-area--tree-unselected">
                        <path id="Icon_awesome-tree" data-name="Icon awesome-tree" d="M29.36,29.374l-6.2-7.023h2.377a1.763,1.763,0,0,0,1.613-1.014,1.711,1.711,0,0,0-.255-1.866l-6.064-7.054h2.242a1.758,1.758,0,0,0,1.619-1.056,1.727,1.727,0,0,0-.329-1.869L15.806.375a1.278,1.278,0,0,0-1.81,0L5.437,9.492a1.728,1.728,0,0,0-.329,1.869,1.76,1.76,0,0,0,1.62,1.056H8.97L2.906,19.473a1.713,1.713,0,0,0-.254,1.866,1.763,1.763,0,0,0,1.613,1.013H6.642l-6.2,7.023a1.716,1.716,0,0,0-.276,1.883A1.8,1.8,0,0,0,1.8,32.285H12.417v1.9l-2.351,3.756a1.242,1.242,0,0,0,1.111,1.8h7.447a1.242,1.242,0,0,0,1.111-1.8l-2.351-3.756v-1.9H28.006a1.8,1.8,0,0,0,1.631-1.028A1.716,1.716,0,0,0,29.36,29.374Z" transform="translate(0 0.001)" fill="#e7df00"/>
                    </svg>
                    
                </div>
                <p class="comment-area--content">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Ratione excepturi, cupiditate enim voluptas dolore illum. 
                    Dicta nulla impedit sint doloremque incidunt nisi molestias 
                    voluptatibus officiis, nemo dolore rem, repudiandae tempore!
                </p>
            </article> 
        </div>        
        
        
    </section>

<?php
$content = ob_get_clean();
$temp = new Template($product->getName(), [], ["index"]);
$temp->transmitVarToContext(compact("userSession"));
$temp->render($content);