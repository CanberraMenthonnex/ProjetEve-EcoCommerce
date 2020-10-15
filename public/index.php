<?php
require("../vendor/autoload.php");
require ("../configuration/configuration.php");

require("../routes/router/Route.php");
require("../routes/router/DynamicRoute.php");
require("../routes/router/Router.php");
require("../controllers/product-controller.php");

require("../configuration/dbconfiguration.php");
require("../constant/ERROR_Message.php");

//require("../controllers/user-controller.php");





session_start();

try {

    $router = new Router\Router($_GET["url"]);

    $router->get("back-office/product/form", function () {
        \Controller\ProductController::createProductPage();
    });
    $router->post("back-office/product/form", function () {
        \Controller\ProductController::createProduct();
    });

    $router->get("back-office/product/stock", function() {
        listingProduct();
    });

    $router->get("users/login", function () {
        // logPage();
    });

    $router->get("admin/login", function () {
        Controller\AdminController::logAdminPage();
    });

    $router->post("admin/login", function () {
        Controller\AdminController::login();
    });


    $router->parse();

} catch (Exception $e) {
    echo "<strong>ERROR : </strong>";
    die($e->getMessage());
}


