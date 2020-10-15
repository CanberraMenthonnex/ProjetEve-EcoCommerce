<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProductBack</title>
    <link rel="stylesheet" href="/style/display-article.css">
    <script src="https://kit.fontawesome.com/97b40379bf.js" crossorigin="anonymous"></script>
</head>
<body>
<script>
    function supprArticle(e){
        var suppression = e.parentNode;
        suppression.style.display = "none";
        console.log("ss")
    }
</script>
    <header id="headerAfficheArticle">
        <span>Connecté en tant que administrateur <b>Romain.L</b></span>
        <div>
            <a href="/">Déconnexion</a>
            <a href="/admin/product/form" id="ajoutArticle">Ajouter un article</a>
        </div>
    </header>
    <div id="products">
        <?php
            foreach ($productList as $product) {
        ?>
        <div class="product">
            <h1 class="nameProduct"><b>Nom du produit :</b> <?= $product->getName()?></h1>
            <span class="descriptionProduct"><b>Description :</b> <?= $product->getDescription()?></span>
            <span class="idProduct"><b>Id produit :</b> <?= $product->getId()?></span>
            <span class="urlImageProduct"><b>Url image :</b> http://hduzyydbhzbdyagdjyaegfbeza.com</span>
            <span class="priceprduct"><b>Prix du produit :</b> <?= $product->getPrice()?> €</span>
            <span class="dateProduct"><b>Date produit :</b> <?= $product->getDate()->format(HOURS_FORMAT)?></span>
            <a href="#" onclick="supprArticle(this)">Supprimer produit</a>
        </div>
        <?php
            }
        ?>

    </div>
</body>
</html>