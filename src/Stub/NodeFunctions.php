<?php

namespace Drupal\drupalstub\Stub;

trait NodeFunctions {

  /**
   *
   * @var Node
   */
  protected $fNode;

  public function attachNode(Node $stub = NULL) {
    if ($stub) {
      $this->fNode = $stub;
    } else {
      $this->fNode = Node::f();
    }
  }

}
