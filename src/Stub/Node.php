<?php

namespace Drupal\drupalstub\Stub;

use Drupal\drupalstub\Stub;

class Node extends Stub {

  /**
   * Netjes voor autocomplete
   * @return Node
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
  public function node_load($nid, $vid = NULL, $reset = FALSE) {
    return node_load($nid, $vid, $reset);
  }

  /**
   * @param type $nid
   * @param type $vid
   * @param type $reset
   * @return type
   */
  public function node_save($node) {
    return node_save($node);
  }

}
