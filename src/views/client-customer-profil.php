<?php

use Core\View\Template\Template;
use Core\Router\PathGenerator;

    ob_start();
?>      
        <section class="flex--row justify--center" id="sommaire" style="margin-top: 8vh;">
            <div class="flex justify--center align--center" style="width: 40%;" id="avatar">
                <img style="width: 100%; margin-left: 17vw" src="<?= MAIN_PATH ?>/img/Avatar.png" alt="Votre avatar">
            </div>
            <div class="flex--column align--around justify--around paddingX1" style="width: 250px;" id="eltProfil">
                <div class="flex--row justify--between align--between">
                    <p class="f-white"><?= $userSession->getLastName() ?></p>
                    <p class="f-white"><?= $userSession->getFirstName() ?></p>
                </div>
                <div class="flex--row justify--between align--between">
                    <a href="" class="noDecoration">Panier</a>
                    <a href="" class="flex noDecoration text-center">Historique <br> d'achats</a>
                </div>
            </div>
        </section>
        
        <section class="flex justify--center"">
            <div class="flex--row justify--between align--center f-white marginX1" style="width: 80%;">
                <span>Vos cartes de crédit et de débit</span>
                <span>Date d'expiration</span>
                <span class="creditCard">Ajouter une carte de crédit</span>
            </div>
            <div class="flex--row justify--between align--center f-white bg--dark-grey semiRadius paddingX1  marginX1" style="width: 80%;">
                <span>Visa / Electron **** - 4561</span>
                <span style="margin-right: 5vw">01 / 2023</span>
                <span class="creditCard">Supprimer</span>
            </div>
            <div class="flex--row justify--between align--center f-white bg--dark-grey semiRadius paddingX1 marginX1" style="width: 80%;">
                <span>Visa / Electron **** - 4561</span>
                <span style="margin-right: 5vw">01 / 2023</span>
                <span class="creditCard">Supprimer</span>
            </div>
            <div class="flex--row justify--between align--center f-white bg--dark-grey semiRadius paddingX1 marginX1" style="width: 80%;">
                <span>Visa / Electron **** - 4561</span>
                <span style="margin-right: 5vw">01 / 2023</span>
                <span class="creditCard">Supprimer</span>
            </div>
        </section>

        <div class="flex justify--center marginX1" id="sendBtn">
            <a class="noDecoration my-1 paddingCta creditCard" href="<?= PathGenerator::generatePath(CUSTOMER_LOGOUT_ROUTE)  ?>">Se déconnecter</a>
        </div>
        
        <?php

$content = ob_get_clean();
$temp = new Template("Sign-customer-page", [], ["index"]);
$temp->transmitVarToContext(["userSession" => $userSession]);
$temp->render($content);