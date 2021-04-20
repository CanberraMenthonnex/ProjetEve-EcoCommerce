<?php

return array(
  '#namespace' => 'Model\\Entity',
  '#uses' => array (
  'DateTime' => 'DateTime',
),
  '#traitMethodOverrides' => array (
  'Model\\Entity\\ProductReview' => 
  array (
  ),
),
  'Model\\Entity\\ProductReview::$id' => array(
    array('#name' => 'index', '#type' => 'Core\\Model\\Annotations\\IndexAnnotation')
  ),
  'Model\\Entity\\ProductReview::$comment' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\ProductReview::$user_id' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\ProductReview::$product_id' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\ProductReview::$rating' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'int')
  ),
  'Model\\Entity\\ProductReview::$date' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'Date')
  ),
  'Model\\Entity\\ProductReview::setRating' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'int', 'name' => 'rating')
  ),
);

