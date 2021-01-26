<?php

use Core\View\Template\Template;

    ob_start();
?>

<body>
    <h1 class="f-white text-center">Inventaire Produits</h1>
    <div class="flex--row justify--end justify-phone--center py-2">
        <span class="f-white">Recherche : </span>
        <input type="text" class="searchBack">
    </div>
    <div class="flex--column align--start f-white py-2" id="filters">
        <div class="bg--light-grey py-1 paddingX1">
            <h3 class="py-1">Trier par :</h3>
            <h5 class="py-1">Prix : <a href="#">Asc</a><span>/</span><a href="#">Desc</a></h5>
            <h5 class="py-1">Date : <a href="#">Asc</a><span>/</span><a href="#">Desc</a></h5>
            <h5 class="py-1">Ordre alphabétique : <a href="#">Asc</a><span>/</span><a href="#">Desc</a></h5>
        </div>

    </div>
    <table class="flex--row justify--center text-center py-1" cellspacing=12>
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
                <td class="arrayCell"><?= $product->getName()?></td>
                <td class="arrayCell"><?= $product->getId()?></td>
                <td class="arrayCell"><?= $product->getCreatedAt()->format("d-m-Y")?></td>
                <td class="arrayCell"><?= $product->getPrice()?> €</td>
                <td class="arrayCell"><a href="<?= ADMIN_DELETE_PRODUCT_ROUTE . $product->getId(); ?>" id="suppArticle">Supprimer produit</a></td>
            </tr>
        <?php
            }
        ?>
    </table>

    <?php

$content = ob_get_clean();
$temp = new Template("Product-back", [], ["index"]);
$temp->setTemplateView("templateBackView");
$temp->transmitVarToContext(["admin" => $admin]);
$temp->render($content);