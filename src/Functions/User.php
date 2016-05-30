<?php

namespace Drupal\drupalstub\Functions;

use Drupal\drupalstub\Functions;

class User extends Functions {

  public function user_load($uid, $reset = FALSE) {
    return user_load($uid, $reset);
  }

  public function user_save($account, $edit = array(), $category = 'account') {
    return user_save($account, $edit, $category);
  }

  public function user_login_finalize(&$edit = array()) {
    return user_login_finalize($edit);
  }

}
