<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/creation-article.css">
    <title>Creation d'article</title>
</head>
<body id="bodyPageCreationArticle">
    <header>
        <a href=""><div id="divLogoPageBack">
            <img id="logoImgPageBack" src="/img/logo.png" alt="logo du site">
        </div></a>
    </header>
    <section id="pageProduit">


        
        <form id="formCreationArticle" action="/admin/product/form" method="POST">
                <h1>Création de l'article</h1>
            <div id="product">
                <input type="text" name="name" id="name" placeholder="Nom du produit" >
                <input type="text" name="product_reference" id="product_reference" placeholder="Référence du produit">
                <input type="number" name="price" id="price" min="0" placeholder="Prix du produit" >
            </div>
            <div id="divImgPrevu">
                <label for="imgFile">Image du produit:</label>
                <input type="file" name="imgFile" id="imgFile" >
                <div class="imagePrevu" id="imgPreview">
                    <img src="" alt="Prévualisation d'image" class="imagePrevuImage">
                    <span class="ImagePrevuDefault">Prévualisation d'image</span>
                </div>
                
            </div>
            <div id="CreaText">
                <label for="description">Description du produit:</label>
                <input id="gStyle" type="button" value="G" style="font-weight:bold;"/> 
		        <input id="iStyle" type="button" value="I" style="font-style:italic;"/> 
		        <input id="sStyle" type="button" value="S" style="text-decoration:underline;"/> 
		        <input id="lienStyle" type="button" value="Lien"/>
		        <textarea id="editeur" contentEditable name="description"></textarea>
		        
            </div>
            
            <input type="submit" name="create_product" id="create_product" value="Créer l'article" /><br />
        </form>
    </section>
    <script src="/js/main.js"></script>
</body>
</html>