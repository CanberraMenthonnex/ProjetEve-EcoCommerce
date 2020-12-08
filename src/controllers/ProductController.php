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
       
        $this->render("search-page", compact("products", "keywords"));
    }

    public function productDescription (string $productId) {
        $em = new EntityManager("Product");
        $product = $em->findOne(["id"=>$productId]);
        $relationProducts = $em->find([], ["*"], [0,5]);
        
        if(!$product) {
            Http::redirect(HOME_ROUTE);
        }

        $db = EntityManager::getDatabase();

        $review = $db->prepare(
            "SELECT comment, rating, lastname, firstname
             FROM product_review
             INNER JOIN user ON product_review.user_id = user.id
             WHERE product_id = :product_id
             ORDER BY date DESC"
        );

        $review->execute(["product_id"=>$productId]);

        $reviewList = $review->fetchAll(\PDO::FETCH_OBJ);


        $totalQuery = $db->prepare("SELECT COUNT(id) AS total, AVG(rating) AS avgrate FROM product_review WHERE product_id = :product_id");
        $totalQuery->execute(["product_id"=>$productId]);
        $total = $totalQuery->fetch();

        $this->render("product-page", compact("product", "relationProducts", "reviewList", "total"));
    }

}