# TDD in Drupal

When writing unit tests you want to be able to decouple your software from the third party software for you trust the third party and want to gain trust about your software.

The problem with Drupal is that the interface consists of many plain php functions. This is a problem because PHP unit test frameworks provide nice solutions to mock classes, not functions. In order to use a unit test framework to test your code you must map the interface of drupal in a seperate class and provide a way to abstract the drupal interface from your code.

1. Provide one interface for plain php functions
2. A hook enables modules to add their functions to the 'global' namespace