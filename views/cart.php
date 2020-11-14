<?php 
$query = $db->prepare(
    "SELECT name, description, price, quantity
     FROM cart
     INNER JOIN product ON cart.product_id = product.id
     WHERE user_id = :user_id"
);

$query->execute(["user_id" => $user]);

$cart_list = $query->fetchAll(PDO::FETCH_ASSOC);

// var_dump($query->fetchAll());

?>


<h2>Panier</h2>

<?php foreach($cart_list as $product): ?>

<span>Nom du Produit : <?= $product['name'] ?></span> <br>

<span>description : <?= $product['description'] ?></span> <br>

<span>Quantité : <?= $product['quantity'] ?></span> <br>

<span>Prix : <?= $product['price']*$product['quantity'] ?></span> <br><br><br><br>



<?php endforeach ?>

