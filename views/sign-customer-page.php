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
    <main>
    <?php require_once "inc/header.php"?>

    <article id="sign" class="form_sign">
        <h1>Inscrivez-Vous !</h1>
        <form action="<?=MAIN_PATH?>users/signin" method ="POST">
            <div class="form_content">
                <div class="form1">
                    <label for="new_firstname">Prénom <input id="new_firstname" name="new_firstname" type="text" autocomplete="off" required></label>
                    <label for="new_lastname">Nom <input id="new_lastname" name="new_lastname" type="text" autocomplete="off" required></label>
                    <label for="new_email">Adresse Mail <input id="new_email" name="new_email" type="text"autocomplete="off" required></label>
                    <label for="new_pwd">Mot de passe<input id="new_pwd" name="new_pwd" type="text" autocomplete="off" required></label>
                    <label for="new_pwd_check">Confirmez votre mot de passe<input id="new_pwd_check" name="new_pwd_check" type="text" autocomplete="off" required></label>
                    <label for="new_tel">Numero de téléphone<input id="new_tel" name="new_tel" type="tel" required></label>
                </div>
                <div class="form1">
                    <label for="Num_rue">Numéro de rue<input type="text" autocomplete="off"></label>
                    <label for="Rue">Rue<input type="text" autocomplete="off"></label>
                    <label for="Code_Postal">Ville<input type="text" autocomplete="off"></label>
                    <label for="Ville">Code Postale<input type="text" autocomplete="off"></label>
                    <label for="Pays">Pays<input type="text" autocomplete="off"></label>
                    <label class="input_date_naissance">Date de naissance:<br>
                        <label for="Jour">Jour<input type="number" autocomplete="off" min="1" max="31" placeholder="1"></label>
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
                        <label for="Année">Année<input type="number" autocomplete="off" placeholder="2020" max="2020" min="1900"></label>
                    </label>
                </div>
                
            </div>
            <label>CGU:<input type="checkbox" class="cgu_checkbox" required></label>
            <button type="submit" class="send_profil">S'inscrire</button>
            <p id="signToLog" class="allreadyCustomer">Déja membre</p>
        </form>
    </article>

    <article id="log">
        <h1>Connect</h1>
        <form action="<?=MAIN_PATH?>users/login" method ="POST">
            <div id="form_login" class="form_content form2" >
                <input id="username" name="username" type="text" autocomplete="off">
                <input id="pwd" name="pwd" type="password" autocomplete="off">
                <button type="submit">Connexion</button>
                <p>Pas encore de compte ? </p>
                <p id="logToSign">Rejoins-nous !</p>
            </div>
        </form>
    </article>


    <script src="/js/sign-customer-page.js"></script>
    </main>
</body>
