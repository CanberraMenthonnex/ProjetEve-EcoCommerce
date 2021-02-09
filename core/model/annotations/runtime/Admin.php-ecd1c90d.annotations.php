<?php

return array(
  '#namespace' => 'Model\\Entity',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'Model\\Entity\\Admin' => 
  array (
  ),
),
  'Model\\Entity\\Admin::$id' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\Admin::$lastname' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\Admin::$firstname' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\Admin::$mail' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\Admin::$password' => array(
    array('#name' => 'type', '#type' => 'mindplay\\annotations\\standard\\TypeAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\Admin::setId' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'id')
  ),
  'Model\\Entity\\Admin::setLastname' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'lastname')
  ),
  'Model\\Entity\\Admin::setFirstname' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'firstname')
  ),
  'Model\\Entity\\Admin::setMail' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'mail')
  ),
  'Model\\Entity\\Admin::setPassword' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'password')
  ),
  'Model\\Entity\\Admin::getId' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\Admin::getLastname' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\Admin::getFirstname' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
  'Model\\Entity\\Admin::getMail' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
);

