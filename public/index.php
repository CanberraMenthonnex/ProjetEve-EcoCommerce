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


    $router->get(CUSTOMER_POST_SIGN_ROUTE, function(){
        \Controller\SignCustomerPage::signCustomerPage();
    });

    $router->post(CUSTOMER_POST_SIGN_ROUTE, function(){
        \Controller\SignCustomerPage::sign();
    });

    $router->post(CUSTOMER_POST_LOGIN_ROUTE, function(){
        \Controller\UserLoginController::login();
    });

    $router->get(CUSTOMER_LOGOUT_ROUTE, function () {
        \Controller\UserLoginController::logout();
    });

    $router->get(CUSTOMER_PROFIL_ROUTE, function () {
        \Controller\UserController::displayCustomerProfil();
    });

    $router->get(ADMIN_DELETE_PRODUCT_ROUTE . ":id", function($id) {
        \Controller\ProductController::removeProduct($id);
    });

    $router->parse();

} catch (Exception $e) {
    echo "<strong>ERROR : </strong>";
    die($e->getMessage());
}


