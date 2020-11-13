<?php

namespace Core;

class Http {

    public static function redirect(string $url) {
        header("Location: " .$url);
        die;
    }

}