<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/creation-article.css">
    <title>Creation d'article</title>
</head>
    <body id="bodyPageCreationArticle">
    <img class="logoBackOffice" src="/img/logoBackOffice.png" alt="logoSite">
    <section id="pageProduct">
        
        <form id="formCreationArticle" action="/admin/product/form" method="POST">
            <div id="productInformation">
                <div id="divImgPrevu">
                    <input type="file" name="imgFile" id="imgFile" >
                    <div class="imagePrevu" id="imgPreview">
                        <img src="" alt="Prévualisation d'image" class="imagePrevuImage">
                        <span class="ImagePrevuDefault">Prévualisation d'image</span>
                    </div>
                </div>
                <div id="product">
                    <input type="text" name="name" id="name" placeholder="Nom du produit" autocomplete="off">
                    <input type="number" name="price" id="price" min="0" placeholder="Prix du produit" >
                    <input type="number" name="quantity" id="quantity" placeholder="Quantité du produit">
                </div>
            </div>
            <div id="CreaText">
                <label for="description">Description du produit:</label>
                <input id="gStyle" type="button" value="G" style="font-weight:bold;"/> 
		        <input id="iStyle" type="button" value="I" style="font-style:italic;"/> 
		        <input id="sStyle" type="button" value="S" style="text-decoration:underline;"/> 
                <input id="linkStyle" type="button" value="Lien"/>
                <br>
                <div id="editor" contentEditable></div>
                <input type="hidden" name="description" id="depot"> 
            </div>
            <input type="submit" name="create_product" id="create_product" value="AJOUTER LE PRODUIT" /><br />
        </form>
    </section>
    <script src="/js/creation-article.js"></script>
</body>

</html>