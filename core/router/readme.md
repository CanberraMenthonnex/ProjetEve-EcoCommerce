#Router

##configuration pour utiliser le router

**Afin de pouvoir charger le projet correctement sur une page web :**

-Initialiser le router dans le fichier public/index.php du projet
-Aller dans les paramètres de votre serveur
-Document Root : pointer sur le dossier public du projet

*Le fichier .htaccess s'occupe de la redirection vers le fichier index.php*

##UTILISATION : 

$router = new Router($_GET["url"]);

$router->get("/path", "ControllerName", "MethodeName");

$router->post("/path", "ControllerName", "MethodeName");

$router->update("/path", "ControllerName", "MethodeName");

$router->delete("/path", "ControllerName", "MethodeName");

//Récupérer des paramètres de l'url
$router->get("/path/:slug", "ControllerName", "methodName");

...Class Controller {
    
    ...
    
    public function methodName ($slug) {
        //... Afin d'utiliser le slug (le paramètre attendu venant de l'url)
    }
    
}