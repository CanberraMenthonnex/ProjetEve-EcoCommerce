<?php

use Core\Router\PathGenerator;
use Core\View\Template\Template;

ob_start();
?>
<section class="editor">
    <form action="<?= PathGenerator::generatePath( isset($article) ? ADMIN_UPDATE_ARTICLE . $article->getId() : ADMIN_CREATE_ARTICLE) ?>" method="POST" id="editor-form" class="editor--header-data">
        <input type="hidden" name="content" id="article-content" value='<?= isset($article) ?  $article->getContent()  : "" ?>'/>
        <div class="flex--column align--center py-1">
            <label for="article-title" class="f-white py-4">Titre de l'article</label>
            <input name="title" placeholder="Titre de l'article" id="article-title" class="text-input" value="<?= isset($article) ? $article->getTitle() : "" ?>"/>
        </div>
        <div class="flex--column align--center py-1">
            <label for="article-desc" class="f-white py-4">Description de l'article</label>
            <textarea name="description" placeholder="Description de l'article" id="article-desc" class="textarea" rows="10" cols="50"><?= isset($article) ? $article->getDescription() : "" ?></textarea>
        </div>
        <div class="flex--column align--center py-1">
            <label for="article-category" class="f-white py-4">Catégorie de l'article</label>
            <select id="article-category" name="category" class="select">
                <?php foreach (BLOG_CATEGORIES as $key => $cat): ?>
                    <option value="<?= $key ?>"><?= $cat ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </form>
    <div id="editor" class="editor--content"></div>
    <div class="flex justify--center py-1">
        <button type="submit" class="cta" id="confirm-btn" form="editor-form">
            <?= isset($article) ? "Confirmer la modification" : "Confirmer la création"  ?>

        </button>
    </div>
    
</section>

<?php 
$content = ob_get_clean();
$temp = new Template('Créer un article de blog', ['editor'], ['index']);
$temp->transmitVarToContext(compact('admin'));
$temp->setTemplateView('templateBackView');
$temp->render($content);