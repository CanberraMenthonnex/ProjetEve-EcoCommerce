<?php

namespace Controller;

use Core\Http;
use Core\Controller\Controller;
use Core\Model\EntityManager;
use Exception;

class ProductController extends Controller {

    public function searchList () {

        if(!isset($_GET["search"])) {
            throw new Exception(BAD_KEYS);
        }

        $keywords = $_GET["search"];

        $search = "%" . $keywords . "%";

        $em = new EntityManager("Product");
        $products = $em->findByRegex(["name" =>$search]);
       
        $this->render("client-search-page", compact("products", "keywords"));
    }

    public function productDescription (string $productId) {
        $em = new EntityManager("Product");
        $product = $em->findOne(["id"=>$productId]);
        $relationProducts = $em->find([], ["*"], [0,5]);
        
        if(!$product) {
            Http::redirect(HOME_ROUTE);
        }
        //------------------- TOTAL DES AVIS ET MOYENNE DES NOTES----------------------\\
        $db = EntityManager::getDatabase();
        $totalQuery = $db->prepare("SELECT COUNT(id) AS total, AVG(rating) AS avgrate FROM product_review WHERE product_id = :product_id");
        $totalQuery->execute(["product_id"=>$productId]);
        $total = $totalQuery->fetch();

        $this->render("client-product-page", compact("product", "relationProducts", "total"));
    }



}