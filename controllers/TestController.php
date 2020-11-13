<?php


namespace Controller;


use Core\Model\EntityManager;

class TestController extends Controller
{
    public function test () {
        $em = new EntityManager("Product");
        $product = $em->find(["id"=>2])[0];
        $product->setName("Ceci est un nom modifiddqzdé");
        $res = $em->update($product);

        var_dump($res);
    }
}