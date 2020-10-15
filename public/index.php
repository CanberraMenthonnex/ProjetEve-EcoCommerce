<?php
require("../vendor/autoload.php");
require ("../configuration/configuration.php");

require("../routes/router/Route.php");
require("../routes/router/DynamicRoute.php");
require("../routes/router/Router.php");
require("../controllers/product-controller.php");

require("../configuration/dbconfiguration.php");
require("../constant/ERROR_Message.php");

<<<<<<< HEAD
//require("../controllers/user-controller.php");





=======
session_start();
>>>>>>> 1dcfd0a1e0bc49f7a2c8d782c3835835610abd4a

try {

    $router = new Router\Router($_GET["url"]);

    $router->get("back-office/product/form", function () {
        \Controller\ProductController::createProductPage();
    });
    $router->post("back-office/product/form", function () {
        \Controller\ProductController::createProduct();
    });

<<<<<<< HEAD
    $router->get("back-office/product/stock", function() {
        listingProduct();
    });

    $router->get("users/login", function () {
        // logPage();
    });
=======
>>>>>>> 1dcfd0a1e0bc49f7a2c8d782c3835835610abd4a

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


