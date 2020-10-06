<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <form action="create-product.php" method="POST">

            <label for="product-name">Nom du produit</label> 
            <input type="text" name="product-name" id="product-name" required> <br><br>

            <label for="product-desc">Description du produit</label>
            <textarea name="product-desc" id="product-desc" required></textarea> <br><br>

            <label for="product-price">Prix du produit</label>
            <input type="number" name="product-price" id="product-price" required> <br><br>
            
            <label for="product-ref">Référence du produit</label>
            <input type="text" name="product-ref" id="product-ref" required> <br><br>

            <input type="submit" name="createproduct" id="create-product">

        </form>
    </body>

</html>