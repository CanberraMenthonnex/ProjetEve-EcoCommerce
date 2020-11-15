<?php

namespace Core\Model\Annotations;

use mindplay\annotations\Annotation;

/**
 * Specifies  table index
 *
 * @usage('property'=>true, 'inherited'=>true)
 */
class IndexAnnotation extends Annotation {
 
    //....

    public $index = true;
}