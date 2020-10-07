<?php 
require ("../configuration/configuration.php");
require("../routes/router/Route.php");
require("../routes/router/DynamicRoute.php");
require("../routes/router/Router.php");

require("../controllers/user-controller.php");



try {

    $router = new Router\Router($_GET["url"]);

    $router->get("users/login", function () {
        // logPage();
    });

    $router->post("users/login", function () {
        // login();
    });

    $router->get("users/signin", function () {
        // subPage();
    });

    $router->post("users/signin", function () {
        // signIn();
    });



    $router->parse();

} catch (Exception $e) {
    echo "<strong>ERROR : </strong>";
    die($e->getMessage());

}


