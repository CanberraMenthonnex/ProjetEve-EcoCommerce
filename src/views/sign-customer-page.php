<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/common.css">
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/header.css" />
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/customerSign.css">
    <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/footer.css">
    <title>New profil</title>
</head>
<body>
    <?php require_once "inc/header.php"?>
    <main>
   

        <article id="sign" class="form_sign <?php if(isset($that_fuking_error)){echo "form_sign_error";}?>">
            <h1>Inscrivez-Vous !</h1>
            <span id>
                            <?php
                                if(isset($that_fuking_error)){
                                echo "<p class='white'> ". $that_fuking_error ."</p>";
                                echo "<style> .form_sign{display: flex;} #log_sign{display: none;}</style>";
                                }
                            ?>
                        </span>
            <form action="<?=MAIN_PATH ?>/customer/sign" method ="POST">
                <div class="form_content">
                    <div class="form1">

                        

                        <label for="firstname">Prénom <input id="firstname" name="firstname" type="text" autocomplete="off"  required></label>
                        <label for="lastname">Nom <input id="lastname" name="lastname" type="text" autocomplete="off" required ></label>
                        <label for="email">Adresse Mail <input id="email" name="email" type="text" autocomplete="off" required ></label>
                        <label for="pwd">Mot de passe (doit contenir <br>1 chiffre et 1 caractère spécial)<input id="pwd" name="pwd" type="password" autocomplete="off"   required ></label>
                        <label for="pwd_check">Confirmez votre mot de passe<input id="pwd_check" name="pwd_check" type="password" autocomplete="off"   required ></label>
                        <label for="phone">Numero de téléphone<input id="phone" name="phone"  type="tel" autocomplete="off"  required ></label>
                    </div>
                    <div class="form1">
                        <label for="road_number">Numéro de rue<input type="text"  name="road_number" autocomplete="off"  required></label>
                        <label for="road">Rue<input type="text"  name="road" autocomplete="off"  required></label>
                        <label for="city">Ville<input type="text"  name="city" autocomplete="off"  required></label>
                        <label for="zip_code">Code Postale<input type="text"  name="zip_code" autocomplete="off"  required></label>
                        <label for="country">Pays<input type="text"  name="country" autocomplete="off"  required></label>
                        <label class="input_date_naissance">Date de naissance:<br>
                            <label for="Jour">Jour<input type="number"  min="1" max="31" placeholder="" name="day" autocomplete="off"  required></label>
                            <label for="month">Mois
                                <select name="month" id="month-select" size="0" autocomplete="off"  required>
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
                            <label for="Année">Année<input type="number"  placeholder="2020" max="2020" min="1900" name="year" autocomplete="off"  required></label>
                        </label>
                    </div>
                    
                </div>
                <span id="span_cgu"><input type="checkbox" class="cgu_checkbox" autocomplete="off" required> J'ai lu et j'accepte les CGU</span>
                <button type="submit" class="send_profil" name="check_guc" value="yes" >Créer mon compte</button></label>
                <p id="signToLog" class="allreadyCustomer white bold">J'ai déjà un compte</p>
            </form>
        </article>

        <article id="log_sign" class=" <?php if(isset($that_fuking_error)){echo "form_log_error_sign";}?>">
            
            <form action="<?= MAIN_PATH ?>/customer/login" method ="POST"  id="log">
                <div id="form_login" class="form2" >
                    <h2 class="white bold">Connexion</h2>
                    <span class='error' >
                            <?php 
                                if(isset($log_error)){
                                echo "<p class='white'>". $log_error ."</p>";
                                }
                            ?>
                        </span>
                    <input class="bold px20" id="username" placeholder="Adresse Email" name="username" type="text" >
                    <input class="bold px20" id="pwd"  placeholder="Mot de passe" name="pwd" type="password" >
                    <button type="submit">Connexion</button>
                    <p class="white px17">Pas encore de compte ? </p>
                    <p class="white bold px20" id="logToSign">Rejoins-nous !</p>
                </div>
            </form>
        </article> 
    </main>
    <?php require("inc/footer.php") ?>
    <script src="<?= MAIN_PATH ?>/js/sign-customer-page.js"></script>
</body>

</html>
