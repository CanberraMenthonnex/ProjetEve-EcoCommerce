<?php
namespace Controller;

use Core\Controller\Controller;
use Core\Http;
use Core\Model\EntityManager;
use Core\Session;
use Core\ValidatorInt;
use Model;
use Model\Entity\Cart;

class CartController extends Controller {

   public function __construct() {
      $this->protectFor("user", HOME_ROUTE);
   }


   public function addCart(string $product_id) {
      
      $user = Session::get('user');
      
      if($this->checkPostKeys($_POST, ["quantity"])) {

         $qtt = $_POST["quantity"];
         
         $em = new EntityManager("Cart");
         
         $result = $em->findOne(["product_id"=>$product_id], ["product_id"]);
      
         if(!$result) {

            $cart = new Cart();

            $cart
               ->setQuantity($qtt)
               ->setUser_id($user->getId())
               ->setProduct_id($product_id);
            
            $resp = $em->save($cart);
               
            if($resp) {
               Http::redirect(HOME_ROUTE);
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
 
     echo json_encode($cartList);

   }



  public function removeCartProduct(string $product_id) {

   $em = new EntityManager("Cart");

   $resp = $em->delete(["product_id"=>$product_id]);

   if($resp) Http::redirect(GET_CART_ROUTE);
     else throw new \Exception(ERROR_DELETE_BDD);
  }


  public function updateCartQuantity(string $product_id) {
   
   $qtt =  $_POST["quantity"];
   $isQuantityGood = ValidatorInt::validateQuantityInt($qtt);
   if(!$isQuantityGood) throw new \Exception(ERROR_UPDATING_CART_QUANTITY);
   
   $user = Session::get('user');
     
   $em = new EntityManager("Cart");

   $result = $em->findOne(["product_id"=>$product_id, "user_id"=>$user->getId()]);

   if($result) {
      $result
      ->setQuantity($qtt);
      
      $resp = $em->update($result, ["product_id"=>$product_id, "user_id"=>$user->getId()]);

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