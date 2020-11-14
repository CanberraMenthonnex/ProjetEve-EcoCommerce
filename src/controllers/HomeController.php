<?php
namespace Controller;

use Core\Model\EntityManager;


class HomeController extends Controller {

    public  function homePage() {
        
        $em = new EntityManager("Product");
        $products = $em->find();
        $this->render("home.php", compact("products"));
    }

}