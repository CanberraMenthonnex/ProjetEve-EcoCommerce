<?php
namespace Controller;

use Core\Http;
use Core\Model\EntityManager;
use Core\Session;
use Model;
use Model\Entity\Cart;

class CartController extends Controller {

   public function productPage() {

      $this->render('product.php');
   }


   public function addCart(string $product_id) {

      Session::set("user", 1);
                                                   // POUR TESTER POUR L'INSTANT
      $user = Session::get("user");


      if($this->checkPostKeys($_POST, ["cart", "quantity"])) {
         
         $em = new EntityManager("Cart");

         $result = $em->findOne(["product_id"=>$product_id], ["product_id"]);


         if(!$result) {
            
            if(!is_numeric($_POST["quantity"])) Http::redirect(HOME_ROUTE);

            $cart = new Cart();

            $cart
               ->setQuantity($_POST["quantity"])
               ->setUser_id($user)
               ->setProduct_id($product_id);
            
            $resp = $em->save($cart);
               
            if($resp) {
               Http::redirect(GET_CART_ROUTE);
            }
            else {
               throw new \Exception(ERROR_ADDING_CART);
            }

         } else {
            throw new \Exception(ALREADY_IN_CART);           
         }
      }   
      else {
         throw new \Exception(ERROR_ADDING_CART);
      }
     
  }


   public function listingCart() {
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

     $this->render('cart.php', compact("user", "cartList"));
   }



  public function removeCartProduct(string $product_id) {

   $em = new EntityManager("Cart");

   $resp = $em->delete(["product_id"=>$product_id]);

   if($resp) Http::redirect(GET_CART_ROUTE);
     else throw new \Exception(ERROR_DELETE_BDD);
  }


  public function updateCartQuantity(string $product_id) {
     
   $em = new EntityManager("Cart");

   $result = $em->findOne(["product_id"=>$product_id]);

   if($result) {
      $result
      ->setQuantity($_POST["quantity"]);
      
      $resp = $em->update($result);
      
      if($resp) {
         Http::redirect(GET_CART_ROUTE);
      }else {
         throw new \Exception(ERROR_UPDATING_CART_QUANTITY);
      }
   }
   else {
      throw new \Exception(ERROR_UPDATE_BDD);
   }
  }
  
}