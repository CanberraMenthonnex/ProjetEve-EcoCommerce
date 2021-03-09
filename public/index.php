<?php

use Core\Model\Annotations\AnnotationPackage;
use Core\Router\PathGenerator;
use Core\Router\Router;
use Dotenv\Dotenv;

require("../core/vendor/autoload.php");

$dotenv = Dotenv::createImmutable( dirname( __DIR__ ));
$dotenv->load();

require ("../configuration/configuration.php");
require("../configuration/dbconfiguration.php");
require("../constant/ERROR_Message.php");
require ("../constant/routes.php");
require('../core/router/PathGenerator.php');

AnnotationPackage::init();

PathGenerator::defineBasePath(MAIN_PATH);
PathGenerator::defineImgPath('img');
PathGenerator::defineStylePath('style/css');
PathGenerator::defineJsPath("js/dist");


session_start();

try {
    $router = new Router($_GET["url"]);

    $router->get(HOME_ROUTE, \Controller\HomeController::class, "homePage");

    //PRODUCT ROUTES
    $router->get(SEARCH_ROUTE, \Controller\ProductController::class, "searchList");

    $router->get(PRODUCT_DESC_ROUTE . ":productId", \Controller\ProductController::class, "productDescription");

    $router->get(REVIEW_PRODUCT . ":prdtId", \Controller\ProductController::class, "listingReview");

    $router->post(REVIEW_PAGINATION . ":prdtId", \Controller\ProductController::class, "reviewPagination");

    //ADMIN ROUTES
    $router->get(ADMIN_LOG_ROUTE, \Controller\AdminController::class, "logAdminPage");

    $router->post(ADMIN_LOG_ROUTE, \Controller\AdminController::class, "login");

    $router->get(ADMIN_LOGOUT_ROUTE, \Controller\AdminController::class, "logout");

    $router->get(ADMIN_CREATE_PRODUCT_ROUTE, \Controller\AdminProductController::class, "createProductPage");

    $router->post(ADMIN_CREATE_PRODUCT_ROUTE, \Controller\AdminProductController::class, "createProduct");

    $router->get(ADMIN_GET_PRODUCT_ROUTE, \Controller\AdminProductController::class, "listingProduct");

    $router->get(ADMIN_DELETE_PRODUCT_ROUTE . ":id", \Controller\AdminProductController::class, "removeProduct");

    $router->get(ADMIN_ARTICLE_LIST, \Controller\AdminBlogController::class, 'articleList');

    $router->get(ADMIN_CREATE_ARTICLE, \Controller\AdminBlogController::class, "createArticlePage");

    $router->post(ADMIN_CREATE_ARTICLE, \Controller\AdminBlogController::class, "postArticle");

    $router->get(ADMIN_DELETE_ARTICLE . ":id", \Controller\AdminBlogController::class, "deleteArticle");

    //CUSTOMER ROUTES
    $router->post(CUSTOMER_POST_SIGN_ROUTE, \Controller\SignCustomerController::class, "sign");

    $router->get(CUSTOMER_POST_SIGN_ROUTE, \Controller\SignCustomerController::class, "signCustomerPage");

    $router->get(CUSTOMER_POST_LOGIN_ROUTE, \Controller\CustomerLoginController::class, "loginPage");

    $router->post(CUSTOMER_POST_LOGIN_ROUTE, \Controller\CustomerLoginController::class,"login");

    $router->get(CUSTOMER_LOGOUT_ROUTE, \Controller\CustomerLoginController::class,"logout");

    $router->get(CUSTOMER_PROFIL_ROUTE,\Controller\UserController::class,"displayCustomerProfil");

    $router->get(CUSTOMER_VERIFY_ROUTE, \Controller\SignCustomerController::class, "displayVerify");

    $router->post(CUSTOMER_VERIFY_ROUTE, \Controller\SignCustomerController::class, "verifyCustomer");

    $router->post(CUSTOMER_VERIFY_RESEND, \Controller\SignCustomerController::class, "resendCode" );

    $router->post(REVIEW_PRODUCT . "/:id", \Controller\ReviewController::class, "addReview");

    //CART ROUTES
    $router->get(ADD_CART_ROUTE, \Controller\CartController::class, "productPage");

    $router->post(ADD_CART_ROUTE . ":id", \Controller\CartController::class, "addCart");

    $router->get(GET_CART_ROUTE, \Controller\CartController::class, "listingCart");

    $router->get(DELETE_CART_PRODUCT_ROUTE . ":id", \Controller\CartController::class, "removeCartProduct");

    $router->post(UPDATE_CART_QUANTITY_ROUTE . ":id", \Controller\CartController::class, "updateCartQuantity");

    //BLOG ROUTES 

    $router->get(ARTICLE_ROUTE, \Controller\BlogController::class, "articleList");

    $router->get(ARTICLE_ROUTE . "/:id", \Controller\BlogController::class, "articlePage");



    $router->parse();

} catch (Exception $e) {
    echo "<strong>ERROR : </strong>";
    die($e->getMessage());
}


