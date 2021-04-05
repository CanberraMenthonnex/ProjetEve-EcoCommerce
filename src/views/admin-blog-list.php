<?php

use Core\Router\PathGenerator;
use Core\View\Template\Template;

ob_start();
?>
<div class=" flex--column align--center">
    <h1 class="f-white text-center">Liste des articles</h1>
    <a href="<?= PathGenerator::generatePath(ADMIN_CREATE_ARTICLE) ?>" class="cta my-1">
        Créer un article
    </a>
    <!-- <div class="flex--row justify--end justify-phone--center py-2">
        <span class="f-white">Recherche : </span>
        <input type="text" class="searchBack">
    </div> -->
    <!-- <div class="flex--column align--start f-white py-2" id="filters">
        <div class="bg--light-grey py-1 paddingX1">
            <h3 class="py-1">Trier par :</h3>
            <h5 class="py-1">Prix : <a href="#">Asc</a><span>/</span><a href="#">Desc</a></h5>
            <h5 class="py-1">Date : <a href="#">Asc</a><span>/</span><a href="#">Desc</a></h5>
            <h5 class="py-1">Ordre alphabétique : <a href="#">Asc</a><span>/</span><a href="#">Desc</a></h5>
        </div>

    </div> -->
    <table class="flex--row justify--center text-center py-1" cellspacing=12>
        <tr class="bg--light-grey f-white ">
            <td class="arrayCell">Titre</td>
            <td class="arrayCell">categorie</td>
            <td class="arrayCell">Créé le</td>
            <td class="arrayCell">Id auteur</td>
        </tr>
        <?php
            foreach ($articles as $article) {
        ?>
            <tr class="bg--medium-grey">
                <td class="arrayCell"><?= $article->getTitle()?></td>
                <td class="arrayCell"><?= $article->getCategory()?></td>
                <td class="arrayCell"><?= $article->getCreatedAt()->format("d-m-Y")?></td>
                <td class="arrayCell"><?= $article->getAuthor()?></td>
                <td class="arrayCell">
                    <a href="<?= PathGenerator::generatePath(ADMIN_ARTICLE_LIST . "/" . $article->getId()) ?>">Editer</a>
                </td>
                <td class="arrayCell"><a href="<?= PathGenerator::generatePath( ADMIN_DELETE_ARTICLE ) . $article->getId(); ?>" id="suppArticle">Supprimer</a></td>
            </tr>
        <?php
            }
        ?>
    </table>
</div>
<?php
$content = ob_get_clean();
$temp = new Template("Liste des articles du blog", [], ['index']);
$temp->setTemplateView('templateBackView')
     ->transmitVarToContext(compact("admin"))
     ->render($content);