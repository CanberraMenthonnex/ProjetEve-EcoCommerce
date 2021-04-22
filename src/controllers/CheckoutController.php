<?php 

    namespace Controller;
    use Core\Controller\Controller;

    class CheckoutController extends Controller{


        public function checkout(){

            $this->render("client-checkout");
        }




    }



?>