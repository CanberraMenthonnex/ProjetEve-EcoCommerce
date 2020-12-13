<?php

namespace Controller;

use Core\Controller\Controller;
use Core\Model\EntityManager;
use Core\Session;
use Core\Http;

class AdminReviewController extends Controller{

    const SESSION_NAME = "admin";

    public function __construct()
    {
        $this->protectFor(self::SESSION_NAME, HOME_ROUTE);
    }

    public function reviewDelete() {
        $this->render('delete_review');
    }

    public  function listingReview() {

        $db = EntityManager::getDatabase();

        $request = $db->query("SELECT * FROM product_review ORDER BY date DESC");
        $req = $request->fetchAll(\PDO::FETCH_ASSOC);
        
        $this->render('delete_review', compact("req"));
    }

    public  function removeReview (string $id) {

        $db = EntityManager::getDatabase();

        $request = $db->prepare("DELETE FROM product_review WHERE id = {$id}");

        $request->execute();

        
        if($request) {
            Http::redirect(ADMIN_GET_REVIEW_ROUTE);
        }
        else throw new \Exception(ERROR_DELETE_BDD);
    }

}