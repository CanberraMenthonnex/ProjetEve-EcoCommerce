<?php
namespace Controller;

use Model;
use Tools\Http;
use Tools\Session;

class ProductController extends AdminController {

    public static function createProductPage() {
        self::protectForAdmin();
        self::render('creation_article.php');
    }

    public static function createProduct() {
        self::protectForAdmin();
        if(self::checkPostKeys($_POST, ["name", "description", "price"])) {

            if(!is_numeric($_POST["price"])) Http::redirect(HOME_ROUTE);

            $name = htmlspecialchars($_POST["name"]);
            $desc = $_POST["description"];
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
        self::protectForAdmin();
        $productList = Model\ProductRepository::getAll();
        $admin = Session::get(self::SESSION_NAME);
        self::render('product-back.php', compact("productList", "admin"));
    }

    public static function removeProduct (string $id) {
        self::protectForAdmin();
        if(Model\ProductRepository::deleteById($id)) Http::redirect(ADMIN_GET_PRODUCT_ROUTE);
        else throw new \Exception(ERROR_DELETE_BDD);
    }

}