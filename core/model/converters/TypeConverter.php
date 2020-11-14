<?php

namespace Core\Model\Converters;

class TypeConverter {

    const DATE_FORMAT = "Y-m-j H:m:s";

    public static function stringifyDate ( \DateTime $date) {
        return $date->format(self::DATE_FORMAT);
    }

    public static function convertToDate(string $date) {
        return new \DateTime($date);
    }

}