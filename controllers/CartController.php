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

     

  // require('views/cart.php');

     self::render('cart.php', compact("user", "cartList"));
  }
  
}









  




/*
<?php

try {
   $db = new PDO("mysql:host=localhost;dbname=back_office", "root", "");
} catch(PDOException $e) {
   echo "Echec : " . $e;
   die;
};

use Tools\Session;

include('../views/cart.php');

require("../tools/Session.php");

Session::set("user", 1);

$user = Session::get("user");

var_dump($user);


if(isset($_POST["cart"])) {

   $prdt = [
      "User" => $user,
      "PrdtId" => $_GET["id"],
      "Quantity" => $_POST["quantity"],
   ];

   $query = $db->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:User, :PrdtId, :Quantity)");

   $query->execute($prdt);
 
}

?>
*/