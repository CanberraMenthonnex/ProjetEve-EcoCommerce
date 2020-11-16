<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/common.css">
    <link rel="stylesheet" href="/style/header.css" />
    <link rel="stylesheet" href="/style/customerSign.css">
    <title>New profil</title>
</head>
<body>
    <?php require_once "inc/header.php"?>
    <main>
   

    <article id="sign" class="form_sign">
        <h1>Inscrivez-Vous !</h1>
        <form action="/customer/sign" method ="POST">
            <div class="form_content">
                <div class="form1">
                    <label for="firstname">Prénom <input id="firstname" name="firstname" type="text" autocomplete="off" ></label>
                    <label for="lastname">Nom <input id="lastname" name="lastname" type="text" autocomplete="off" ></label>
                    <label for="email">Adresse Mail <input id="email" name="email" type="text"autocomplete="off" ></label>
                    <label for="pwd">Mot de passe<input id="pwd" name="pwd" type="text" autocomplete="off" ></label>
                    <label for="pwd_check">Confirmez votre mot de passe<input id="pwd_check" name="pwd_check" type="text" autocomplete="off" ></label>
                    <label for="phone">Numero de téléphone<input id="phone" name="phone" type="tel" ></label>
                </div>
                <div class="form1">
                    <label for="road_number">Numéro de rue<input type="text" autocomplete="off" name="road_number"></label>
                    <label for="road">Rue<input type="text" autocomplete="off" name="road"></label>
                    <label for="zip_code">Ville<input type="text" autocomplete="off" name="zip_code"></label>
                    <label for="city">Code Postale<input type="text" autocomplete="off" name="city"></label>
                    <label for="country">Pays<input type="text" autocomplete="off" name="country"></label>
                    <label class="input_date_naissance">Date de naissance:<br>
                        <label for="Jour">Jour<input type="number" autocomplete="off" min="1" max="31" placeholder="1" name="day"></label>
                        <label for="month">Mois
                            <select name="month" id="month-select" size="0">
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
                        <label for="Année">Année<input type="number" autocomplete="off" placeholder="2020" max="2020" min="1900" name="year"></label>
                    </label>
                </div>
                
            </div>
            <span id="span_cgu"><input type="checkbox" class="cgu_checkbox" > J'ai lu et j'accepte les CGU</span>
            <button type="submit" class="send_profil" name="check_guc" value="yes">Créer mon compte</button>
            <p id="signToLog" class="allreadyCustomer white bold">J'ai déjà un compte</p>
        </form>
    </article>

    <article id=log_sign>
        
        <form action="<?=MAIN_PATH?>users/login" method ="POST"  id="log">
            <div id="form_login" class="form2" >
                <h2 class="white bold">Connect</h2>
                <input class="bold PX20" id="username" placeholder="Identifiant" name="username" type="text" autocomplete="off">
                <input class="bold PX20" id="pwd" name="pwd" placeholder="Mot de passe" type="password" autocomplete="off">
                <button type="submit">Connexion</button>
                <p class="white PX17">Pas encore de compte ? </p>
                <p class="white bold PX20" id="logToSign">Rejoins-nous !</p>
            </div>
        </form>
    </article>


    <script src="/js/sign-customer-page.js"></script>
    </main>
</body>


</html>