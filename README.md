# DataValues

DataValues is a small PHP library that aims to be a common foundation for representing "simple"
values. Values such as numbers, geographical coordinates, strings and times.

[![Build Status](https://secure.travis-ci.org/JeroenDeDauw/DataValues.png?branch=master)](http://travis-ci.org/JeroenDeDauw/DataValues)

On [Packagist](https://packagist.org/packages/data-values/data-values):
[![Latest Stable Version](https://poser.pugx.org/data-values/data-values/version.png)](https://packagist.org/packages/data-values/data-values)
[![Download count](https://poser.pugx.org/data-values/data-values/d/total.png)](https://packagist.org/packages/data-values/data-values)

## Requirements

* PHP 5.3 or later

## Installation

You can use [Composer](http://getcomposer.org/) to download and install
this package as well as its dependencies. Alternatively you can simply clone
the git repository and take care of loading yourself.

### Composer

To add this package as a local, per-project dependency to your project, simply add a
dependency on `data-values/data-values` to your project's `composer.json` file.
Here is a minimal example of a `composer.json` file that just defines a dependency on
DataValues 1.0:

    {
        "require": {
            "data-values/data-values": "1.0.*"
        }
    }

### Manual

Get the DataValues code, either via git, or some other means. Also get all dependencies.
You can find a list of the dependencies in the "require" section of the composer.json file.
Load all dependencies and the load the DataValues library by including its entry point:
DataValues.php.

## Related libraries

The following libraries are build on top of DataValues and commonly used together with it:

* [DataValuesInterfaces](https://github.com/JeroenDeDauw/DataValuesInterfaces)
- defines interfaces for parsers, validators and formatters build on top of DataValues
* [DataValuesCommon](https://github.com/JeroenDeDauw/DataValuesCommon)
- contains common data values and implementations of the interfaces defined by DataValuesInterfaces

## Tests

This library comes with a set up PHPUnit tests that cover all non-trivial code. You can run these
tests using the PHPUnit configuration file found in the root directory. The tests can also be run
via TravisCI, as a TravisCI configuration file is also provided in the root directory.

## Authors

DataValues has been written primarily by [Jeroen De Dauw](https://www.mediawiki.org/wiki/User:Jeroen_De_Dauw),
in part as [Wikimedia Germany](https://wikimedia.de) employee for the [Wikidata project](https://wikidata.org/).

Contributions where also made by [several other awesome people]
(https://www.ohloh.net/p/datavalues/contributors).

## Release notes

### 0.1 (2013-11-16)

Initial release with these features:

* DataValue interface
	* BooleanValue implementation
	* NumberValue implementation
	* StringValue implementation
	* UnDeserializableValue implementation
	* UnknownValue implementation
* Common interface definitions: Comparable, Copyable, Hashable, Immutable

## Links

* [DataValues on Packagist](https://packagist.org/packages/data-values/data-values)
* [DataValues on Ohloh](https://www.ohloh.net/p/datavalues)