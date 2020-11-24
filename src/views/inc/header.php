<header class="top-bar">
    <div class="top-bar--top">
        <nav>   
            <a href="<?= MAIN_PATH . HOME_ROUTE ?>" class="top-bar--link">Home</a>
            <a href="#" class="top-bar--link">Blog</a>
            <a href="#" class="top-bar--link">Contact</a>
        </nav>
        <div class="head-items">
            <form class="search-bar" method="GET" action="<?= MAIN_PATH . SEARCH_ROUTE ?>">
                <input type="text" class="search-bar--input" autocomplete="off" name="search" size="30" placeholder="Rechercher un produit...">
                <button class="search-bar--submit">
                    <img src="<?= MAIN_PATH ?>/img/search.svg" title="search" alt="search" class="search-bar--icon"/>
                </button>
            </form>
            <a href="#" class="head-items--btn">

                
                <?php
              
                    if(gettype($userSession) === "object"){
                        echo "<a href='".MAIN_PATH."/customer/profil' id='customerName' class='white'>" . $userSession->getFirstname() . "</a>";
                    }else{
                         echo "<a href=' ". MAIN_PATH ."/customer/sign'><img src='". MAIN_PATH ."/img/user-icon.svg' alt='user icon' title='User' class='head-items--icon'></a>";
                    }

                ?>

            </a>
            <button class="head-items--btn">
                <img id="basketIcon" src="<?= MAIN_PATH ?>/img/basket-icon.svg" alt="basket" title="Basket" class="head-items--icon">
            </button>
        </div>
        <div class="listShopping">
            <h3>Panier</h3>
            <div class="container-products"></div>
            <?php
                if(!$userSession) {
                    echo "<p>Il faut être connecté pour pouvoir ajouter des produits au panier</p>";
                }
            ?>
            <button id="buyBasket">Acheter</button>
        </div>
    </div>
    <div class="top-bar--bottom">
        <div class="annex-nav-wrapper">
            <nav class="annex-nav">
                <a href="#" class="annex-nav--items">Catégorie</a>
                <a href="#" class="annex-nav--items">Catégorie</a>
                <a href="#" class="annex-nav--items">Catégorie</a>
                <a href="#" class="annex-nav--items">Catégorie</a>
                <a href="#" class="annex-nav--items">Catégorie</a>
                <a href="#" class="annex-nav--items">Catégorie</a>
            </nav>
        </div>
        
        <img src="<?= MAIN_PATH ?>/img/logo.svg" alt="EVE" title="Projet EVE" class="top-bar--logo">
    </div>
</header>


  