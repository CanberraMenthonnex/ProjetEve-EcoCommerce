<?php

    use Core\View\Template\Template;
    
?>

<h1>Détails de la commande</h1>

<div>
    <table>
        <?php
            $t = "test";
            
            echo $t;
        
        ?>
    </table>

</div>


<?php

$content = ob_get_clean();
$temp = new Template("Checkout", [], ["index"]);
$temp->transmitVarToContext(["userSession" => $userSession]);
$temp->render($content);