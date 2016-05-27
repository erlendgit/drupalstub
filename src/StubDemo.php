<?php

namespace Drupal\drupalstub;

use Drupal\drupalstub\Stub\NodeFunctions;

class StubDemo {
  use NodeFunctions;
  use UserFunctions;
  
  public function __construct($nid) {
    // required initialization
    $this->attachNode();
    $this->attachUser();
    
    $node = $this->fNode->node_load($nid);
    $user = $this->fUser->user_load(1);
  }
  
  public function attach(Stub $stub) {
    if ($stub instanceof Node) {
      $this->attachNode($stub);
    } elseif ($stub instanceof User) {
      $this->attachUser($stub);
    }
  }
  
}