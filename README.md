# Environments plugin for CaePHP #

for CakePHP 2.x

## Requirements ##

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

Create file `app/Config/env.php`

## Support ##

To report bugs or request features, please visit the [Issue Tracker](https://github.com/quest/cakephp-environment/issues).

## Contributing to this Plugin ##

Please feel free to contribute to the plugin with new issues, requests, unit tests and code fixes or new features. If you want to contribute some code, create a feature branch from develop, and send us your pull request. Unit tests for new features and issues detected are mandatory to keep quality high.

## License ##

Copyright 2014, [Victor San Martín](http://twitter.com/questchile)

Licensed under [The MIT License](http://www.opensource.org/licenses/mit-license.php)<br/>
Redistributions of files must retain the above copyright notice.
