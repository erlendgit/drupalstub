<?php

namespace Drupal\drupalstub;

use Exception;

final class Stub {

  private static $instance;
  private $collection;
  private $map;

  private function __construct() {
    $this->collection = [];
    $this->map = [];
  }

  public static function f() {
    if (self::$instance === NULL) {
      self::$instance = new Stub();
    }
    return self::$instance;
  }

  public function attach($stub) {
    $class = get_class($stub);
    if ($stub instanceof Functions) {
      $this->collection[$class] = $stub;
      $this->map = [];
      return $this;
    }
    throw new Exception("{$class} does not extend Drupal\drupalstub\Function");
  }

  public function __call($method_name, $params) {
    $location = $this->locateMethod($method_name);
    return call_user_func_array([$this->collection[$location], $method_name], $params);
  }
  
  public function isCached($method_name) {
    return array_key_exists($method_name, $this->map);
  }

  private function locateMethod($method_name) {
    if (!$this->isCached($method_name)) {
      foreach ($this->collection as $class => $obj) {
        if (method_exists($obj, $method_name)) {
          $this->map[$method_name] = $class;
          return $class;
        }
      }
      throw new Exception("Method '{$method_name}' not implemented");
    }
    return $this->map[$method_name];
  }

}
