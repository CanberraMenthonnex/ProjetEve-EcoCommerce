<?php

use Core\View\Template\Template;

    ob_start();
?>

    <div class="flex--column align--center ">
        <div class="bg--light-grey text-center py-2 paddingX2 semiRadius">
            <p class="f-white fixeMargin3 mainTitle">Connect</p>
            
                <form action="<?=MAIN_PATH . ADMIN_LOG_ROUTE?>" method ="POST">
                    <div id="divInputLog">
                    <input class="semiRadius py-1 paddingX3" type="text"  id="id" name="email" placeholder="Identifiant" autocomplete="off"> <br>
                    <input class="my-3 semiRadius py-1 paddingX3" type="password" id="pwd" name="pwd" placeholder="Mot de passe" autocomplete="off"> <br>
                    </div>
                    <div id="divSubmit">
                    <input class="fixeMargin3 semiRadius py-1 paddingX3" type="submit" name="send" value="Connexion" id="buttonLog">
                </div>
                </form>
        </div>
            
        </div>
        <?php

$content = ob_get_clean();
$temp = new Template("Log-page", [], ["index"]);
$temp->transmitVarToContext(["userSession" => $userSession]);
$temp->render($content);