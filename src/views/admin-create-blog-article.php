<?php

use Core\Router\PathGenerator;
use Core\View\Template\Template;

ob_start()
?>
<section>
    <form action="<?= PathGenerator::generatePath(ADMIN_CREATE_ARTICLE) ?>" method="POST" id="editor-form">
        <input type="hidden" name="content" id="article-content" />
        <div>
            <label for="article-title" class="f-white">Titre de l'article</label>
            <input name="title" placeholder="Titre de l'article" id="article-title" />
        </div>
        <div>
            <label for="article-desc" class="f-white">Description de l'article</label>
            <textarea name="description" placeholder="Description de l'article" id="article-desc"></textarea>
        </div>
        <div>
            <label for="article-category" class="f-white">Catégorie de l'article</label>
            <select id="article-category" name="category">
                <option value="categorie_1">Catégorie 1</option>
            </select>
        </div>
    </form>
    <div id="editor"></div>
    <button type="submit" class="cta" id="confirm-btn" form="editor-form">Confirmer la création</button>
</section>

<?php 
$content = ob_get_clean();
$temp = new Template('Créer un article de blog', ['editor-min'], ['index']);
$temp->transmitVarToContext(compact('admin'));
$temp->setTemplateView('templateBackView');
$temp->render($content);