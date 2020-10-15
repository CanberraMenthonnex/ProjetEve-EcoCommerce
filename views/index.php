<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/97b40379bf.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <div id="boutonHeader">
            <p>item1</p>
            <p>item2</p>
            <p>item3</p>
        </div>
        <a href=""><div id="divLogo">
            <img id="logoImg" src="img/logo.png" alt="logo du site">
        </div></a>
        <div id="divPanier">
            <img id="panierImg" src="img/panier.png" alt="panier">
        </div>
    </header>

    <div id="searchs">
        <i class="fas fa-search"></i><input id="search" type="text">
    </div>
    <div id="slider">
        <img src="img/slide1.jpg" alt="Photo" id="slide">
        <div id="precedent" onclick="ChangeSlide(-1)"><</div>
        <div id="suivant" onclick="ChangeSlide(1)">></div>
    </div>

    <footer>
        <img class="iconeF" src="img/insta.png" alt="instagram">
        <img class="iconeF" src="img/what.png" alt="what's app">
        <img class="iconeF" src="img/facebook.png" alt="facebook">
    </footer>

<script src="main.js"></script>
</body>
</html>