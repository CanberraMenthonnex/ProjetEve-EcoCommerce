<?php
namespace Controller;

use Core\Controller\Controller;
use Core\Model\EntityManager;
use Core\Session;

class HomeController extends Controller {

    public  function homePage() {
        // Session::set("user", ["user"]);
        $em = new EntityManager("Product");
        $products = $em->find();
        $this->render("home.php", compact("products"));
    }

}