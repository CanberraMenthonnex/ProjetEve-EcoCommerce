<?php
require("../vendor/autoload.php");
require ("../configuration/configuration.php");
require("../configuration/dbconfiguration.php");
require("../constant/ERROR_Message.php");
require ("../constant/routes.php");


session_start();

try {
    $router = new Router\Router($_GET["url"]);
    
    $router->get(HOME_ROUTE, function () {
        \Controller\HomeController::homePage();
    });

    $router->get(ADMIN_LOG_ROUTE, function () {
        \Controller\AdminLoginController::logAdminPage();
    });

    $router->post(ADMIN_LOG_ROUTE, function () {
        \Controller\AdminLoginController::login();
    });

    $router->get(ADMIN_LOGOUT_ROUTE, function () {
        \Controller\AdminLoginController::logout();
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


    $router->get(CUSTOMER_GET_SIGN_ROUTE, function(){
        \Controller\SignCustomerPage::signCustomerPage();
    });

    $router->post(CUSTOMER_GET_SIGN_ROUTE, function(){
        \Controller\SignCustomerPage::sign();
    });


    $router->get(ADMIN_DELETE_PRODUCT_ROUTE . ":id", function($id) {
        \Controller\ProductController::removeProduct($id);
    });

    $router->parse();

} catch (Exception $e) {
    echo "<strong>ERROR : </strong>";
    die($e->getMessage());
}


