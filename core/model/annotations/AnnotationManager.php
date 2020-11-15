<?php

namespace Core\Model\Annotations;

use mindplay\annotations\Annotations;

class AnnotationManager {

    public static function getMetaData (Object $object, string $propertyName, string $type, string $name)  {

        $a = Annotations::ofProperty($object, $propertyName, $type);
        return isset($a[0]) ? $a[0]->$name : null;
    }

}