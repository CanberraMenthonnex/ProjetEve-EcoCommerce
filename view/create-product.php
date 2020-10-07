<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <form action="product-controller.php" method="POST">

            <label for="name">Nom du produit</label> 
            <input type="text" name="name" id="name" required> <br><br>

            <label for="description">Description du produit</label>
            <textarea name="description" id="description" required></textarea> <br><br>

            <label for="price">Prix du produit</label>
            <input type="number" name="price" id="price" required> <br><br>
            
            <label for="product_reference">Référence du produit</label>
            <input type="text" name="product_reference" id="product_reference" required> <br><br>

            <input type="submit" name="create-product" id="create-product">

        </form>
    </body>

</html>