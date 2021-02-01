<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProductBack</title>
    <link rel="stylesheet" href="/style/display-article.css">
    <script src="https://kit.fontawesome.com/97b40379bf.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <img class="logoBackOffice" src="/img/logoBackOffice.png">
    <h1 class="titleProductBack">Liste des commentaires</h1>
    <table>
    <?php

    foreach($req as $comment){
        ?>

         <tr class="tableBody">
            <td><?= $comment['product_id'] ?></td>
            <td><?= $comment['comment'] ?></td>
            <td><?= $comment['date'] ?></td>
            <td> <a href="<?= ADMIN_DELETE_REVIEW_ROUTE . $comment['id'] ?> "> Supprimer</a></td>
         </tr>

        <?php
    }

    ?>
    </table>
</body>
</html>