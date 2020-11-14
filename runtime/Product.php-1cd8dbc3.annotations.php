<?php

return array(
  '#namespace' => 'Model\\Entity',
  '#uses' => array (
  'DateTime' => 'DateTime',
),
  '#traitMethodOverrides' => array (
  'Model\\Entity\\Product' => 
  array (
  ),
),
  'Model\\Entity\\Product::$name' => array(
    array('#name' => 'var', '#type' => 'mindplay\\annotations\\standard\\VarAnnotation', 'type' => 'Datetime')
  ),
  'Model\\Entity\\Product::getId' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\Product::setId' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'id'),
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'Product')
  ),
  'Model\\Entity\\Product::getName' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\Product::setName' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'name'),
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'Product')
  ),
  'Model\\Entity\\Product::getDescription' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\Product::setDescription' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'description'),
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'Product')
  ),
  'Model\\Entity\\Product::getPrice' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'float')
  ),
  'Model\\Entity\\Product::setPrice' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'float', 'name' => 'price'),
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'Product')
  ),
  'Model\\Entity\\Product::getCreatedAt' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'DateTime|\\DateTimeInterface|false|null')
  ),
  'Model\\Entity\\Product::setCreatedAt' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'DateTime|\\DateTimeInterface|false|null', 'name' => 'createdAt'),
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'Product')
  ),
  'Model\\Entity\\Product::getUpdatedAt' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'DateTime|\\DateTimeInterface|false|null')
  ),
  'Model\\Entity\\Product::setUpdatedAt' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'DateTime|\\DateTimeInterface|false|null', 'name' => 'updatedAt'),
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'Product')
  ),
);

