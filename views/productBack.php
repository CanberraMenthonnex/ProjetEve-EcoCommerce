<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProductBack</title>
    <link rel="stylesheet" href="style.css">
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
            <a href="#">Déconnexion</a>
            <a href="#" id="ajoutArticle">Ajouter un article</a>
        </div>
    </header>
    <div id="products">
        <div class="product">
            <h1 class="nameProduct"><b>Nom du produit :</b> Gourde</h1>
            <span class="descriptionProduct"><b>Description :</b> Une gourde fait avec des matières recyclable avec une grande durée de vie.</span>
            <span class="idProduct"><b>Id produit :</b> 45</span>
            <span class="urlImageProduct"><b>Url image :</b> http://hduzyydbhzbdyagdjyaegfbeza.com</span>
            <span class="priceprduct"><b>Prix du produit :</b> 20 €</span>
            <span class="dateProduct"><b>Date produit :</b> 24/05/20</span>
            <span class="referenceProduct"><b>Référence produit :</b> 745812</span>
            <a href="#" onclick="supprArticle(this)">Supprimer produit</a>
        </div>
        <div class="product">
            <h1 class="nameProduct"><b>Nom du produit :</b> Paille</h1>
            <span class="descriptionProduct"><b>Description :</b> Une paille fait avec des matières recyclable et écologique.</span>
            <span class="idProduct"><b>Id produit :</b> 75</span>
            <span class="urlImageProduct"><b>Url image :</b>http://hduzyyd54dzfzyaegfbeza.com</span>
            <span class="priceprduct"><b>Prix du produit :</b> 10 €</span>
            <span class="dateProduct"><b>Date produit :</b> 12/12/20</span>
            <span class="referenceProduct"><b>Référence produit :</b> 4424512</span>
            <a href="#" onclick="supprArticle(this)">Supprimer produit</a>
        </div>
        <div class="product">
            <h1 class="nameProduct"><b>Nom du produit :</b> Stylo</h1>
            <span class="descriptionProduct"><b>Description :</b> Un stylo fait avec 100% de plastique recyclable.</span>
            <span class="idProduct"><b>Id produit :</b> 81</span>
            <span class="urlImageProduct"><b>Url image :</b> http://hduzyydbhzhdzufgzudjyaegfbeza.com</span>
            <span class="priceprduct"><b>Prix du produit :</b> 5 €</span>
            <span class="dateProduct"><b>Date produit :</b> 02/08/20</span>
            <span class="referenceProduct"><b>Référence produit :</b> 3685812</span>
            <a href="#" onclick="supprArticle(this)">Supprimer produit</a>
        </div>
        <div class="product">
            <h1 class="nameProduct"><b>Nom du produit :</b> Carnet de note</h1>
            <span class="descriptionProduct"><b>Description :</b> Une carnet de note fait avec des matières recyclable et avec une grande durée de vie.</span>
            <span class="idProduct"><b>Id produit :</b> 145</span>
            <span class="urlImageProduct"><b>Url image :</b> http://hduzyydbhe54fefebeza.com</span>
            <span class="priceprduct"><b>Prix du produit :</b> 15 €</span>
            <span class="dateProduct"><b>Date produit :</b> 21/02/20</span>
            <span class="referenceProduct"><b>Référence produit :</b> 14512</span>
            <a href="#" onclick="supprArticle(this)">Supprimer produit</a>
        </div>
        <div class="product">
            <h1 class="nameProduct"><b>Nom du produit :</b> Sac de course</h1>
            <span class="descriptionProduct"><b>Description :</b> Une sac fait avec des matières recyclable avec une grande durée de vie.</span>
            <span class="idProduct"><b>Id produit :</b> 685</span>
            <span class="urlImageProduct"><b>Url image :</b> http://hduzyydbhz454haegfbeza.com</span>
            <span class="priceprduct"><b>Prix du produit :</b> 12 €</span>
            <span class="dateProduct"><b>Date produit :</b> 14/02/20</span>
            <span class="referenceProduct"><b>Référence produit :</b> 425812</span>
            <a href="#" onclick="supprArticle(this)">Supprimer produit</a>
        </div>
        <div class="product">
            <h1 class="nameProduct"><b>Nom du produit :</b> Savon</h1>
            <span class="descriptionProduct"><b>Description :</b> Un savon non toxique pour la planète.</span>
            <span class="idProduct"><b>Id produit :</b> 87</span>
            <span class="urlImageProduct"><b>Url image :</b> http://hduzyydgtfyhyaegfbeza.com</span>
            <span class="priceprduct"><b>Prix du produit :</b> 8 €</span>
            <span class="dateProduct"><b>Date produit :</b> 09/03/20</span>
            <span class="referenceProduct"><b>Référence produit :</b> 68474</span>
            <a href="#" onclick="supprArticle(this)">Supprimer produit</a>
        </div>
    </div>
</body>
</html>