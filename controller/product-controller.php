<?php
require('../model/product-model.php');

function createProductPage() {
    require('../view/create-product.php');
}

function createProduct() {
    if(isset($_POST["create-product"])) {
        addProduct();
    }
}



/*
createProductPage();
createProduct();
*/


?>