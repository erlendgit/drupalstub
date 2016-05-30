<?php

namespace Drupal\drupalstub\Functions;

use Drupal\drupalstub\Functions;

class Node extends Functions {

  public function node_load($nid, $vid = NULL, $reset = FALSE) {
    return node_load($nid, $vid, $reset);
  }

  public function node_save($node) {
    return node_save($node);
  }

  public function node_object_prepare($node) {
    return node_object_prepare($node);
  }
  
  public function node_access($op, $node, $account=NULL) {
    return node_access($op, $node, $account);
  }

}
