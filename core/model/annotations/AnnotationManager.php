<?php

namespace Core\Model\Annotations;

use mindplay\annotations\Annotations;

class AnnotationManager {

    public static function getMetaData (Object $object, string $propertyName, string $type)  {

        $a = Annotations::ofProperty($object, $propertyName);
        return isset($a[0]) ? $a[0]->$type : null;
    }

}