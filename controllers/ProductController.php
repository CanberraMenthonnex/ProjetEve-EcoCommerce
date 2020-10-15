<?php
namespace Controller;

require ("../models/product-model.php");

class ProductController extends Controller {

    public static function createProductPage() {
        self::render('create-product.php');
    }

    public static function createProduct() {

        if(self::checkPostKeys($_POST, ["name", "description", "price"])) {

            if(!is_numeric($_POST["price"])) die("Bad type");

            $prdtInfo = [
                "prdtName" => $_POST["name"],
                "prdtDesc" => $_POST["description"],
                "prdtPrice" => $_POST["price"],
            ];

            $resp = addProduct($prdtInfo);

            if($resp) {
                echo "Produit ajouté";
            }
            else {
                throw new \Exception(ERROR_SAVING_BDD);
            }
        }
        else
        {
            throw new \Exception(BAD_KEYS);
        }
    }


    public static function listingProduct() {
        
        $productList = productList();

        self::render('product-list.php');
    }   

}