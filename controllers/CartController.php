<?php
namespace Controller;

use Model;
use Tools\Http;
use Tools\Session;

class CartController extends Controller {

   public static function productPage() {

      self::render('product.php');
   }


   public static function addCart() {

      Session::set("user", 1);
                                                   // POUR TESTER POUR L'INSTANT
      $user = Session::get("user");

      if(self::checkPostKeys($_POST, ["cart", "quantity"])) {
         

      $test = Model\CartRepository::getId();

         if($test["id"] === "0") {
            
            if(!is_numeric($_POST["quantity"])) Http::redirect(HOME_ROUTE);

            $user_id = $user;
            $product_id = $_POST["id"];
            $quantity = $_POST["quantity"];

            $resp = Model\CartRepository::save($user, $product_id, $quantity);
               
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


  public static function listingCart() {
      Session::set("user", 1);
                                                   // POUR TESTER POUR L'INSTANT
      $user = Session::get("user");

     $cartList = Model\CartRepository::getInfos();

     self::render('cart.php', compact("user", "cartList"));
  }



  public static function removeCartProduct(string $id) {
     if(Model\CartRepository::deleteById($id)) Http::redirect(GET_CART_ROUTE);
     else throw new \Exception(ERROR_DELETE_BDD);
  }


  // CREER LA FONCTION POUR MODIFIER
  
}