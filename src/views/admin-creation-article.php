<?php

use Core\Router\PathGenerator;
use Core\View\Template\Template;

    ob_start();
?>

    <section class="flex--column align--center justify--center flex-fill"  id="pageProduct">
        <div class="product-form">
            <form id="formCreationArticle" action="<?= PathGenerator::generatePath("/admin/product/form"); ?>" method="POST">
                <div class="flex--row justify--between" id="productInformation">
                    <file-reader name="product-miniature" baseclass="file-reader-input">Upload</file-reader>
                    <div class="flex--column col5" id="product">
                        <input class="my-2 py-2 flex-fill--width text-input" type="text" name="name" id="name" placeholder="Nom du produit" autocomplete="off">
                        <input class="my-2 py-2 flex-fill--width  text-input" type="number" name="price" id="price" min="0" placeholder="Prix du produit" >
                        <input class="my-2 py-2 flex-fill--width  text-input" type="number" name="quantity" id="quantity" placeholder="Quantité du produit">
                    </div>
                </div>
                <div id="CreaText" class="py-2">
                    <label class="" for="description">Description du produit:</label>
                    <input id="gStyle" type="button" value="G" style="font-weight:bold;"/> 
                    <input id="iStyle" type="button" value="I" style="font-style:italic;"/> 
                    <input id="sStyle" type="button" value="S" style="text-decoration:underline;"/> 
                    <input id="linkStyle" type="button" value="Lien"/>
                    <br>
                    <textarea class="bg--white my-2 textarea" id="editor" rows="10" ></textarea>
                    <input type="hidden" name="description" id="depot">
                </div>
                <div class="flex justify--center align--center">
                    <input class="bg--flash-green py-1 lightRadius text-center" type="submit" name="create_product" id="create_product" value="AJOUTER LE PRODUIT" /><br />
                </div>

            </form>
        </div>
        
    </section>
<?php

$content = ob_get_clean();
$temp = new Template("Creation-article", ["creation-article"], ["index"]);
$temp->setTemplateView("templateBackView");
$temp->transmitVarToContext(["admin" => $admin]);
$temp->render($content);