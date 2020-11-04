<?php

namespace Tools;

class Http {

    public static function redirect(string $url) {
        header("Location: /" .$url);
        die;
    }

}