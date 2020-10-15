<?php
require("../vendor/autoload.php");
require ("../configuration/configuration.php");
require("../configuration/dbconfiguration.php");
require("../constant/ERROR_Message.php");
require ("../constant/routes.php");


session_start();

try {
    $router = new Router\Router($_GET["url"]);

    $router->get("", function () {
        \Controller\HomeController::homePage();
    });

    $router->get(ADMIN_LOG_ROUTE, function () {
        Controller\AdminController::logAdminPage();
    });

    $router->post(ADMIN_LOG_ROUTE, function () {
        Controller\AdminController::login();
    });

    $router->get(ADMIN_CREATE_PRODUCT_ROUTE, function () {
        \Controller\ProductController::createProductPage();
    });
    $router->post(ADMIN_CREATE_PRODUCT_ROUTE, function () {
        \Controller\ProductController::createProduct();
    });

    $router->get(ADMIN_GET_PRODUCT_ROUTE, function() {
        \Controller\ProductController::listingProduct();
    });

    $router->parse();

} catch (Exception $e) {
    echo "<strong>ERROR : </strong>";
    die($e->getMessage());
}


