<?php 
require("../vendor/autoload.php");
require("../configuration/configuration.php");
require("../constant/HTTP_Message.php");

// require("../controllers/user-controller.php");




try {

    $router = new Router\Router($_GET["url"]);

    $router->get("admin/login", function () {
        Controller\AdminController::logAdminPage();
    });

    $router->post("admin/login", function () {
        Controller\AdminController::login();
    });

    $router->get("users/signin", function () {
        // subPage();
    });

    $router->post("users/signin", function () {
        // signIn();
    });



    $router->parse();

} catch (Exception $e) {
    echo "<strong>ERROR : </strong>";
    die($e->getMessage());

}


