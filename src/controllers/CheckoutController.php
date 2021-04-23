<?php
    namespace Controller;
    
    use Core\Session;
    use Core\Model\EntityManager;
    use Core\Controller\Controller;

    class CheckoutController extends Controller{


        public function checkout(){

            
            $user = Session::get("user");
            $db = EntityManager::getDatabase();
      
            $query = $db->prepare(
               "SELECT product_id, name, description, price, quantity
                FROM cart
                INNER JOIN product ON cart.product_id = product.id
                WHERE user_id = :user_id"
            );

            $query->execute(["user_id" => $user->getId()]);
     
            $cartList = $query->fetchAll(\PDO::FETCH_ASSOC);

            $totalPrice = 0;
            $totalProduct = 0;

            foreach($cartList as $price){
                $totalPrice = $totalPrice + $price["price"];
            }

            foreach($cartList as $quantity){
                $totalProduct = $totalProduct + $quantity["quantity"];
            }

            $this->render("client-checkout", compact("cartList", "totalPrice", "totalProduct"));
        }

        


    }



?>