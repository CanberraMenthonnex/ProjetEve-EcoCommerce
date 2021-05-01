<?php
namespace Controller;

use Core\Controller\Controller;
use Core\FileReader;
use Core\Model\EntityManager;
use Model;
use Core\Http;
use Core\Session;

class AdminProductController extends Controller {

    private $em;

    const SESSION_NAME = "admin";

    public function __construct()
    {
        $this->protectFor(self::SESSION_NAME, HOME_ROUTE);
        $this->em = new EntityManager("Product");
    }

    public function createProductPage() {
        $admin = Session::get(self::SESSION_NAME);
        $this->render('admin-creation-article', compact("admin"));
    }

    public function createProduct() {

        if($this->checkPostKeys($_POST, ["name", "description", "price", "category"]) && $_FILES) {

            $files = array_values($_FILES);
            if(!is_numeric($_POST["price"])) Http::redirect(HOME_ROUTE);

            $fileReader = new FileReader();

            $fileReader->defineDir(ROOT . "/". PRODUCT_UPLOAD_IMG_PATH);

            $fileReader->getImage($files[0]);

            $name = htmlspecialchars($_POST["name"]);
            $desc = $_POST["description"];
            $price = htmlspecialchars($_POST["price"]);
            $category = PRODUCT_CATEGORIES[$_POST["category"]] ? $_POST["category"] : "wild";

            $product = new Model\Entity\Product();

            $product
                ->setName($name)
                ->setDescription($desc)
                ->setPrice($price)
                ->setImageUrl($fileReader->getUrl())
                ->setCategory($category);

            $resp = $this->em->save($product);

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

        $productList = $this->em->find();

        $admin = Session::get(self::SESSION_NAME);

        $this->render('admin-product-list', compact("productList", "admin"));
    }

    public  function removeProduct (string $id) {

        $product = $this->em->findOne(["id" => $id]);

        if(!$product) {
            Http::redirect(ADMIN_GET_PRODUCT_ROUTE);
        }

        if(file_exists(ROOT . "/" . PRODUCT_UPLOAD_IMG_PATH . $product->getImageUrl())) {
            unlink(ROOT . "/" . PRODUCT_UPLOAD_IMG_PATH . $product->getImageUrl());
        }

        $res = $this->em->delete(["id"=> $id]);
        
        if($res) {
            Http::redirect(ADMIN_GET_PRODUCT_ROUTE);
        }
        else throw new \Exception(ERROR_DELETE_BDD);
    }

    public function editProductPage(string $id) {
        $admin = Session::get(self::SESSION_NAME);
        $product = $this->em->findOne(["id" => $id]);

        if(!$product) {
            $this->redirectWithError(ADMIN_GET_PRODUCT_ROUTE, "Resource not found");
        }

        $this->render("admin-creation-article", compact("admin", "product"));
    }

    public function editProduct(string $id) {
        $product = $this->em->findOne(["id" => $id]);

        if(!$product) {
            $this->redirectWithError(ADMIN_GET_PRODUCT_ROUTE, "Resource not found");
        }

        if($this->checkPostKeys($_POST, ["name", "description", "price", "category"])) {


            if(!is_numeric($_POST["price"])) Http::redirect(HOME_ROUTE);

            $name = htmlspecialchars($_POST["name"]);
            $desc = $_POST["description"];
            $price = htmlspecialchars($_POST["price"]);
            $category = PRODUCT_CATEGORIES[$_POST["category"]] ? $_POST["category"] : "wild";

            $product
                ->setName($name)
                ->setDescription($desc)
                ->setPrice($price)
                ->setCategory($category);

            $files = array_values($_FILES);

            if($files[0]["name"]) {

                $fileReader = new FileReader();

                $fileReader->defineDir(ROOT . "/". PRODUCT_UPLOAD_IMG_PATH);

                $fileReader->getImage($files[0]);

                unlink(ROOT . "/" . PRODUCT_UPLOAD_IMG_PATH . $product->getImageUrl());

                $product->setImageUrl($fileReader->getUrl());

            }

            $this->em->update($product, ["id" => $product->getId()]);

            $this->redirect(ADMIN_GET_PRODUCT_ROUTE, "La modification s'est effectuée avec succès");


        }

        $this->redirectWithError(ADMIN_GET_PRODUCT_ROUTE, "Le contenu de la requête n'est pas valide");
    }

}