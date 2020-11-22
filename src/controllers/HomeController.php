<?php
namespace Controller;

use Core\Controller\Controller;
use Core\Model\EntityManager;
use Core\Session;

class HomeController extends Controller {

    public  function homePage() {

//*************TEMPORAIRE******************* (listingCart)

        Session::set("user", 1);
                                                         // POUR TESTER POUR L'INSTANT
        $user = Session::get("user");
      
        $db = EntityManager::getDatabase();
      
        $query = $db->prepare(
            "SELECT product_id, name, description, price, quantity          
            FROM cart
            INNER JOIN product ON cart.product_id = product.id
            WHERE user_id = :user_id"
        );
           
        $query->execute(["user_id" => $user]);
        
        $cartList = $query->fetchAll(\PDO::FETCH_ASSOC);
    
//*************TEMPORAIRE*******************



        // Session::set("user", ["user"]);
        $em = new EntityManager("Product");
        $products = $em->find();
        $this->render("home", compact("products", "cartList"));
    }

}