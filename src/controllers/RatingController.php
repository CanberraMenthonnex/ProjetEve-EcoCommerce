<?php
namespace Controller;

use Core\Controller\Controller;
use Core\Http;
use Core\Model\EntityManager;
use Core\Session;
use Core\ValidatorInt;
use Model;
use Model\Entity\Rating;

class ReviewController extends Controller {

   public function __construct() {
      $this->protectFor("user", HOME_ROUTE);
   }


   public function addReview(string $product_id) {
      
      $user = Session::get('user');
      
      if($this->checkPostKeys($_POST, ["rating"], ["comment"])) {

         $rt = $_POST["rating"];
         $cm = $_POST["comment"];

         $em = new EntityManager("Rating");
         
         $result = $em->findOne(["product_id"=>$product_id, "user_id" => $user->getId()], ["product_id"]);
      
         if(!$result) {

            $product_review = new Rating();

            $product_review
               ->setRating($rt)
               ->setComment($cm)
               ->setUser_id($user->getId())
               ->setProduct_id($product_id);
            
            $resp = $em->save($product_review);
               
            if($resp) {
               Http::redirect(HOME_ROUTE);
            }
            else {
               throw new \Exception(\ERROR_SAVING_BDD);
            }

         } else {
            throw new \Exception("You have already post a review for this product");           
         }
      }   
      else {
         throw new \Exception(\ERROR_SAVING_BDD);
      }
     
  }


  
}