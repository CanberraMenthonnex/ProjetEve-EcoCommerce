<?php

namespace Core;

class Http {

    public static function redirect(string $url) {
        header("Location: " . MAIN_PATH . $url);
        die;
    }

}