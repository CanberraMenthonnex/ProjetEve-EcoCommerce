<?php
namespace Controller;

class HomeController extends Controller {

    public static function homePage() {
        self::render("index.php");
    }

}