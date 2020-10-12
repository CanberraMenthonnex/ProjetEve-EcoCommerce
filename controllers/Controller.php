<?php

namespace Controller;

abstract class Controller {

    const VIEW_PATH = "../views/";

    protected static function render (string $viewName) {
        require(self::VIEW_PATH . $viewName);
    }

    protected static function checkPostKeys(array $post, array $requiredKeys) : bool {
        //creer une fonction pour vérifer que tout les posts ont bien été envoyé Lulu la fripouille 
    }
       
}