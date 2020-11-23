<?php

use Core\Model\Annotations\AnnotationPackage;
use Core\Router\Router;

require("../core/vendor/autoload.php");
require ("../configuration/configuration.php");
require("../configuration/dbconfiguration.php");
require("../constant/ERROR_Message.php");
require ("../constant/routes.php");

AnnotationPackage::init();

session_start();

try {
    $router = new Router($_GET["url"]);

    $router->get(HOME_ROUTE, "HomeController", "homePage");

    //PRODUCT ROUTES
    $router->get(SEARCH_ROUTE, "ProductController", "searchList");

    $router->get(PRODUCT_DESC_ROUTE . ":productId", "ProductController", "productDescription");

    //ADMIN ROUTES
    $router->get(ADMIN_LOG_ROUTE, "AdminController", "logAdminPage");

    $router->post(ADMIN_LOG_ROUTE, "AdminController", "login");

    $router->get(ADMIN_LOGOUT_ROUTE, "AdminController", "logout");

    $router->get(ADMIN_CREATE_PRODUCT_ROUTE, "AdminProductController", "createProductPage");

    $router->post(ADMIN_CREATE_PRODUCT_ROUTE, "AdminProductController", "createProduct");

    $router->get(ADMIN_GET_PRODUCT_ROUTE, "AdminProductController", "listingProduct");

    $router->get(ADMIN_DELETE_PRODUCT_ROUTE . ":id", "AdminProductController", "removeProduct");

    //CUSTOMER ROUTES
    $router->post(CUSTOMER_POST_SIGN_ROUTE, "SignCustomerController", "sign");

    $router->get(CUSTOMER_POST_SIGN_ROUTE, "SignCustomerController", "signCustomerPage");

    $router->post(CUSTOMER_POST_LOGIN_ROUTE, "UserLoginController","login");

    $router->get(CUSTOMER_LOGOUT_ROUTE, "UserLoginController","logout");

    $router->get(CUSTOMER_PROFIL_ROUTE,"UserController","displayCustomerProfil");

    //CART ROUTES
    $router->get(ADD_CART_ROUTE, "CartController", "productPage");

    $router->post(ADD_CART_ROUTE . ":id", "CartController", "addCart");

    $router->get(GET_CART_ROUTE, "CartController", "listingCart");

    $router->get(DELETE_CART_PRODUCT_ROUTE . ":id", "CartController", "removeCartProduct");

    $router->post(UPDATE_CART_QUANTITY_ROUTE . ":id", "CartController", "updateCartQuantity");

    


    $router->parse();

} catch (Exception $e) {
    echo "<strong>ERROR : </strong>";
    die($e->getMessage());
}


