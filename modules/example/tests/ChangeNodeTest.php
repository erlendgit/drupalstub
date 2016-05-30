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

  public function testEnsureMyGlobalFunctionGetsCalled() {
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
  
  public function testNativeDrupalFunctions() {
    $functions = $this
      ->getMockBuilder('Drupal\drupalstub\Functions\Node')
      ->getMock();
    $functions->method('node_load')->willReturn((object)['title'=>'demo']);
    
    Stub::f()->attach($functions);
    $changer = new ChangeNode();
    
    // loadNode is expected to call node_load
    $node = $changer->embraceTitleByNodeId(1);
    $this->assertEquals('(demo)', $node->title);
  }

}
