<?php
/**
 * AllEnvironmentTest class
 *
 * This test group will run all test.
 *
 * @package  Environment.Test.Case
 */
class AllEnvironmentTests extends PHPUnit_Framework_TestSuite {

/**
 * Suite define the tests for this suite
 *
 * @return void
 */
	public static function suite() {
		$suite = new CakeTestSuite('All Environment Tests');
		$suite->addTestDirectoryRecursive(App::pluginPath('Environment') . 'Test' . DS . 'Case' . DS);

		return $suite;
	}
}
