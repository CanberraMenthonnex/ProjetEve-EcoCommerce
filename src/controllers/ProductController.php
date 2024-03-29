<?php

namespace Controller;

use Core\Http;
use Core\Controller\Controller;
use Core\Model\EntityManager;
use Exception;
use Model\Entity\Product;

class ProductController extends Controller {

    private $em;

    public function __construct()
    {
        $this->em = new EntityManager("Product");
    }

    public function searchList () {

        $keywords = isset($_GET["search"]) ? $_GET["search"] : null;
        $search = "%" . $keywords . "%";
        $searchFilters = $keywords ? ["name" =>$search] : [];

        $category =  isset($_GET["category"])? $_GET["category"] : null;
        $catFilter = $category ? [ "category" => $category] : [];

        $products = $this->em->findByRegex( array_merge($searchFilters, $catFilter) );

        $this->render("client-search-page", array_merge( compact("products", "keywords"), $catFilter ? ["category" => PRODUCT_CATEGORIES[$category] ] : [] ));
    }

    public function productDescription (string $productId) {

        $product = $this->em->findOne(["id"=>$productId]);
        $relationProducts = $this->em->find([], ["*"], [0,5]);
        
        if(!$product) {
            Http::redirect(HOME_ROUTE);
        }

        $db = EntityManager::getDatabase();
        $totalQuery = $db->prepare("SELECT COUNT(id) AS total, AVG(rating) AS avgrate FROM product_review WHERE product_id = :product_id");
        $totalQuery->execute(["product_id"=>$productId]);
        $total = $totalQuery->fetch();

        $this->render("client-product-page", compact("product", "relationProducts", "total"));
    }



}