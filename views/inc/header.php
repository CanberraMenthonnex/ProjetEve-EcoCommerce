<?php 
    use Tools\Session;
?>

<header class="top-bar">
    <div class="top-bar--top">
        <nav>   
            <a href="#" class="top-bar--link">Home</a>
            <a href="#" class="top-bar--link">Blog</a>
            <a href="#" class="top-bar--link">Menu</a>
        </nav>
        <div class="head-items">
            <form class="search-bar" method="GET">
                <input type="text" class="search-bar--input" name="search" size="30" placeholder="Rechercher un produit..." autocomplete="off">
                <button class="search-bar--submit">
                    <img src="/img/search.svg" title="search" alt="search" class="search-bar--icon"/>
                </button>
            </form>
            <a href="#" class="head-items--btn">


                <?php
                    if(Session::checkSession("user")){
                        $userSession = Session::get("user");
                        echo "<a href='/customer/profil' id='customerName' class='white'>" . ($userSession->getFirstname()) . "</a>";
                    }else{
                        echo "<a href='/customer/sign'><img src='/img/user-icon.svg' alt='user icon' title='User' class='head-items--icon'></a>";
                    }

                ?>
                
            

            </a>
            <button class="head-items--btn">
                <img src="/img/basket-icon.svg" alt="basket" title="Basket" class="head-items--icon">
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
</header>


  