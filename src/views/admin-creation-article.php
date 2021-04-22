<?php

use Core\Router\PathGenerator;
use Core\View\Template\Template;

    ob_start();
?>

<?php
    $isUpdate = isset($product);
?>

    <section class="flex--column align--center justify--center flex-fill"  id="pageProduct">
        <div class="product-form">
            <form id="formCreationArticle" action="<?=  PathGenerator::generatePath($isUpdate ? ADMIN_UPDATE_PRODUCT_ROUTE . $product->getId() : ADMIN_CREATE_PRODUCT_ROUTE); ?>" method="POST" enctype="multipart/form-data">
                <div class="flex--row justify--between my-2" id="productInformation">
                    <file-reader name="product-miniature" baseclass="file-reader-input" defaultValue="<?= $isUpdate ? PathGenerator::generatePath(PRODUCT_UPLOAD_IMG_BASE_URL . $product->getImageUrl()) : "" ?>">Upload</file-reader>
                    <div class="flex--column col5 mx-1" id="product">
                        <input class="my-2 py-2 flex-fill--width text-input" type="text" name="name" id="name" placeholder="Nom du produit" autocomplete="off" value="<?= $isUpdate ? $product->getName() : "" ?>">
                        <input class="my-2 py-2 flex-fill--width  text-input" type="number" name="price" id="price" min="0" placeholder="Prix du produit" value="<?= $isUpdate ? $product->getPrice() : "" ?>">
                        <input class="my-2 py-2 flex-fill--width  text-input" min="0" type="number" name="quantity" id="quantity" placeholder="Quantité du produit" >


                    </div>
                </div>
                <select class="select my-1" name="category" >
                    <?php foreach (PRODUCT_CATEGORIES as $k => $cat) : ?>

                        <option <?= $isUpdate && $k === $product->getCategory()  ? "selected" : "" ?> value="<?= $k ?>"> <?= $cat ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="CreaText" class="py-2">
                  <!--  <label class="" for="description">Description du produit:</label>
                    <input id="gStyle" type="button" value="G" style="font-weight:bold;"/> 
                    <input id="iStyle" type="button" value="I" style="font-style:italic;"/> 
                    <input id="sStyle" type="button" value="S" style="text-decoration:underline;"/> 
                    <input id="linkStyle" type="button" value="Lien"/>
                    <br>-->
                    <textarea name="description"  class="bg--white my-2 textarea" id="editor" rows="10" ><?= $isUpdate ? $product->getDescription() : "" ?></textarea>
<!--                    <input type="hidden" name="description" id="depot">-->
                </div>
                <div class="flex justify--center align--center ">
                    <input class="bg--flash-green py-1 lightRadius text-center p-1" type="submit" name="create_product" id="create_product" value="<?= $isUpdate ? "Modifier le produit" : "Ajouter le produit" ?>" /><br />
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