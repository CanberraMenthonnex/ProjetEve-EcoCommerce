<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProductBack</title>
    <link rel="stylesheet" href="/style/display-article.css">
    <script src="https://kit.fontawesome.com/97b40379bf.js" crossorigin="anonymous"></script>
</head>
<body>
    <header id="headerAfficheArticle">
        <span>Connecté en tant que administrateur <b><?= $admin->getMail(); ?></b></span>
        <div>
            
            <a href="<?=ADMIN_CREATE_PRODUCT_ROUTE ?>" id="ajoutArticle">Ajouter un article</a>
            <a href="<?=ADMIN_GET_REVIEW_ROUTE ?>" id="ajoutArticle">Gerer les commentaires</a>
            <a href="<?=ADMIN_LOGOUT_ROUTE?>">Déconnexion</a>
        </div>
    </header>
    <img class="logoBackOffice" src="/img/logoBackOffice.png">
    <h1 class="titleProductBack">Inventaire Produits</h1>
    <div class="search">
        <span>Recherche : </span>
        <input type="text" class="searchText">
    </div>
    <div id="filters">
        <h3>Trier par :</h3>
        <h5 class="filterPrice">Prix : <a href="#">Asc</a><span>/</span><a href="#">Desc</a></h5>
        <h5 class="filterDate">Date : <a href="#">Asc</a><span>/</span><a href="#">Desc</a></h5>
        <h5 class="filterAlpha">Ordre alphabétique : <a href="#">Asc</a><span>/</span><a href="#">Desc</a></h5>
    </div>
    <table cellspacing=12>
        <tr class="tableHead">
            <td>Nom</td>
            <td>Id</td>
            <td>Date</td>
            <td>Prix</td>
            <td>Supprimer produit</td>
        </tr>
        <?php
            foreach ($productList as $product) {
        ?>
            <tr class="tableBody">
                <td><?= $product->getName()?></td>
                <td><?= $product->getId()?></td>
                <td><?= $product->getCreatedAt()->format("d-m-Y")?></td>
                <td><?= $product->getPrice()?> €</td>
                <td><a href="<?= ADMIN_DELETE_PRODUCT_ROUTE . $product->getId(); ?>" id="suppArticle">Supprimer produit</a></td>
            </tr>
        <?php
            }
        ?>
    </table>

    <script src="/js/display-article.js"></script>
</body>
</html>