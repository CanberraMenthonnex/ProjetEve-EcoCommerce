<?php

namespace Controller;

use Core\Model\EntityManager;

abstract class Controller {


    const VIEW_PATH = "../views/";

    /*
     * For displaying the view
     * @param $viewName : string
     * @param $var : array --> variable to pass in view context
     * */
    protected function render (string $viewName, array $var = []) {
        extract($var);
        require(self::VIEW_PATH . $viewName);
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
       
}