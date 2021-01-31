<?php

use Core\View\Template\Template;
use Core\Router\PathGenerator;

    ob_start();
?>
   

        <article id="sign" class="form_sign <?php if(isset($that_fuking_error)){echo "form_sign_error";}?>">
            <h1 class="text-center my-3">Inscrivez-Vous !</h1>
            <span id>
                            <?php
                                if(isset($that_fuking_error)){
                                echo "<p class='white'> ". $that_fuking_error ."</p>";
                                echo "<style> .form_sign{display: flex;} #log_sign{display: none;}</style>";
                                }
                            ?>
                        </span>
            <form action="<?=MAIN_PATH ?>/customer/sign" method ="POST">
                <div class="form_content flex--row justify--around">

                    <div class="form1 flex--column">
                        <label class="py-1 flex--column" for="firstname">Prénom <input class="semiRadius" id="firstname" name="firstname" type="text" autocomplete="off"  required></label>
                        <label class="py-1 flex--column" for="lastname">Nom <input class="semiRadius" id="lastname" name="lastname" type="text" autocomplete="off" required ></label>
                        <label class="py-1 flex--column" for="email">Adresse Mail <input class="semiRadius" id="email" name="email" type="text" autocomplete="off" required ></label>
                        <label class="py-1 flex--column" for="pwd">Mot de passe (doit contenir <br>1 chiffre et 1 caractère spécial)<input class="semiRadius" id="pwd" name="pwd" type="password" autocomplete="off"   required ></label>
                        <label class="py-1 flex--column" for="pwd_check">Confirmez votre mot de passe<input class="semiRadius" id="pwd_check" name="pwd_check" type="password" autocomplete="off"   required ></label>
                        <label class="py-1 flex--column" for="phone">Numero de téléphone<input class="semiRadius" id="phone" name="phone"  type="tel" autocomplete="off"  required ></label>
                    </div>

                    <div class="form1 flex--column">
                        <label class="py-1 flex--column" for="road_number">Numéro de rue<input class="semiRadius" type="text"  name="road_number" autocomplete="off"  required></label>
                        <label class="py-1 flex--column" for="road">Rue<input class="semiRadius" type="text"  name="road" autocomplete="off"  required></label>
                        <label class="py-1 flex--column" for="city">Ville<input class="semiRadius" type="text"  name="city" autocomplete="off"  required></label>
                        <label class="py-1 flex--column" for="zip_code">Code Postale<input class="semiRadius" type="text"  name="zip_code" autocomplete="off"  required></label>
                        <label class="py-1 flex--column" for="country">Pays<input class="semiRadius" type="text"  name="country" autocomplete="off"  required></label>
                        <label class="py-1 " class="input_date_naissance">Date de naissance:<br>
                            <label class="py-1 " for="Jour">Jour<input class="semiRadius" type="number"  min="1" max="31" placeholder="" name="day" autocomplete="off"  required></label>
                            <label class="py-1" for="month">Mois
                                <select class="semiRadius" name="month" id="month-select" size="0" autocomplete="off"  required>
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
                            <label class="py-1 " for="Année">Année<input class="semiRadius" type="number"  placeholder="2020" max="2020" min="1900" name="year" autocomplete="off"  required></label>
                        </label>
                    </div>
                    
                </div>
                <div class="flex--column align--center justify--center py-2">
                    <span id="span_cgu"><input type="checkbox" class="cgu_checkbox" autocomplete="off" required> J'ai lu et j'accepte les CGU</span>
                    <button class="my-1 semiRadius paddingCta" type="submit" class="send_profil" name="check_guc" value="yes" >Créer mon compte</button></label>
                    <a href="<?= PathGenerator::generatePath(CUSTOMER_POST_LOGIN_ROUTE) ?>" id="signToLog" class="allreadyCustomer white bold">J'ai déjà un compte</a>
                </div>
                
            </form>
        </article>
        <?php

$content = ob_get_clean();
$temp = new Template("Sign-customer-page", [], ["index"]);
$temp->transmitVarToContext(["userSession" => $userSession]);
$temp->render($content);
