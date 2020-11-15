<?php
namespace Core\Model\Annotations;
use mindplay\annotations\AnnotationCache;
use mindplay\annotations\Annotations;

class AnnotationPackage {

    public static function init () {
        Annotations::$config['cache'] = new AnnotationCache( __DIR__ . '/runtime');
        Annotations::getManager()->registry["index"] = "Core\\Model\\Annotations\\IndexAnnotation";
    }

}