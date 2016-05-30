<?php

namespace Drupal\stub_example\tests;

use PHPUnit_Framework_TestCase;
use Drupal\drupalstub\Stub;
use Drupal\stub_example\ChangeNode;

class ChangeNodeTest extends PHPUnit_Framework_TestCase {

  public function testChangeNode() {
    $changer = new ChangeNode();
    $node = (object) ['title' => ''];
    $this->assertEquals('()', $changer->embraceTitle($node));
    
    $node = (object) ['title' => 'demo'];
    $this->assertEquals('(demo)', $changer->embraceTitle($node));
  }

  public function testMyGlobalFunctionGetsCalled() {
    $functions = $this
      ->getMockBuilder('Drupal\stub_example\ExampleFunctions')
      ->getMock();
    $functions->method('add_a_numer_to_something_random')->willReturn(0);
    
    Stub::f()->attach($functions);
    $changer = new ChangeNode();
    
    // setRandomUid is expected to call add_a_number_to_something_random
    $functions->expects($this->once())->method('add_a_numer_to_something_random');
    $changer->setRandomUid((object)[]);
  }

}
