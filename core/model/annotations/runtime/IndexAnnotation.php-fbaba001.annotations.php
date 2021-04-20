<?php

return array(
  '#namespace' => 'Core\\Model\\Annotations',
  '#uses' => array (
  'Annotation' => 'mindplay\\annotations\\Annotation',
),
  '#traitMethodOverrides' => array (
  'Core\\Model\\Annotations\\IndexAnnotation' => 
  array (
  ),
),
  'Core\\Model\\Annotations\\IndexAnnotation' => array(
    array('#name' => 'usage', '#type' => 'mindplay\\annotations\\UsageAnnotation', 'property'=>true, 'inherited'=>true)
  ),
);

