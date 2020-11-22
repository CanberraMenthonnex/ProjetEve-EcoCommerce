<header class="top-bar">
    <div class="top-bar--top">
        <nav>   
            <a href="<?= MAIN_PATH . HOME_ROUTE ?>" class="top-bar--link">Home</a>
            <a href="#" class="top-bar--link">Blog</a>
            <a href="#" class="top-bar--link">Contact</a>
        </nav>
        <div class="head-items">
            <form class="search-bar" method="GET" action="<?= MAIN_PATH . SEARCH_ROUTE ?>">
                <input type="text" class="search-bar--input" name="search" size="30" placeholder="Rechercher un produit...">
                <button class="search-bar--submit">
                    <img src="/img/search.svg" title="search" alt="search" class="search-bar--icon"/>
                </button>
            </form>
            <a href="#" class="head-items--btn">


                <?php
                    if(isset($userSession)){
                        echo "<a href='/customer/profil' id='customerName' class='white'>" . ($userSession->getFirstname()) . "</a>";
                    }else{
                        echo "<a href='/customer/sign'><img src='/img/user-icon.svg' alt='user icon' title='User' class='head-items--icon'></a>";
                    }

                ?>
                
            

            </a>
            <button class="head-items--btn">
                <img id="basketIcon" src="/img/basket-icon.svg" alt="basket" title="Basket" class="head-items--icon">
            </button>
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
        
        <img src="/img/logo.svg" alt="EVE" title="Projet EVE" class="top-bar--logo">
    </div>
    <div class="listShopping">
        <h1>Panier</h1>
        <div class="item">
            <div class="itemPicture">
                <img src="<?= MAIN_PATH ?>/img/product-img.png">
            </div>
            <div class="itemInfo">
                <span>Nom du produit</span>
                <span class="priceProduct">10.99€</span>
            </div>
            <div class="itemQuantity">
                <span><input type="number"></span>
            </div>
            <div class="itemDelete">
                <img src="img/close-btn.png" alt="deleteProduct">
            </div>
        </div>
        <div class="item">
            <div class="itemPicture">
                <img src="<?= MAIN_PATH ?>/img/product-img.png">
            </div>
            <div class="itemInfo">
                <span>Nom du produit</span>
                <span class="priceProduct">10.99€</span>
            </div>
            <div class="itemQuantity">
                <span><input type="number"></span>
            </div>
            <div class="itemDelete">
                <img src="img/close-btn.png" alt="deleteProduct">
            </div>
        </div>
        <div class="item">
            <div class="itemPicture">
                <img src="<?= MAIN_PATH ?>/img/product-img.png">
            </div>
            <div class="itemInfo">
                <span>Nom du produit</span>
                <span class="priceProduct">10.99€</span>
            </div>
            <div class="itemQuantity">
                <span><input type="number"></span>
            </div>
            <div class="itemDelete">
                <img src="img/close-btn.png" alt="deleteProduct">
            </div>
        </div>
    </div>
</header>


  