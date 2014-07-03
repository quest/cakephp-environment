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
 * Example file for the configurations
 * If you need modified this file, create you own file at app/Config/
 *
 * DO NOT MODIFIED THIS FILE
 */


/**
 * Compatibility hack
 * @var array
 */
	$config = array();

/**
 * Domains example
 *
 * Overwrite at app/Config/env.php
 */
	Configure::write('Environment.domains-default', array(
		'development' => '.*',
		'production' => '^(.+\.)?mysite\.com$'
	));
