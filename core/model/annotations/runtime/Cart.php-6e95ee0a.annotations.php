<?php

return array(
  '#namespace' => 'Model\\Entity',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'Model\\Entity\\Cart' => 
  array (
  ),
),
  'Model\\Entity\\Cart::$quantity' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'int')
  ),
  'Model\\Entity\\Cart::$user_id' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\Cart::$product_id' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\Cart::setQuantity' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'int', 'name' => 'quantity')
  ),
);

