# DataValues

Small PHP library that provides interfaces for Value Objects. 

[Several libraries](https://github.com/DataValues) build on top of this foundation.

[![Build Status](https://travis-ci.org/DataValues/DataValues.svg?branch=master)](https://travis-ci.org/DataValues/DataValues)
[![Code Coverage](https://scrutinizer-ci.com/g/DataValues/DataValues/badges/coverage.png?s=56a1ea89df94c6d9b4223ba584d0d4556e1984ef)](https://scrutinizer-ci.com/g/DataValues/DataValues/)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/DataValues/DataValues/badges/quality-score.png?s=ba9364790e6b521277a3829ffb91e2c2e1b68c3c)](https://scrutinizer-ci.com/g/DataValues/DataValues/)

On [Packagist](https://packagist.org/packages/data-values/data-values):
[![Latest Stable Version](https://poser.pugx.org/data-values/data-values/version.png)](https://packagist.org/packages/data-values/data-values)
[![Download count](https://poser.pugx.org/data-values/data-values/d/total.png)](https://packagist.org/packages/data-values/data-values)

## Requirements

These PHP versions are supported:

* PHP 5.5 or later, including PHP 7
* HHVM 3.3 or later

## Installation

To add this package as a local, per-project dependency to your project, simply add a
dependency on `data-values/data-values` to your project's `composer.json` file.
Here is a minimal example of a `composer.json` file that just defines a dependency on
DataValues 2.0:

```json
    {
        "require": {
            "data-values/data-values": "^2.0.0"
        }
    }
```

## Running the tests

For tests only

    composer test

For style checks only

    composer cs

For a full CI run

    composer ci

## Authors

DataValues has been written primarily by [Jeroen De Dauw](https://www.entropywins.wtf),
in part for the [Wikidata project](https://wikidata.org/) and [Wikimedia Germany](https://wikimedia.de).

Contributions where also made by
[several other awesome people](https://www.openhub.net/p/datavalues/contributors).

## Release notes

### 2.3.0 (2019-09-16)

* `composer.json` and `phpunit.xml.dist` are now included in releases

### 2.2.1 (2019-09-05)

* Fixed `DataValueTest` not being part of the release

### 2.2.0 (2019-09-05)

* Deprecated `DATAVALUES_VERSION` constant

### 2.1.1 (2017-09-28)

* Fixed `DataValueTest` not being installable via Composer

### 2.1.0 (2017-08-09)

* Removed MediaWiki integration

### 2.0.0 (2017-08-02)

* Dropped `Copyable` interface
* Dropped deprecated constant `DataValues_VERSION`, use `DATAVALUES_VERSION` instead
* Deprecated `newFromArray` in all `DataValue` implementations.
* Updated minimal required PHP version from 5.3 to 5.5.9
* Updated documentation throughout the code

### 1.1.1 (2017-11-02)

* Add .gitattributes file

### 1.1.0 (2017-08-09)

* Remove MediaWiki integration

### 1.0.0 (2014-09-26)

* The CI now ensures compatibility with PHP 5.6 and HHVM
* A lot of type hints where improved
* Protected methods and fields where changed to private
* The test bootstrap no longer executes `composer update`
* The test bootstrap now sets PHP strict mode
* The contract of the `Hashable::getHash` method was updated
* The MediaWiki internationalization support has been migrated to the JSON based version

### 0.1.1 (2013-11-22)

* Removed support for running the tests via the MediaWiki test runner.
* The test bootstrapping file now automatically does a composer install.
* Removed custom autoloader in favour of defining autoloading in composer.json.

### 0.1.0 (2013-11-16)

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
