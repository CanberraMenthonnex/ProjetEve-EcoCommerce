<?php

namespace Core;

class Session {

    public static function set(string $name, $data) {
        $_SESSION[$name] = $data;
    }

    public static function get(string $name)  {
        return $_SESSION[$name] ?? null;
    }

    public static function clean(string $name) {
        $_SESSION[$name] = null;
    }

    public static function checkSession(string $name){
        return(isset($_SESSION[$name]));
    }

    public static function flash(string $name) {
        $data = self::get($name);
        self::clean($name);
        return $data;

    }
}