# TDD in Drupal

When writing unit tests you want to be able to decouple your software from the third party software for you trust the third party and want to gain trust about your software.

The problem with Drupal is that the interface consists of many plain php functions. This is a problem because PHP unit test frameworks provide nice solutions to mock classes, not functions. In order to use a unit test framework to test your code you must map the interface of drupal in a seperate class and provide a way to abstract the drupal interface from your code.

One way to do this is as follows:

    class StubDemoTest extends TestCase {
      public function testDemoFunctionality() {
        $mock = $this->getMock('Stub')
          ->method('plain_php_function', $this->functionResult('Plain!'));

        $demo = new StubDemo();

        $demo->attach($mock);

        $demo->doSomething();

        $this->assertCalled($mock, 'plain_php_function', 'Function has not been called.');
      }
    }

    class StubDemo {
      use StubFunctions;

      public function __construct() {
        $this->attach(Stub::f());
      }
      public function doSomething() {
        $this->fStub->plain_php_function('with', 'parameters');
      }
    }

    trait StubFunctions {
      protected $fStub;
      public function attach(Stub $f) {
        $this->fStub = $f;
      }
    }

    class Stub extends StubBase {
      public function plain_php_function($with, $parameters) {
        return plain_php_function($with, $parameters);
      }
    }

    class StubBase {
      public static function f() {
        $class = static::class;
        return new $class();
      }
    }

    function plain_php_function($with, $parameters) {
      return "Plain!";
    }






