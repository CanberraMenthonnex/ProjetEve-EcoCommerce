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


session_start();


try {
    $router = new Router($_GET["url"]);

    $router->get(HOME_ROUTE, "HomeController", "homePage");

    //PRODUCT ROUTES
    $router->get(SEARCH_ROUTE, "ProductController", "searchList");

    $router->get(PRODUCT_DESC_ROUTE . ":productId", "ProductController", "productDescription");

    $router->get(REVIEW_PRODUCT . ":prdtId", "ProductController", "listingReview");

    $router->post(REVIEW_PAGINATION . ":prdtId", "ProductController", "reviewPagination");

    //ADMIN ROUTES
    $router->get(ADMIN_LOG_ROUTE, "AdminController", "logAdminPage");

    $router->post(ADMIN_LOG_ROUTE, "AdminController", "login");

    $router->get(ADMIN_LOGOUT_ROUTE, "AdminController", "logout");

    $router->get(ADMIN_CREATE_PRODUCT_ROUTE, "AdminProductController", "createProductPage");

    $router->post(ADMIN_CREATE_PRODUCT_ROUTE, "AdminProductController", "createProduct");

    $router->get(ADMIN_GET_PRODUCT_ROUTE, "AdminProductController", "listingProduct");

    $router->get(ADMIN_DELETE_PRODUCT_ROUTE . ":id", "AdminProductController", "removeProduct");

    $router->get(ADMIN_ARTICLE_LIST, 'AdminBlogController', 'articleList');

    $router->get(ADMIN_CREATE_ARTICLE, "AdminBlogController", "createArticlePage");

    $router->post(ADMIN_CREATE_ARTICLE, "AdminBlogController", "postArticle");

    $router->get(ADMIN_DELETE_ARTICLE . ":id", "AdminBlogController", "deleteArticle");

    //CUSTOMER ROUTES
    $router->post(CUSTOMER_POST_SIGN_ROUTE, "SignCustomerController", "sign");

    $router->get(CUSTOMER_POST_SIGN_ROUTE, "SignCustomerController", "signCustomerPage");

    $router->get(CUSTOMER_POST_LOGIN_ROUTE, "CustomerLoginController", "loginPage");

    $router->post(CUSTOMER_POST_LOGIN_ROUTE, "CustomerLoginController","login");

    $router->get(CUSTOMER_LOGOUT_ROUTE, "CustomerLoginController","logout");

    $router->get(CUSTOMER_PROFIL_ROUTE,"UserController","displayCustomerProfil");

    $router->get(CUSTOMER_VERIFY_ROUTE, "SignCustomerController", "displayVerify");

    $router->post(CUSTOMER_VERIFY_ROUTE, "SignCustomerController", "verifyCustomer");

    $router->post(CUSTOMER_VERIFY_RESEND, "SignCustomerController", "resendCode" );

    $router->post(REVIEW_PRODUCT . "/:id", "ReviewController", "addReview");

    //CART ROUTES
    $router->get(ADD_CART_ROUTE, "CartController", "productPage");

    $router->post(ADD_CART_ROUTE . ":id", "CartController", "addCart");

    $router->get(GET_CART_ROUTE, "CartController", "listingCart");

    $router->get(DELETE_CART_PRODUCT_ROUTE . ":id", "CartController", "removeCartProduct");

    $router->post(UPDATE_CART_QUANTITY_ROUTE . ":id", "CartController", "updateCartQuantity");

    //BLOG ROUTES 

    $router->get(ARTICLE_ROUTE, "BlogController", "articleList");

    $router->get(ARTICLE_ROUTE . "/:id", "BlogController", "articlePage");



    $router->parse();

} catch (Exception $e) {
    echo "<strong>ERROR : </strong>";
    die($e->getMessage());
}


