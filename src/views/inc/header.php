<header class="header">
    <div class="header--main ">
        <nav class="header--nav-main">   
            <a href="<?= MAIN_PATH . HOME_ROUTE ?>" class="top-bar--link">Home</a>
            <a href="#" class="top-bar--link">Blog</a>
            <a href="#" class="top-bar--link">Contact</a>
        </nav>
        <div class="header--action-wrapper">
            <form class="header--action-items search-bar " method="GET" action="<?= MAIN_PATH . SEARCH_ROUTE ?>">
                <input type="text" class="search-bar--input" autocomplete="off" name="search" size="30" placeholder="Rechercher un produit...">
                <button class="search-bar--submit">
                    <img src="<?= MAIN_PATH ?>/img/search.svg" title="search" alt="search" class="search-bar--icon"/>
                </button>
            </form>
           

            
            <?php
            
                if(gettype($userSession) === "object"){
                    echo "<a href='".MAIN_PATH."/customer/profil' id='customerName' class='header--action-items--icon'>" . $userSession->getFirstname() . "</a>";
                }else{
                        echo "<a href=' ". MAIN_PATH ."/customer/sign' class='header--action-items--icon'><img src='". MAIN_PATH ."/img/user-icon.svg' alt='user icon' title='User' class='head-items--icon'></a>";
                }

            ?>

            
            <button class="header--action-items--icon">
                <img id="basketIcon" src="<?= MAIN_PATH ?>/img/basket-icon.svg" alt="basket" title="Basket" class="head-items--icon">
            </button>
        </div>
        <div class="listShopping header--cart">
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
        <img src="<?= MAIN_PATH ?>/img/logo.svg" alt="EVE" title="Projet EVE" class="header--logo">
    </div>
</header>


  