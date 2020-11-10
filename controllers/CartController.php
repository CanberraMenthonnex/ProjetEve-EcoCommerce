<?php   


    // Verifiez si le panier existe et le creer le cas contraire
   function createCart(){
  

    if (!isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
        $_SESSION['cart']['Productid'] = array();
        $_SESSION['cart']['Price'] = array();
        $_SESSION['cart']['quantity'] = array();

        
     }
     return true;
}


function addProduct($Productid,$Price){

    if(createCart()){
        $Product = array_search($Productid, $_SESSION['cart']['Productid']);

        if($Product !== false){

            $_SESSION['cart']['quantity'][$Product] += $quantity;
        }
    }else{
        $array[] = 
    }






}