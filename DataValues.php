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

define( 'DATAVALUES_VERSION', '0.1.1' );

/**
 * @deprecated
 */
define( 'DataValues_VERSION', DATAVALUES_VERSION );

if ( defined( 'MEDIAWIKI' ) ) {
	include __DIR__ . '/DataValues.mw.php';
}
