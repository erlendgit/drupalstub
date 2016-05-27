<?php

namespace Drupal\drupalstub;
use Exception;

class Stub {

  // array of one per subclass stubs
  protected static $fObjects;

  // prevent unauthorized loading
  final private function __construct() {
    
  }

  // je mist het als je het niet hebt...
  protected function stubInit() {
    
  }

  public static function f() {
    $class = static::class;
    if (empty(static::$fObjects[$class])) {
      $interface = new $class();
      if ($interface instanceof Stub) {
        $interface->stubInit();
        static::$fObjects[$class] = $interface;
      } else {
        throw new Exception("Stub init failed");
      }
    }
    return static::$fObjects[$class];
  }

}
