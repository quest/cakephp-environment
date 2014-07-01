# Environment plugin for CaePHP #

for CakePHP 2.x

## Requirement ##

* PHP version: PHP 5.2+
* CakePHP version: 2.x Stable

## Installation ##

* Clone/Copy the files in this diectory into `app/Plugin/Environment`
* Ensure the plugin is loaded in `app/Config/bootstrap.php` by calling `CakePlugin::load('Environment', array('bootstrap' => true))`

### Using Composer ###

Ensure `require` is present in `composer.json`. This will install the plugin into `Plugin/Environment`:

```
{
    "require": {
        "quest/cakephp-environment": "1.*"
    }
}
```

## Using Environment ##

Create file `app/Config/env.php` with this example content.

```
/**
 * Domains environments
 * IMPORTANT: This lines on the top of the file
 */
	Configure::write('Environment.domains', array(
		'development' => '.*',
		'production' => '^(.+\.)?mysite\.com$'
	));

/**
 * Development settings
 */
	Environment::write(array(
		'debug' => 2,
		'Security.salt' => '6978hjkhKjkhskjhd698KGNSLdsDLsdKSAsdf8778sdfg',
		'Security.cipherSeed' => '57283694289374902834892039823756894'
	), 'development');

/**
 * Production settings
 */
	Environment::write(array(
		'debug' => 0
	), 'production');
```

### Environment Detection ###

In order to detect the project environment and apply their settings, use the application hostname, just like this:


```
	Configure::write('Environment.domains', array(
		'development' => '^myapp\.local$',
		'production' => '^mycapp\.com$'
	));
```

You must use regex to define the hostname. You can create many environments as you want.

### Methods ###

#### Environment::get() ####

Get the current environment depending on hostname requested:

```
	echo Environment::get(); // print 'development' text
```

#### Environment::set(string $environment) ####

Avoid set the environment based on hostname request, by using `set()` method. It will overwrite any other environment previously settled.

```
	Environment::set('testing'); // true
```

#### Environment::is(string $environment) ####

Use this method to check the current/working environment.

```
	if (Environment::is('development')) {
		echo 'this is development';
	}
	else {
		echo 'this is ' . Environment::get();
	}
```

#### Environment::write() ####

You can write environment settings by using the `write()` method in two ways:

Multiple

```
	Environment::write(array(
		'debug' => 2,
		'database' => array(
			'login' => 'root',
			'host' => 'localhost',
			'password' => '',
		)
	), 'development');
```

Single

```
	Environment::write('debug', 0, 'production');
```

#### Environment::read() ####

Read environment settings by using the `read()` method:

* $key: Key to find
* $environment: Optional — Environment scope

```
// databases.php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => Environment::read('database.host'),
		'login' => Environment::read('database.login'),
		'password' => Environment::read('database.password'),
		'database' => 'database_name',
		'prefix' => '',
		'encoding' => 'utf8',
	);
}
```

`Environment::write()` also can be used to update or modify Cake's `app/Config/core.php` file settings. For example:

```
/**
 * Development settings
 */
	Environment::write(array(
		'debug' => 2,
		'Security.salt' => '6978hjkhKjkhskjhd698KGNSLdsDLsdKSAsdf8778sdfg',
		'Security.cipherSeed' => '57283694289374902834892039823756894'
	), 'development');

/**
 * Production settings
 */
	Environment::write(array(
		'debug' => 0,
		'Security.salt' => '6978hjkhKjkhskjhd698KGNSLdsDLsdKSAsdf8778sdfg',
		'Security.cipherSeed' => '57283694289374902834892039823756894'
	), 'production');
```

## Support ##

To report bugs or request features, please visit the [Issue Tracker](https://github.com/quest/cakephp-environment/issues).

## Contributing to this Plugin ##

Please feel free to contribute to the plugin with new issues, requests, unit tests and code fixes or new features. If you want to contribute some code, create a feature branch from develop, and send us your pull request. Unit tests for new features and issues detected are mandatory to keep quality high.

## License ##

Copyright 2014, [Victor San Martín](http://twitter.com/questchile)

Licensed under [The MIT License](http://www.opensource.org/licenses/mit-license.php)<br/>
Redistributions of files must retain the above copyright notice.
