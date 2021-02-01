<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/user-verify.css">
        <title>Vérifiez votre compte</title>
    </head>

    <body>
        <h1>Validez votre compte</h1>
        <div class="pending-div" id="code-div">
            <h2>Entrez le code reçu par mail</h2>
            <form action="<?=MAIN_PATH ?>/customer/verify" method ="POST" class="pending-form">
                <label for="email">Votre E-mail : </label><input type="email" name="email" id="email">
                <br><br>
                <label for="code">Code de vérification : </label> <input type="text" name="code" id="code">
                <br><br>
                <input type="submit" name="verify">
                <br><br>
            </form>
            <p id="code-p" class="pending-p">Vous n'avez pas reçu le code ?</p> 
        </div>

        <div class="pending-div" id="send-div">
            <h2>Renvoyer le code</h2>
            <form method="POST">
                <input type="email" placeholder="Votre email" name="email-resend" id="email-resend">
                <br><br>
                <input type="submit" name="resend" id="resend" value="Renvoyer">
            </form>
            <p id="send-p" class="pending-p">Entrez le code ici</p> 
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>const MAIN_PATH = <?= json_encode(MAIN_PATH) ?></script>
        <script src="<?= MAIN_PATH ?>/js/ajax-verify.js"></script>

    </body>

</html>
