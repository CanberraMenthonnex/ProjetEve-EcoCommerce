<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des produits</title>
    </head>

    <body>

        <?php foreach($productList as $product) { ?>

            <h2><?= $product->getName(); ?></h2>
            <p><?= $product->getDescription() ?></p>
            <h3><?= $product->getPrice() ?> €</h3>
    <!--    <img src="" alt="Image du produit">                          A COMPLETER QUAND ON AURA MIS L'AJOUT D'IMAGES...     --> 
            <a href="">Supprimer le produit</a> <br><br><hr><br>

        <?php } ?>

    </body>

</html>