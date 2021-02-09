<?php

return array(
  '#namespace' => 'Model\\Entity',
  '#uses' => array (
  'DateTime' => 'DateTime',
),
  '#traitMethodOverrides' => array (
  'Model\\Entity\\User_pending' => 
  array (
  ),
),
  'Model\\Entity\\User_pending::$id' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string'),
    array('#name' => 'index', '#type' => 'Core\\Model\\Annotations\\IndexAnnotation')
  ),
  'Model\\Entity\\User_pending::$lastname' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User_pending::$firstname' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User_pending::$email' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User_pending::$password' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User_pending::$birth_date' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'DateTime')
  ),
  'Model\\Entity\\User_pending::$adress' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User_pending::$phone' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User_pending::$code' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'int')
  ),
  'Model\\Entity\\User_pending::getPassword' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'hashed')
  ),
  'Model\\Entity\\User_pending::getId' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User_pending::getLastname' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User_pending::getFirstname' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User_pending::getEmail' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User_pending::getBirth_date' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User_pending::getAdress' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User_pending::getPhone' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User_pending::getCode' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'int')
  ),
  'Model\\Entity\\User_pending::setId' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User_pending::setLastname' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User_pending::setFirstname' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User_pending::setEmail' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User_pending::setPassword' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User_pending::setBirth_date' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User_pending::setAdress' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User_pending::setPhone' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User_pending::setCode' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
);

