<?php


namespace Controller;

use Core\Model\EntityManager;


class TestController extends Controller
{
    public function test () {

       $em = new EntityManager("Product");
       echo "<pre>";
       $p = $em->find([], ["*"], [0,1]);
       var_dump($p);
    }
}