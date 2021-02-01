<?php

use Core\View\Template\Template;
use Core\Router\PathGenerator;

    ob_start();
?>



<article id="log_sign" class=" <?php if(isset($that_fuking_error)){echo "form_log_error_sign";}?>">
            
            <form action="<?= MAIN_PATH ?>/customer/login" method ="POST"  id="log">
                <div class="flex--column justify--center align--center fixeMargin3" id="form_login" class="form2" >
                    <h2 class="white bold py-1">Connexion</h2>
                    <span class='error' >
                            <?php 
                                if(isset($log_error)){
                                echo "<p class='white'>". $log_error ."</p>";
                                }
                            ?>
                        </span>
                    <input class="bold px20 semiRadius" id="username" placeholder="Adresse Email" name="username" type="text" >
                    <input class="my-1 semiRadius" class="bold px20" id="pwd"  placeholder="Mot de passe" name="pwd" type="password" >
                    <button class="semiRadius paddingCta" type="submit">Connexion</button>
                    <p class="py-1" class="white px17">Pas encore de compte ? </p>
                    <a class="white bold px20 noDecoration" id="logToSign" href="<?= PathGenerator::generatePath(CUSTOMER_POST_SIGN_ROUTE) ?> ">Rejoins-nous !</a>
                </div>
            </form>
        </article> 





<?php

$content = ob_get_clean();
$temp = new Template("Sign-customer-page", [], ["index"]);
$temp->transmitVarToContext(["userSession" => $userSession]);
$temp->render($content);