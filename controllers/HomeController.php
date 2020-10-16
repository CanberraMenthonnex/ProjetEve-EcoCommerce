<?php
namespace Controller;

use Model\ProductRepository;

class HomeController extends Controller {

    public static function homePage() {
        $products = ProductRepository::getAll();
        self::render("home.php", compact("products"));
    }

}