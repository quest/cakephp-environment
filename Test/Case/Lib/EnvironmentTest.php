<?php
/**
 * Environment Test
 *
 * for CakePHP 2.0+
 * PHP version 5.2+
 *
 *
 * Copyright 2014
 *
 * Licensed under MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author  Victor San Martin <vsanmartinm[at]gmail[dot]com>
 * @since 1.0.0
 * @copyright  Copyright 2014
 * @license MIT Licence (http://www.opensource.org/licenses/mit-license.php)
 */

App::import('Environment.Lib', 'Environment');


/**
 * Test class for Environment
 */
class EnvironmentTest extends CakeTestCase {

/**
 * Sets up the fixture, for example, opens a network connection.
 * This method is called before a test is executed.
 */
	public function setUp() {
		Environment::init();
	}

	public function testIs() {
		Environment::set('development');
		$this->assertTrue(Environment::is('development'));

		Environment::set('production');
		$this->assertTrue(Environment::is('production'));
	}
}
