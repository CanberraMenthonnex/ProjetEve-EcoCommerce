<?php

use Core\View\Template\Template;
use Core\Router\PathGenerator;

ob_start();
?>
    
    <section class="p-1">
        <header class="py-1 py-3-phone">
            <h1 class="main-title py-1">Notre Blog</h1>
            <nav class="py-1">
                <a href="#" class="cta">Catégorie 1</a>
                <a href="#" class="cta">Catégorie 1</a>
                <a href="#" class="cta">Catégorie 1</a>
                <a href="#" class="cta">Catégorie 1</a>
            </nav>
        </header>
        <div class="article-wrapper">
            <?php 
                foreach($articles as $article) :
            ?>
            
            <article class="article-card">
                    <h3 class="article-card--title"> 
                        <?= $article->getTitle(); ?>
                    </h3>
                    <p class="article-card--desc">
                        <?= $article->getDescription(); ?>
                    </p>
                    <a href="<?= PathGenerator::generatePath(ARTICLE_ROUTE . "/" . $article->getId()) ?>" class="cta">Lire plus</a>
            </article>

            <?php endforeach; ?>
        </div>
    </section>
<?php 
$content = ob_get_clean();
$temp = new Template("Blog", [], ['index']);
$temp->transmitVarToContext(compact("userSession"))
     ->render($content);
