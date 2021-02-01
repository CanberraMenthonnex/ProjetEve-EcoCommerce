<?php
namespace Controller;

use Core\Controller\Controller;
use Core\Http;
use Core\Model\EntityManager;
use Core\Session;
use Core\ValidatorInt;
use Model;
use Model\Entity\Rating;

class RatingController extends Controller {

   public function __construct() {
      $this->protectFor("user", HOME_ROUTE);
   }


   public function addRating(string $product_id) {
      
      $user = Session::get('user');
      
      if($this->checkPostKeys($_POST, ["rating"], ["comment"])) {

         $rt = $_POST["rating"];
         $cm = $_POST["comment"];

         $em = new EntityManager("Rating");
         
         $result = $em->findOne(["product_id"=>$product_id], ["product_id"]);
      
         if(!$result) {

            $cart = new Rating();

            $cart
               ->setRating($rt)
               ->setComment($cm)
               ->setUser_id($user->getId())
               ->setProduct_id($product_id);
            
            $resp = $em->save($product_review);
               
            if($resp) {
               Http::redirect(HOME_ROUTE);
            }
            else {
               throw new \Exception(ERROR_ADDING_COMMENT);
            }

         } else {
            throw new \Exception(ALREADY_IN_COMMENT);           
         }
      }   
      else {
         throw new \Exception(ERROR_ADDING_COMMENT);
      }
     
  }




  public function removeCartProduct(string $product_id) {

   $em = new EntityManager("Rating");

   $resp = $em->delete(["product_id"=>$product_id]);

   if($resp) Http::redirect(GET_CART_ROUTE);
     else throw new \Exception(ERROR_DELETE_BDD);
  }  
  
}