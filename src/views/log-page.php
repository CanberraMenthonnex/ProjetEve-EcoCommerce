<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="/style/log-in-style.css">
    </head>

    <body>
    <img class="logoBackOffice" src="/img/logoBackOffice.png">
    <div id="blocLog">
            <p id="pLog">Connect</p>
            
                <form action="/admin/login" method ="POST">
                    <div id="divInputLog">
                    <input type="text"  id="id" name="email" placeholder="Identifiant" autocomplete="off"> <br>
                    <input type="password" id="pwd" name="pwd" placeholder="Mot de passe" autocomplete="off"> <br>
                    </div>
                    <div id="divSubmit">
                    <input type="submit" name="send" value="Connexion" id="buttonLog">
                </div>
                </form>
        </div>
    </body>

</html>