<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="<?=MAIN_PATH?>users/login" method ="POST" >
        <label>Identifiant <input id="id" name="id" type="text" > </label><br>
        <label>Mot de passe<input id="pwd" name="pwd" type="text"></label>
        <input name="send" type="submit" >
    </form>
    
</body>
</html>