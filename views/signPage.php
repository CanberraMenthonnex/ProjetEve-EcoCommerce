<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New profil</title>
</head>
<body>
    <form action="<?=MAIN_PATH?>users/signin" method ="POST" >
        <label>Identifiant <input id="new_id" name="new_id" type="text" > </label><br>
        <label>Mot de passe<input id="new_pwd" name="new_pwd" type="text"></label>
        <input name="new_send" type="submit" >
    </form>
    
</body>
</html>