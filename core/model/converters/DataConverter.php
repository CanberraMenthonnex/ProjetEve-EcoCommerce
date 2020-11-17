<?php

namespace Core\Model\Converters;

class DataConverter {

    private static $_converters = [
        "DateTime"=> [__NAMESPACE__."\TypeConverter", "convertToDate"],
    ];

    public static function convertToType($type, $value) {
        if(isset(self::$_converters[$type])) {
            $func = self::$_converters[$type];
            return \call_user_func($func, $value);
        } else {
            return $value;
        }
    }

}