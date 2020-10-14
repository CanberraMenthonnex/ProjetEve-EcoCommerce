<?php
require("../vendor/autoload.php");
require ("../configuration/configuration.php");

require("../routes/router/Route.php");
require("../routes/router/DynamicRoute.php");
require("../routes/router/Router.php");

require("../configuration/dbconfiguration.php");
require("../constant/ERROR_Message.php");

session_start();

try {

    $router = new Router\Router($_GET["url"]);

    $router->get("back-office/product/form", function () {
        \Controller\ProductController::createProductPage();
    });
    $router->post("back-office/product/form", function () {
        \Controller\ProductController::createProduct();
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


