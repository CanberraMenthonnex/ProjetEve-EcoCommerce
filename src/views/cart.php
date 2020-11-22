<h2>Panier</h2>

<?php foreach($cartList as $product): ?>


<span>Nom du Produit : <?= $product["name"] ?></span> <br>

<span>ID : <?= $product["product_id"] ?> </span> <br>

<span>Description : <?= $product["description"] ?></span> <br>

<span>Quantité :</span>

<form action="<?= UPDATE_CART_QUANTITY_ROUTE . $product["product_id"]; ?>" method="POST">
    <input type="number" value="<?= $product["quantity"] ?>" min="1" max="99" name="quantity">
    <input type="submit" name="newQuantity" value="Enregistrer les modifications">
</form>

<span>Prix : <?= $product["price"]*$product["quantity"] ?> €</span> <br><br>


<a href="<?= DELETE_CART_PRODUCT_ROUTE . $product["product_id"]; ?>" id="suppArticle">Supprimer produit</a>

<br><br><br><br><br>

<?php endforeach ?>

