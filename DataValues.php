<?php

/**
 * Entry point for the DataValues library.
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

if ( defined( 'DataValues_VERSION' ) ) {
	// Do not initialize more then once.
	return;
}

define( 'DATAVALUES_VERSION', '0.2 alpha' );

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

	// The below is a temporary hack to not break classical MediaWiki-style loading.
	// This can be removed once requiring Composer or other sane loading becomes acceptable.
	$classes = array(
		'DataValues\BooleanValue',
		'DataValues\DataValue',
		'DataValues\DataValueObject',
		'DataValues\IllegalValueException',
		'DataValues\NumberValue',
		'DataValues\StringValue',
		'DataValues\UnDeserializableValue',
		'DataValues\UnknownValue',
	);

	if ( in_array( $className, $classes ) ) {
		require_once __DIR__ . '/src/' . substr( $className, 11 ) . '.php';
	}
} );

if ( defined( 'MEDIAWIKI' ) ) {
	include __DIR__ . '/DataValues.mw.php';
}

