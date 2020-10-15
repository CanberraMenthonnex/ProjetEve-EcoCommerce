<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="style/log-in-style.css">
    </head>

    <body>
        <div id="blocLog">
            <p id="pLog">Log in</p>
            <div id="divInputLog">
                <form action="/admin/login" method ="POST">
                    <input type="text"  id="id" name="email" placeholder="Username"> <br>
                    <input type="text" id="pwd" name="pwd" placeholder="Password"> <br>
                    <input type="submit" name="send" value="CONNEXION" id="buttonLog">
                </form>
            </div>
            
        </div>
    </body>

</html>