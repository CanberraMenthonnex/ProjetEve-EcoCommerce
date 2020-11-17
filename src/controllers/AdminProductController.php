<?php
namespace Controller;

use Core\Model\EntityManager;
use Model;
use Core\Http;
use Core\Session;

class AdminProductController extends AdminController {

    public function __construct()
    {
        $this->protectForAdmin();
    }

    public function createProductPage() {
        $this->render('creation_article.php');
    }

    public function createProduct() {
       
        if($this->checkPostKeys($_POST, ["name", "description", "price"])) {

            if(!is_numeric($_POST["price"])) Http::redirect(HOME_ROUTE);

            $name = htmlspecialchars($_POST["name"]);
            $desc = $_POST["description"];
            $price = htmlspecialchars($_POST["price"]);

            $product = new Model\Entity\Product();

            $product
                ->setName($name)
                ->setDescription($desc)
                ->setPrice($price);

            $em = new EntityManager("Product");

            $resp = $em->save($product);

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


    public  function listingProduct() {

        $em = new EntityManager("Product");

        $productList = $em->find();

        $admin = Session::get(self::SESSION_NAME);

        $this->render('product-back.php', compact("productList", "admin"));
    }

    public  function removeProduct (string $id) {

        $em = new EntityManager("Product");

        $res = $em->delete(["id"=> $id]);

        if($res) {
            Http::redirect(ADMIN_GET_PRODUCT_ROUTE);
        }
        else throw new \Exception(ERROR_DELETE_BDD);
    }

}