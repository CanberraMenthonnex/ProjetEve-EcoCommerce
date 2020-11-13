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

 //  $price = ('SELECT price FROM product WHERE user_id = 2 ');



   $query = $db->prepare("INSERT INTO cartdetail (user_id, product_id, quantity) VALUES (:User, :PrdtId, :Quantity)");

   $query->execute($prdt);
 
}


/*  $query2 = $db->prepare("SELECT ROUND((price * quantity), 2) AS total FROM cartdetail INNER JOIN product ON cartdetail.product_id = product.product_id WHERE user_id = :user_id ");

   $query2->execute(
      ["user_id" => $user]
   );

   echo '<pre>';
   
   var_dump($query2->fetchAll());
*/




/*
$query = ("INSERT INTO cartdetail (product_id, user_id, quantity) VALUES ( ".$_GET["id"].", ".$_GET["user"]." )"); 

var_dump($query);


*/



// SELECT ROUND((price * quantity), 2) AS total FROM cartdetail INNER JOIN product ON cartdetail.product_id = product.product_id WHERE user_id = 2



/*SELECT user_id, cartdetail.product_id, quantity, ROUND((price * quantity), 2) AS total
FROM cartdetail
INNER JOIN product ON cartdetail.product_id = product.product_id
ORDER BY user_id
*/




/*
    
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
        array_push ($_SESSION['cart']['Productid'],$Productid);
        array_push ($_SESSION['cart']['Price'],$Price);
        array_push ($_SESSION['cart']['quantity'],$quantity);
    }

} 

function deleteProduct($Productid){
    
    if (createCart())
    {
       
       $tmp=array();
       $tmp['Productid'] = array();
       $tmp['Price'] = array();
       $tmp['quantity'] = array();
       
 
       for($i = 0; $i < count($_SESSION['cart']['Productid']); $i++)
       {
          if ($_SESSION['cart']['Productid'][$i] !== $productid)
          {
             array_push( $tmp['Productid'],$_SESSION['cart']['Productid'][$i]);
             array_push( $tmp['Price'],$_SESSION['cart']['Price'][$i]);
             array_push( $tmp['quantity'],$_SESSION['cart']['quantity'][$i]);
          }
 
       }
       
       $_SESSION['cart'] =  $tmp;
       
       unset($tmp);
    }

    function modifyQuantity($Productid,$quantity){
        
        if (createCart())
        {
           
           if ($quantity > 0)
           {
              
              $Product = array_search($Productid, $_SESSION['cart']['Productid']);
     
              if ($Product !== false)
              {
                 $_SESSION['cart']['quantity'][$Product] = $quantity ;
              }
           }else{
           
           deleteArticle($Productid);
        }


    }


}
}

*/