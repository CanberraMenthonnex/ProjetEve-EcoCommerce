<?php
namespace Controller;

use Model;
use Tools\Http;

class ProductController extends Controller {

    public static function createProductPage() {
        self::render('creation_article.php');
    }

    public static function createProduct() {

        if(self::checkPostKeys($_POST, ["name", "description", "price"])) {

            if(!is_numeric($_POST["price"])) Http::redirect(HOME_ROUTE);

            $name = htmlspecialchars($_POST["name"]);
            $desc = htmlspecialchars($_POST["description"]);
            $price = htmlspecialchars($_POST["price"]);

            $resp = Model\ProductRepository::save($name, $desc, $price, new \DateTime());

            if($resp) {
                Http::redirect(ADMIN_GET_PRODUCT_ROUTE);
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
        
        $productList = Model\ProductRepository::getAll();
        self::render('product-back.php', compact("productList"));
    }   

}