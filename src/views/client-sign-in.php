<?php

use Core\View\Template\Template;
use Core\Router\PathGenerator;

    ob_start();
?>

    <?php
        require "inc/alert.php";
    ?>
   

        <article id="sign" class="form_sign <?php if(isset($that_fuking_error)){echo "form_sign_error";}?>">
            <h1 class="text-center my-3 lightGrey">Inscrivez-Vous !</h1>
            <span id>
                            <?php
                                if(isset($that_fuking_error)){
                                echo "<p class='white'> ". $that_fuking_error ."</p>";
                                echo "<style> .form_sign{display: flex;} #log_sign{display: none;}</style>";
                                }
                            ?>
                        </span>
            <form action="<?=MAIN_PATH ?>/customer/sign" method ="POST">
                <div class="form_content flex--row justify--around width70 marginAuto">

                    <div class="form1 flex--column">
                        <label class="py-2 flex--column" for="firstname">
                            Prénom
                            <input class="marginTop1 text-input semiRadius" id="firstname" name="firstname" type="text" autocomplete="off" value="<?= $signData["firstname"] ?? "" ?>" required>
                        </label>
                        <label class="py-2 flex--column" for="lastname">
                            Nom
                            <input class="marginTop1 text-input semiRadius" id="lastname" name="lastname" type="text" autocomplete="off" value="<?= $signData["lastname"] ?? "" ?>" required >
                        </label>
                        <label class="py-2 flex--column" for="email">
                            Adresse Mail
                            <input class="marginTop1 text-input semiRadius" id="email" name="email" type="text" autocomplete="off" value="<?= $signData["email"] ?? "" ?>" required >
                        </label>
                        <label class="py-2 flex--column" for="pwd">
                            Mot de passe (doit contenir
                            <br>
                            1 chiffre et 1 caractère spécial)
                            <input class="marginTop1 text-input semiRadius" id="pwd" name="pwd" type="password" autocomplete="off" value="<?= $signData["pwd"] ?? "" ?>"  required >
                        </label>
                        <label class="py-2 flex--column" for="pwd_check">
                            Confirmez votre mot de passe
                            <input class="marginTop1 text-input semiRadius" id="pwd_check" name="pwd_check" type="password" autocomplete="off" value="<?= $signData["pwd_check"] ?? "" ?>"  required >
                        </label>
                        <label class="py-2 flex--column" for="phone">
                            Numero de téléphone
                            <input class="marginTop1 text-input semiRadius" id="phone" name="phone"  type="tel" autocomplete="off" value="<?= $signData["phone"] ?? "" ?>" required >
                        </label>
                    </div>

                    <div class="form1 flex--column">
                        <label class="py-2 flex--column" for="road_number">
                            Numéro de rue
                            <input class="marginTop1 text-input semiRadius" type="text"  name="road_number" autocomplete="off" value="<?= $signData["road_number"] ?? "" ?>"  required>
                        </label>
                        <label class="py-2 flex--column" for="road">
                            Rue
                            <input class="marginTop1 text-input semiRadius" type="text"  name="road" autocomplete="off" value="<?= $signData["road"] ?? "" ?>" required>
                        </label>
                        <label class="py-2 flex--column" for="city">
                            Ville
                            <input class="marginTop1 text-input semiRadius" type="text"  name="city" autocomplete="off" value="<?= $signData["city"] ?? "" ?>"  required>
                        </label>
                        <label class="py-2 flex--column" for="zip_code">
                            Code Postale
                            <input class="marginTop1 text-input semiRadius" type="text"  name="zip_code" autocomplete="off" value="<?= $signData["zip_code"] ?? "" ?>" required>
                        </label>
                        <label class="py-2 flex--column" for="country">
                            Pays
                            <input class="marginTop1 text-input semiRadius" type="text"  name="country" autocomplete="off" value="<?= $signData["country"] ?? "" ?>"  required>
                        </label>
                        <label class="py-2" class="input_date_naissance">
                        Date de naissance:<br><br>
                            <label class="py-1 " for="Jour">
                                <span>Jour</span>
                                <input class="paddingFix1 semiRadius" type="number"  min="1" max="31" placeholder="" name="day" autocomplete="off" value="<?= $signData["day"] ?? "" ?>"  required>
                            </label>
                            <label class="py-1" for="month">Mois
                                <select class="paddingFix1 semiRadius" name="month" id="month-select" size="0" autocomplete="off" value="<?= $signData["month"] ?? "" ?>" required>
                                    <option value="01">Janvier</option>
                                    <option value="02">Février</option>
                                    <option value="03">Mars</option>
                                    <option value="04">Avril</option>
                                    <option value="05">Mai</option>
                                    <option value="06">Juin</option>
                                    <option value="07">Juillet</option>
                                    <option value="08">Août</option>
                                    <option value="09">Septembre</option>
                                    <option value="10">Octobre</option>
                                    <option value="11">Novembre</option>
                                    <option value="12">Decembre</option>
                                </select>
                            </label>
                            <label class="py-2 " for="Année">
                                Année
                                <input class="paddingFix1  semiRadius" type="number"  placeholder="2020" max="2020" min="1900" name="year" autocomplete="off" value="<?= $signData["year"] ?? "" ?>" required>
                            </label>
                        </label>
                    </div>
                    
                </div>
                <div class="flex--column align--center justify--center py-2">
                    <span id="span_cgu">
                        <input type="checkbox" class="cgu_checkbox" autocomplete="off" required />
                        J'ai lu et j'accepte les CGU
                    </span>
                    <button class="my-1 paddingFix1 semiRadius " type="submit" class="send_profil" name="check_guc" value="yes" >Créer mon compte</button></label>
                    <a href="<?= PathGenerator::generatePath(CUSTOMER_POST_LOGIN_ROUTE) ?>" id="signToLog" class="allreadyCustomer white bold noDecoration">J'ai déjà un compte</a>
                </div>
                
            </form>
        </article>
        <?php

$content = ob_get_clean();
$temp = new Template("Sign-customer-page", [], ["index"]);
$temp->transmitVarToContext(["userSession" => $userSession]);
$temp->render($content);
