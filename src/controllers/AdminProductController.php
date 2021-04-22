<?php
namespace Controller;

use Core\Controller\Controller;
use Core\FileReader;
use Core\Model\EntityManager;
use Model;
use Core\Http;
use Core\Session;

class AdminProductController extends Controller {

    const SESSION_NAME = "admin";

    public function __construct()
    {
        $this->protectFor(self::SESSION_NAME, HOME_ROUTE);
    }

    public function createProductPage() {
        $admin = Session::get(self::SESSION_NAME);
        $this->render('admin-creation-article', compact("admin"));
    }

    public function createProduct() {

        if($this->checkPostKeys($_POST, ["name", "description", "price"]) && $_FILES) {

            $files = array_values($_FILES);
            if(!is_numeric($_POST["price"])) Http::redirect(HOME_ROUTE);

            $fileReader = new FileReader();

            $fileReader->defineDir(ROOT . "/". PRODUCT_UPLOAD_IMG_PATH);

            $fileReader->getImage($files[0]);

            $name = htmlspecialchars($_POST["name"]);
            $desc = $_POST["description"];
            $price = htmlspecialchars($_POST["price"]);

            $product = new Model\Entity\Product();

            $product
                ->setName($name)
                ->setDescription($desc)
                ->setPrice($price)
                ->setImageUrl($fileReader->getUrl());

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

        $this->render('admin-product-list', compact("productList", "admin"));
    }

    public  function removeProduct (string $id) {

        $em = new EntityManager("Product");

        $product = $em->findOne(["id" => $id]);

        if(!$product) {
            Http::redirect(ADMIN_GET_PRODUCT_ROUTE);
        }

        unlink(ROOT . "/" . PRODUCT_UPLOAD_IMG_PATH . $product->getImageUrl());

        $res = $em->delete(["id"=> $id]);
        
        if($res) {
            Http::redirect(ADMIN_GET_PRODUCT_ROUTE);
        }
        else throw new \Exception(ERROR_DELETE_BDD);
    }

}