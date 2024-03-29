<?php

namespace Core\Controller;

use Core\Http;
use Core\Session;

abstract class Controller {


    const VIEW_PATH = __DIR__."/../../src/views/";

    /*
     * For displaying the view
     * @param $viewName : string
     * @param $var : array --> variable to pass in view context
     * */
    protected function render (string $viewName, array $var = []) {
        extract($var);
        $userSession = Session::get('user') ?? "";
        $errorMessage = Session::flash("errorMessage");
        $defaultMessage = Session::flash("defaultMessage");
        require( self::VIEW_PATH . $viewName . ".php");
    }

    /*
     * @param $post : array
     * @param $requiredKeys : array
     *
     * return boolean
     * */
    protected function checkPostKeys(array $post, array $requiredKeys) : bool {
        $postKeys = array_keys($post);
        $diff = array_diff($requiredKeys, $postKeys);
        return  count($diff) === 0;
    }

    /**
     * For protecting some methods of controller 
     * 
     * @param string $role 
     * @param string $redirection
     */
    protected function protectFor(string $role, string $redirection) {
        if(!Session::get($role)) {
            Http::redirect($redirection);
            die();
        }
    }

    /**
     * @param string $path
     * @param string $defaultMessage
     */
    protected function redirect(string $path, string $defaultMessage = "") {
        Session::set('defaultMessage', $defaultMessage);
        Http::redirect($path);
    }

    /**
     * @param string $path
     * @param string $errorMessage
     */
    protected function redirectWithError(string $path, string $errorMessage = "") {
        Session::set('errorMessage', $errorMessage);
        Http::redirect($path);
    }

       
}