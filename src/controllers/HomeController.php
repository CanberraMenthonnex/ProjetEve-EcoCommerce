<?php
namespace Controller;

use Core\Controller\Controller;
use Core\Model\EntityManager;
use Core\Session;

class HomeController extends Controller {

    public  function homePage() {
        $em = new EntityManager("Product");
        $products = $em->find([], ["*"], [0,5]);
        $this->render("home", compact("products"));
    }

}