<?php
require('../models/product-model.php');

function createProductPage() {
    require('../views/create-product.php');
}

function productStockPage() {
    require('../views/product-list.php');
}

function createProduct() {

    //$isOk = checkPostKeys(["name", "description", "price", "product_reference"], $_POST); --> vérifier les clés du POST
    if(isset($_POST["create-product"]) ) {
        //vérifier les types et le contenu
        
<<<<<<< HEAD
        function verifierNombre(){
            if(is_numeric($_POST["price"],$_POST["product_reference"])){
                
            }else{
                echo "Error";
            }
        }
        
        
=======
>>>>>>> 1dcfd0a1e0bc49f7a2c8d782c3835835610abd4a
        $prdtInfo = [
            "prdtName" => $_POST["name"],
            "prdtDesc" => $_POST["description"],
            "prdtPrice" => $_POST["price"],
            "prdtRef" => $_POST["product_reference"],
        ];

        $resp = addProduct($prdtInfo);
        //Afficher une view
        if($resp) {
            echo "Produit ajouté";
        }
        else {
            throw new \Exception("Erreur lors de l'ajout");
        }
    }
}

function listingProduct() {

    $productList = productList();

    require('../views/product-list.php');
    
}

?>