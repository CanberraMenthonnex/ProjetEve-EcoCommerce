<?php

use Core\Router\PathGenerator;
use Core\View\Template\Template;

    ob_start();
?>


    
        <table class="marginTop5 flex--row justify--center text-center py-1" style="width: 100%;">
            <tr class="bg--light-grey f-white ">
                <td class="arrayCell">Nom</td>
                <td class="arrayCell">Id</td>
                <td class="arrayCell">Date</td>
                <td class="arrayCell">Prix</td>
                <td class="arrayCell">Supprimer produit</td>
            </tr>
            <?php
                foreach ($productList as $product) {
            ?>
                <tr class="bg--medium-grey">
                    <td class="arrayCell marginX1"><?= $product->getName()?></td>
                    <td class="arrayCell marginX1"><?= $product->getId()?></td>
                    <td class="arrayCell marginX1"><?= $product->getCreatedAt()->format("d-m-Y")?></td>
                    <td class="arrayCell marginX1"><?= $product->getPrice()?> €</td>
                    <td class="arrayCell marginX1"><a href="<?= PathGenerator::generatePath( ADMIN_DELETE_PRODUCT_ROUTE . $product->getId() ); ?>" id="suppArticle">Supprimer produit</a></td>
                </tr>
            <?php
                }
            ?>
        </table>
    
    
</div>

<?php

$content = ob_get_clean();
$temp = new Template("Product-back", [], ["index"]);
$temp->setTemplateView("templateBackView");
$temp->transmitVarToContext(["admin" => $admin]);
$temp->render($content);