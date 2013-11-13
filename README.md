# DataValues

DataValues is a small PHP library that aims to be a common foundation for representing "simple"
values. Values such as numbers, geographical coordinates, strings and times.

Recent changes can be found in the [release notes](docs/RELEASE-NOTES.md).

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