<?php

/**
 * MediaWiki setup for the DataValues library.
 *
 * @since 0.1
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

$GLOBALS['wgExtensionCredits']['datavalues'][] = array(
	'path' => __DIR__,
	'name' => 'DataValues',
	'version' => DATAVALUES_VERSION,
	'author' => array(
		'[https://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw]'
	),
	'url' => 'https://github.com/DataValues/DataValues',
	'descriptionmsg' => 'datavalues-desc',
);

$GLOBALS['wgMessagesDirs']['DataValues'] = __DIR__ . '/i18n';

/**
 * Called when generating the extensions credits, use this to change the tables headers.
 * @see https://www.mediawiki.org/wiki/Manual:Hooks/ExtensionTypes
 *
 * @since 0.1
 *
 * @param array &$extensionTypes
 *
 * @return boolean
 */
$GLOBALS['wgHooks']['ExtensionTypes'][] = function( array &$extensionTypes ) {
	// @codeCoverageIgnoreStart
	$extensionTypes['datavalues'] = wfMessage( 'version-datavalues' )->text();

	return true;
	// @codeCoverageIgnoreEnd
};

