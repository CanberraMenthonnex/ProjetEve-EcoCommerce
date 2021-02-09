<?php

use Core\HtmlGenerator;
use Core\View\Template\Template;

ob_start();

?>
<section class="py-4-phone">
        <header class="p-1">
            <p class="cta">
                <?= $article->getCategory() ?>
            </p>
            
        </header>
        <article class="flex--column align--center p-2">
            <h1 class="main-title"><?= $article->getTitle(); ?></h1>
            <div class="flex--column align--center px-2">
                <?php 
                
                $content = json_decode($article->getContent());
                $blocks = $content->blocks;
                HtmlGenerator::generate($blocks);
                ?>
            </div>
        </article>
</section>

<?php 
$content = ob_get_clean();
$temp = new Template('', [], ['index']);
$temp->transmitVarToContext(compact("userSession"))
     ->render($content);