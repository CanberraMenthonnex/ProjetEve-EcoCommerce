<?php 

/*
$query = $db->prepare(
    "SELECT name, description, price, quantity
     FROM cart
     INNER JOIN product ON cart.product_id = product.id
     WHERE user_id = :user_id"
);

$query->execute(["user_id" => $user]);

$cartList = $query->fetchAll(PDO::FETCH_ASSOC);
*/

?>


<h2>Panier</h2>

<?php foreach($cartList as $product): ?>


<span>Nom du Produit : <?= $product["name"] ?></span> <br>

<span>description : <?= $product["description"] ?></span> <br>

<span>Quantité :</span>

<form action="/cart/stock" method="POST">
    <input type="number" value="<?= $product["quantity"] ?>" min="1" name="quantity">
    <input type="submit" name="newQuantity" value="Enregistrer les modifications">
</form>

<span>Prix : <?= $product["price"]*$product["quantity"] ?> €</span> <br><br><br><br>


<?php endforeach ?>

