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

	public function testSetAndGet() {
		Environment::set('development');
		$this->assertEquals(Environment::get(), 'development');

		Environment::set('other');
		$this->assertEquals(Environment::get(), 'other');

		$this->assertTrue(Environment::set() == false);
	}

	public function testWriteAndRead() {
		Environment::write('title', 'this is development', 'development');
		$this->assertEquals(Environment::read('title', 'development'), 'this is development');

		Environment::write('title', 'this is production', 'production');
		$this->assertEquals(Environment::read('title', 'production'), 'this is production');

		Environment::set('development');
		$this->assertEquals(Environment::read('title'), 'this is development');

		Environment::set('production');
		$this->assertEquals(Environment::read('title'), 'this is production');

		Environment::write(array(
			'hello' => 'Hello World',
			'bye' => 'Bye bye'
		), 'development');
		$this->assertEquals(Environment::read('bye', 'development'), 'Bye bye');

		Environment::write(array(
			'debug' => 3,
			'App.encoding' => 'UTF-8',
			'Security.salt' => 'hjkh34k5j3kKjg23kH23452873fd9sdfsd9f8shd90f'
		), 'development');

		Environment::write(array(
			'debug' => 0,
			'App.encoding' => 'UTF-8',
			'Security.salt' => '67783jd9HKkjkhhkferwQhhPbkjb987987bJKhjvdskhJK'
		), 'production');

		Environment::set('development');
		$this->assertEquals(Configure::read('Security.salt'), 'hjkh34k5j3kKjg23kH23452873fd9sdfsd9f8shd90f');

		Environment::set('production');
		$this->assertEquals(Configure::read('Security.salt'), '67783jd9HKkjkhhkferwQhhPbkjb987987bJKhjvdskhJK');
	}
}
