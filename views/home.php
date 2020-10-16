<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/index.css">
    <script src="https://kit.fontawesome.com/97b40379bf.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body id="bodyIndex">

    <header>
        <div id="buttonHeader">
            <a href="">Accueil</a>
            <a href="">Produits</a>
            <a href="">Contact</a>
        </div>
        <a href=""><div id="divLogo">
            <img id="logoImg" src="img/logo.png" alt="logo du site">
        </div></a>
        <div id="divShop">
            <a href="">
            <img id="shopImg" src="img/panier.png" alt="panier">
            </a>
        </div>
    </header>



    <div id="searchs">
        <i class="fas fa-search"></i><input id="search" type="text">
    </div>


    <div id="slider">
        <img src="img/slide1.jpg" alt="Photo" id="slide">
        <div id="precedent" ><</div>
        <div id="suivant" >></div>
    </div>

    <section class="productsindex">
        <div class="h1product"><h1>Produits</h1></div>
        <?php foreach ($products as $product) {?>
        <div class="content-box">
            <img src="1.png"  >
            <p><?= $product->getName(); ?></p>
            <p><?= $product->getPrice(); ?>€</p>
        </div>
        <?php }?>

    </section>
    <!--<div class="h1product"><h1>Produits</h1><div>-->
    <!--<section class="productsindex">
        <div class="content-box">
            <img src="1.png" >
            <p>NOM D'ARTICLE</p>
            <p>prix</p>
        </div>
        <div class="content-box">
            <img src="1.png"  >
            <p>NOM D'ARTICLE</p>
            <p>prix</p>
        </div>
        <div class="content-box">
            <img src="1.png"  >
            <p>NOM D'ARTICLE</p>
            <p>prix</p>
        </div>
        <div class="content-box">
            <img src="1.png" >
            <p>NOM D'ARTICLE</p>
            <p>prix</p>
        </div>

    </section>-->

    <footer>
        <img class="iconeF" src="/img/insta.png" alt="instagram">
        <img class="iconeF" src="/img/what.png" alt="what's app">
        <img class="iconeF" src="/img/facebook.png" alt="facebook">
    </footer>

<script src="/js/index.js"></script>
</body>
</html>