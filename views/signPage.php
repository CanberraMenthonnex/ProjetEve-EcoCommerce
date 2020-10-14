<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New profil</title>
</head>
<body>
    <form action="<?=MAIN_PATH?>users/signin" method ="POST" >
        <label>Nom <input id="new_lastname" name="new_lastname" type="text"> </label><br>
        <label>Prénom <input id="new_firstname" name="new_firstname" type="text" > </label><br>
        <label>Adresse Mail <input id="new_email" name="new_email" type="text" > </label><br>
        <label>Mot de passe<input id="new_pwd" name="new_pwd" type="text"></label>
        <label>Confirmez votre mot de passe<input id="new_pwd_check" name="new_pwd_check" type="text"></label>
        <input name="new_send" type="submit" >
    </form>
    
</body>
</html>