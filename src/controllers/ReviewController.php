<?php
namespace Controller;

use Core\Controller\Controller;
use Core\Http;
use Core\Model\EntityManager;
use Core\Session;
use Model;
use Model\Entity\ProductReview;

class ReviewController extends Controller {


   public function addReview(string $product_id) {
       $this->protectFor("user", HOME_ROUTE);
      
      $user = Session::get('user');
      
      if($this->checkPostKeys($_POST, ["rating", "comment"])) {

         $rt = $_POST["rating"];
         $cm = $_POST["comment"];

         $em = new EntityManager("ProductReview");
         
         $result = $em->findOne(["product_id"=>$product_id, "user_id" => $user->getId()], ["product_id"]);
      
         if(!$result) {

            $product_review = new ProductReview();

            $product_review
               ->setRating($rt)
               ->setComment($cm)
               ->setUser_id($user->getId())
               ->setProduct_id($product_id);
            
            $resp = $em->save($product_review);
               
            if($resp) {
               Http::redirect(PRODUCT_DESC_ROUTE . $product_id);
            }
            else {
               throw new \Exception(\ERROR_SAVING_BDD);
            }

         } else {
             $this->redirectWithError(PRODUCT_DESC_ROUTE . $product_id, "You have already post a review for this product" );
         }
      }   
      else {
         throw new \Exception(\ERROR_SAVING_BDD);
      }
     
  }




    public function listReviews(string $prdtId) {

        $offset = $_GET["offset"] ?? 0;

        $db = EntityManager::getDatabase();

        $query = $db->prepare(
            "SELECT comment, rating, date, lastname, firstname
             FROM product_review
             INNER JOIN user ON product_review.user_id = user.id
             WHERE product_id = :product_id
             ORDER BY date DESC
             LIMIT 5
             OFFSET :offset "
        );

        $query->execute(["product_id"=>$prdtId, "offset"=>$offset]);

        echo json_encode($query->fetchAll(\PDO::FETCH_ASSOC));

    }


  
}