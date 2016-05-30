<?php

namespace Drupal\stub_example;

use Drupal\drupalstub\Stub;

class ChangeNode {

  public function embraceTitle($node) {
    $node->title = "({$node->title})";
    return $node->title;
  }

  public function setRandomUid($node) {
    $node->uid = Stub::f()->add_a_numer_to_something_random(rand(0, 9999), 10);
    return $node->uid;
  }
  
  public function embraceTitleByNodeId($nid) {
    $node = Stub::f()->node_load($nid);
    $this->embraceTitle($node);
    return $node;
  }

}
