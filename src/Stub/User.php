<?php

namespace Drupal\drupalstub\Stub;

use Drupal\drupalstub\Stub;

class User extends Stub {

  /**
   * Netjes voor autocomplete
   * @return User
   */
  public static function f() {
    return parent::f();
  }

  /**
   * @param type $nid
   * @param type $vid
   * @param type $reset
   * @return type
   */
  public function user_load($uid, $reset = FALSE) {
    return user_load($uid, $reset);
  }

}
