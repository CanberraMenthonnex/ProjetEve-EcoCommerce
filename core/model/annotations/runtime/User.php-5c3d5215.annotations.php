<?php

return array(
  '#namespace' => 'Model\\Entity',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'Model\\Entity\\User' => 
  array (
  ),
),
  'Model\\Entity\\User::$id' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string'),
    array('#name' => 'index', '#type' => 'Core\\Model\\Annotations\\IndexAnnotation')
  ),
  'Model\\Entity\\User::$lastname' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::$firstname' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::$email' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::$password' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::$birth_date' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::$adress' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::$phone' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::getPassword' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'hashed')
  ),
  'Model\\Entity\\User::getId' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::getLastname' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::getFirstname' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::getEmail' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::getBirth_date' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::getAdress' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::getPhone' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\User::setId' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User::setLastname' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User::setFirstname' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User::setEmail' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User::setPassword' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User::setBirth_date' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User::setAdress' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'Model\\Entity\\User::setPhone' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
);

