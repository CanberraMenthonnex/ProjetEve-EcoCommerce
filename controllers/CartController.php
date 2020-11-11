<?php   


    
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


