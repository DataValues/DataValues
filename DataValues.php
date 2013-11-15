<?php

/**
 * Entry point for the DataValues extension.
 *
 * Documentation:	 		https://www.mediawiki.org/wiki/Extension:DataValues
 * Support					https://www.mediawiki.org/wiki/Extension_talk:DataValues
 * Source code:				https://gerrit.wikimedia.org/r/gitweb?p=mediawiki/extensions/DataValues.git
 *
 * @since 0.1
 *
 * @file
 * @ingroup DataValues
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

/**
 * Files belonging to the DataValues extension.
 *
 * @defgroup DataValues DataValues
 */

/**
 * Tests part of the DataValues extension.
 *
 * @defgroup DataValuesTests DataValuesTests
 * @ingroup DataValues
 */

if ( defined( 'DataValues_VERSION' ) ) {
	// Do not initialize more then once.
	return;
}

define( 'DATAVALUES_VERSION', '0.1 rc' );

/**
 * @deprecated
 */
define( 'DataValues_VERSION', DATAVALUES_VERSION );

spl_autoload_register( function ( $className ) {
	$className = ltrim( $className, '\\' );

	if ( in_array( $className, array( 'Comparable', 'Copyable', 'Hashable', 'Immutable' ) ) ) {
		require_once __DIR__ . '/interfaces/' . $className . '.php';
		return;
	}

	if ( $className === 'DataValues\Tests\DataValueTest' ) {
		require_once __DIR__ . '/tests/phpunit/DataValueTest.php';
		return;
	}
} );

if ( defined( 'MEDIAWIKI' ) ) {
	include __DIR__ . '/DataValues.mw.php';
}

