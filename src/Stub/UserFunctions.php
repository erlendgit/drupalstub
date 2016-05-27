<?php

namespace Drupal\drupalstub\Stub;

trait UserFunctions {

  /**
   *
   * @var User
   */
  protected $fUser;

  public function attachUser(User $stub = NULL) {
    if ($stub) {
      $this->fUser = $stub;
    } else {
      $this->fUser = User::f();
    }
  }

}
