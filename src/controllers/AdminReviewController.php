<?php

namespace Controller;


class AdminReviewController extends Controller{

    public function reviewDelete() {
        $this->render('delete_review.php');
    }
    
}