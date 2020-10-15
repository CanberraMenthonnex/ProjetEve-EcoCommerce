<?php

namespace Tools;

class Session {

    public static function set(string $name, array $data) {
        $_SESSION[$name] = $data;
    }

    public static function get(string $name)  {
        return $_SESSION[$name] ?? null;
    }

    public static function clean(string $name) {
        $_SESSION[$name] = null;
    }

    public static function checkSession(string $name){
        if(isset($_SESSION[$name])){
            return true;
        }else{
            return false;
        }
    }


}