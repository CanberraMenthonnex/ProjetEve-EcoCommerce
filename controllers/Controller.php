<?php

namespace Controller;

abstract class Controller {

    const VIEW_PATH = "../views/";

    protected static function render (string $viewName) {
        require(self::VIEW_PATH . $viewName);
    }

}