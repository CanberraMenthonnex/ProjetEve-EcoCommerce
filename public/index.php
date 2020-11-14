<?php

use Core\Model\Annotations\AnnotationPackage;
use Core\Router\Router;

require("../vendor/autoload.php");
require ("../configuration/configuration.php");
require("../configuration/dbconfiguration.php");
require("../constant/ERROR_Message.php");
require ("../constant/routes.php");

AnnotationPackage::init();

session_start();

try {
    $router = new Router($_GET["url"]);

    $router->get(HOME_ROUTE, "HomeController", "homePage");

    $router->get(ADMIN_LOG_ROUTE, "AdminLoginController", "logAdminPage");

    $router->post(ADMIN_LOG_ROUTE, "AdminLoginController", "login");

    $router->get(ADMIN_LOGOUT_ROUTE, "AdminLoginController", "logout");

    $router->get(ADMIN_CREATE_PRODUCT_ROUTE, "ProductController", "createProductPage");

    $router->post(ADMIN_CREATE_PRODUCT_ROUTE, "ProductController", "createProduct");

     $router->get(ADMIN_GET_PRODUCT_ROUTE, "ProductController", "listingProduct");

     $router->get(ADMIN_DELETE_PRODUCT_ROUTE . ":id", "ProductController", "removeProduct");

     //TEST
    $router->get("/test", "TestController", "test");

    $router->parse();

} catch (Exception $e) {
    echo "<strong>ERROR : </strong>";
    die($e->getMessage());
}


