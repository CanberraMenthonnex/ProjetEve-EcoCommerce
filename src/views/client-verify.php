<?php

use Core\Router\PathGenerator;
use Core\View\Template\Template;

ob_start()

?>

<h1 id="verify-title">Validez votre compte</h1>

<div class="pending-div p-1" id="code-div">

    <h2>Entrez le code reçu par mail</h2>

    <form action="<?= PathGenerator::generatePath(CUSTOMER_VERIFY_ROUTE) ?>" method ="POST" class="pending-div--form">
        <label for="email">Votre E-mail : </label><input type="email" name="email" id="email"  class="text-input my-2">
        <br><br>
        <label for="code">Code de vérification : </label> <input type="text" name="code" id="code"  class="text-input my-2">
        <br><br>
        <input type="submit" name="verify">
        <br><br>
    </form>

    <p id="code-p" class="pending-div--p">Vous n'avez pas reçu le code ?</p> 
        
</div>

<div class="pending-div p-2" id="send-div">

    <h2>Renvoyer le code</h2>

    <form method="POST" class="pending-div--form">
        <input type="email" placeholder="Votre email" name="email-resend" id="email-resend" class="text-input">
        <br><br>
        <input type="submit" name="resend" id="resend" value="Renvoyer" class="text-input">
    </form>

    <p id="send-p" class="pending-div--p">Entrez le code ici</p> 

</div>


<?php 
$content = ob_get_clean();
$temp = new Template("Vérifiez votre compte", ["verify"], ['index']);
$temp->transmitVarToContext(compact("userSession"));
$temp->render($content);
?>