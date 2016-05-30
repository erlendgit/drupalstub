<?php

namespace Drupal\drupalstub\Test;
use PHPUnit_Framework_TestCase;
use stdClass;

use Drupal\drupalstub\Stub;

class StubTest extends PHPUnit_Framework_TestCase {
  public function testFactory() {
    $instance = Stub::f();
    $this->assertInstanceOf('Drupal\drupalstub\Stub', $instance);
    $this->assertSame($instance, Stub::f());
  }
  
  public function testExceptionIfNotAvailable() {
    $this->expectException('Exception');
    $this->expectExceptionMessage("Method 'foo' not implemented");
    
    Stub::f()->foo();
  }
  
  public function testExceptionIfNotExtendsFunction() {
    $this->expectException('Exception');
    $this->expectExceptionMessage("stdClass does not extend Drupal\drupalstub\Function");
    
    Stub::f()->attach(new stdClass());
  }
  
  public function testMockedImplementation() {
    $functions = $this
      ->getMockBuilder('Drupal\drupalstub\Functions')
      ->getMock();
    $functions->method('foo')->willReturn(TRUE);
    
    Stub::f()->attach($functions);
    
    $functions->expects($this->exactly(2))->method('foo');
    
    $this->assertFalse(Stub::f()->isMapped('foo'));
    $this->assertTrue(Stub::f()->foo());
    
    $this->assertTrue(Stub::f()->isMapped('foo'));
    $this->assertTrue(Stub::f()->foo());
  }
}