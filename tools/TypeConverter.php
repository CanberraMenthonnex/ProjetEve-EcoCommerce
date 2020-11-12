<?php

namespace Tools;

class TypeConverter {

    const DATE_FORMAT = "Y-m-j H:m:s";

    public static function stringifyDate ( \DateTime $date) {
        return $date->format(self::DATE_FORMAT);
    }

}