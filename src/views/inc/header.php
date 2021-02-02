<?php 
    use Core\Router\PathGenerator;
?>

<header class="header">
    <div class="header--main ">

        <!-- GLOBAL NAV -->

        <div id="nav-bar" class="header--nav-main-wrapper">
            <nav class="header--nav-main">   
                <a href="<?= PathGenerator::generatePath(HOME_ROUTE) ?>" class="header--link">Home</a>
                <a href="<?= PathGenerator::generatePath(ARTICLE_ROUTE) ?>" class="header--link">Blog</a>
                <a href="#" class="header--link">Contact</a>
            </nav> 
            <div class="header--action-wrapper-resp">
                <a href="#" class="header--action-items--icon">
                    <img src="<?= MAIN_PATH ?>/img/search-white.svg" title="search" alt="search" class="search-bar--icon"/>
                </a>
                <?php
                
                    if(gettype($userSession) === "object"){
                        echo "<a href=' ". PathGenerator::generatePath("customer/profil")." ' id='customerName' class='header--username-resp'>" . $userSession->getFirstname() . "</a>";
                    }else{
                            echo '<a href="'. PathGenerator::generatePath('customer/login').' " class="header--username"><img src="'.  PathGenerator::generateImgPath('luser-icon.svg') .' alt="user icon" title="User" class="head-items--icon"></a>';
                    }

                ?>
                <button  href="#" class="header--action-items--icon basketIcon">
                    <img src="<?= MAIN_PATH ?>/img/basket-icon.svg" alt="basket" title="Basket" class="head-items--icon">
                </button>
            </div>
        </div>
        
        <img src="<?= PathGenerator::generateImgPath('logo.svg')?>" alt="EVE" title="Projet EVE" class="header--logo">
        <div class="header--action-wrapper">
            <form class="header--search-bar search-bar " method="GET" action="<?= PathGenerator::generatePath(SEARCH_ROUTE) ?>">
                <input type="text" class="search-bar--input" autocomplete="off" name="search" size="30" placeholder="Rechercher un produit...">
                <button class="search-bar--submit">
                    <img src="<?= PathGenerator::generateImgPath('search.svg')?>" title="search" alt="search" class="search-bar--icon"/>
                </button>
            </form>
           

            
            <?php
            
                if(gettype($userSession) === "object"){
                    echo "<a href='". PathGenerator::generatePath("customer/profil")."' id='customerName' class='header--username'>" . $userSession->getFirstname() . "</a>";
                }else{
                        echo "<a href=' ". PathGenerator::generatePath("customer/login") ."' class='header--action-items--icon'><img src='". MAIN_PATH ."/img/user-icon.svg' alt='user icon' title='User' class='head-items--icon'></a>";
                }

            ?>

            
            <button class="header--action-items--icon basketIcon" >
                <img src="<?= MAIN_PATH ?>/img/basket-icon.svg" alt="basket" title="Basket" class="head-items--icon">
            </button>
        </div>
        <button class="header--burger-btn" id="burger-btn">
            <span></span>
        </button>
        <!-- CART  -->
        <div class="listShopping header--cart" id="listShopping">
            <h3>Panier</h3>
            <div class="container-products"></div>
            <?php
                if(!$userSession) {
                    echo "<p>Il faut être connecté pour pouvoir ajouter des produits au panier</p>";
                }
            ?>
            <button id="buyBasket" class="header--cart--buy">Acheter</button>
        </div>

    </div>
    <div class="header--bottom">
        <div class="header--nav-category-wrapper">
            <nav  class="header--nav-category">
                <a href="#" class="header--nav-category--items">Catégorie</a>
                <a href="#" class="header--nav-category--items">Catégorie</a>
                <a href="#" class="header--nav-category--items">Catégorie</a>
                <a href="#" class="header--nav-category--items">Catégorie</a>
                <a href="#" class="header--nav-category--items">Catégorie</a>
                <a href="#" class="header--nav-category--items">Catégorie</a>
            </nav> 
        </div>
    </div>
</header>


  