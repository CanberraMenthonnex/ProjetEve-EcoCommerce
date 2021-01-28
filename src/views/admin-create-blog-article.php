<?php

use Core\View\Template\Template;

ob_start()
?>
<section>
    <div id="editor"></div>
</section>

<?php 
$content = ob_get_clean();
$temp = new Template('Créer un article de blog', ['editor-min'], ['index']);
$temp->transmitVarToContext(compact('admin'));
$temp->setTemplateView('templateBackView');
$temp->render($content);