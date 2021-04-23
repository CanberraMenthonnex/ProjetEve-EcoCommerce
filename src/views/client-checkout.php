<?php

use Controller\CartController;
use Core\View\Template\Template;

ob_start()

?>

<div class="checkout-content">
    <h1>Détails de la commande</h1>

    <div>
        
            <table class="checkout-table">
                <thead>
                    <tr>
                        <th colspan="2">Nom du produit</th>
                        <th colspan="2">Quantité</th>
                        <th colspan="2">Prix total</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach($cartList as $product){
                ?>
                
                    <tr>
                        <td colspan="2"><?= $product["name"] ?></td>
                        <td colspan="2"><?= $product["quantity"] ?></td>
                        <td colspan="2"><?= $product["price"] ?></td>
                    </tr>
                    
                
                <?php
                    }
                ?>
                
                </tbody>
                
                <tfoot>
                    <tr>
                        <td colspan="2" class="line-cell"></td>
                        <td colspan="2" class="line-cell"></td>
                        <td colspan="2" class="line-cell"></td>
                    </tr>    

                    <tr>
                        <td colspan="2"><strong>Total à payer :</strong></td>
                        <td colspan="2" class="last-row"> <?= $totalProduct ?> </td>
                        <td colspan="2" class="last-row"> <?= $totalPrice  . " €"?> </td>        
                    </tr>
                </tfoot>
            </table>


            

    </div>
</div>

<?php






$content = ob_get_clean();
$temp = new Template("Checkout", [], ["index"]);
$temp->transmitVarToContext(["userSession" => $userSession]);
$temp->render($content);