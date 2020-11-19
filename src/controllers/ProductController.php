<?php

namespace Controller;

use Core\Controller\Controller;
use Core\Model\EntityManager;
use Exception;

class ProductController extends Controller {

    public function searchList () {

        if(!isset($_GET["search"])) {
            throw new Exception(BAD_KEYS);
        }

        $search = "%" . $_GET["search"] . "%";

        $em = new EntityManager("Product");
        $products = $em->findByRegex(["name" =>$search]);
       
        var_dump($products);
    }

}