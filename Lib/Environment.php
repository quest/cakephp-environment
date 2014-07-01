<?php
/**
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

/**
 * Environment Class
 *
 * @package lib
 */
class Environment {

/**
 * Flag
 * @var boolean
 */
	private static $_init = false;

/**
 * Default environment
 * @var string
 */
	private static $_env = 'production';

/**
 * Detect environment function
 *
 * @return boolean
 */
	public static function init() {
		if (self::$_init) {
			return true;
		}

		Configure::load('Environment.env', 'default');
		Config('env');

		$environment = 'production';
		$domains = Configure::read('Environment.domains');
		foreach ($domains as $env => $domain) {
			if (preg_match('/' . $domain . '/', env('HTTP_HOST'))) {
				$environment = $env;
			}
		}

		self::$_env = $environment;

		return self::$_init = true;
	}

/**
 * Get Environment
 *
 * @return string
 */
	public static function get() {
		Environment::init();
		return self::$_env;
	}

/**
 * Set Environment
 *
 * @param string $environment Environment name
 * @return boolean
 */
	public static function set($environment = '') {
		if (empty($environment)) {
			return false;
		}

		Environment::init();
		self::$_env = $environment;

		$config = Configure::read('Environment.' . $environment);
		if (!empty($config)) {
			Configure::write($config);
		}

		return true;
	}

/**
 * Method for validate environmente seted
 *
 * @param string $environment Environment name
 * @return boolean
 */
	public static function is($environment = '') {
		Environment::init();
		return self::$_env == $environment;
	}

/**
 * Set configuration key
 *
 * @param string|array $key Key name or array of keys
 * @param string $value Value of key
 * @param string $environment Environment name
 * @return boolean
 */
	public static function write($key = '', $value = '', $environment = '') {
		Environment::init();

		if (empty($environment)) {
			$environment = Environment::get();
		}

		if (is_array($key)) {
			foreach ($key as $k => $v) {
				Environment::write($k, $v, $value);
			}
			return true;
		}

		$return = Configure::write('Environment.' . $environment . '.' . $key, $value);
		if (Environment::is($environment)) {
			Configure::write($key, $value);
		}

		return $return;
	}

/**
 * Read configuration key
 *
 * @param string $key Key name
 * @param string $environment Environment name
 * @return false|string false or value
 */
	public static function read($key = '', $environment = '') {
		Environment::init();

		if (empty($environment)) {
			$environment = Environment::get();
		}

		$value = Configure::read('Environment.' . $environment . '.' . $key);
		if ($value !== null) {
			return $value;
		}

		return false;
	}
}
