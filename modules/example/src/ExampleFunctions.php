<?php

namespace Drupal\stub_example;

use Drupal\drupalstub\Functions;

/**
 * Allow the API of this module to be used in a decoupled environment
 */
class ExampleFunctions extends Functions {

  public function add_a_numer_to_something_random($random, $add) {
    return \add_a_numer_to_something_random($random, $add);
  }

}
