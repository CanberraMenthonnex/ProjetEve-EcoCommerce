<?php
namespace Controller;

use Model;
use Tools\Http;
use Tools\Session;


include('../views/cart.php');
require("../tools/Session.php");


class CartController extends AdminController {

   public static function productPage() {
      self::protectForAdmin();
      self::render('product.php');
   }


   public static function setId() {
      self::protectForAdmin();
      Session::set("user", 1);

      $user = Session::get("user");

      
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

require("../tools/Session.php");

Session::set("user", 1);

$user = Session::get("user");


?>

*/