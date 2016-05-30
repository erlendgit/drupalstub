<?php

namespace Drupal\stub_example\tests;

use PHPUnit_Framework_TestCase;
use Drupal\drupalstub\Stub;
use Drupal\stub_example\ChangeNode;
use stdClass;

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
    
    // the test!
    $functions->expects($this->once())->method('add_a_numer_to_something_random');

    Stub::f()->attach($functions);
    $changer = new ChangeNode();
    $changer->setRandomUid((object)[]);
  }

}
