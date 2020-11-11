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
    
    <article class="form_sign">
        <h1>Inscrivez-Vous !</h1>
        <form action="<?=MAIN_PATH?>users/signin" method ="POST">
            <div class="form_content">
                <div class="form1">
                    <label>Nom <input id="new_lastname" name="new_lastname" type="text" autocomplete="off"></label>
                    <label>Prénom <input id="new_firstname" name="new_firstname" type="text" autocomplete="off"></label>
                    <label>Adresse Mail <input id="new_email" name="new_email" type="text"autocomplete="off"></label>
                    <label>Mot de passe<input id="new_pwd" name="new_pwd" type="text" autocomplete="off"></label>
                    <label>Confirmez votre mot de passe<input id="new_pwd_check" name="new_pwd_check" type="text" autocomplete="off"></label>
                </div>
                <div class="form1">
                    <label for="Num_rue">Numéro de rue<input type="text" autocomplete="off"></label>
                    <label for="Rue">Rue<input type="text" autocomplete="off"></label>
                    <label for="Code_Postal">Ville<input type="text" autocomplete="off"></label>
                    <label for="Ville">Code Postale<input type="text" autocomplete="off"></label>
                    <label for="Pays">Pays<input type="text" autocomplete="off"></label>
                    <label class="input_date_naissance">Date de naissance:<br>
                        <label for="Jour">Jour<input type="text" autocomplete="off"></label>
                        <label for="Mois">Mois<input type="text" autocomplete="off"></label>
                        <label for="Année">Année<input type="text" autocomplete="off"></label>
                    </label>
                </div>
                
            </div>
            <label><strong>CGU:</strong><input type="checkbox" class="cgu_checkbox"></label>
            <button type="submit">And let's go</button>
        </form>
    </article>
