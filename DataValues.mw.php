<?php

/**
 * MediaWiki setup for the DataValues library.
 *
 * @since 0.1
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

global $wgExtensionCredits, $wgExtensionMessagesFiles, $wgHooks;

$wgExtensionCredits['datavalues'][] = array(
	'path' => __DIR__,
	'name' => 'DataValues',
	'version' => DATAVALUES_VERSION,
	'author' => array(
		'[https://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw]'
	),
	'url' => 'https://www.mediawiki.org/wiki/Extension:DataValues',
	'descriptionmsg' => 'datavalues-desc',
);

$wgExtensionMessagesFiles['DataValues'] = __DIR__ . '/DataValues.i18n.php';

/**
 * Hook to add PHPUnit test cases.
 * @see https://www.mediawiki.org/wiki/Manual:Hooks/UnitTestsList
 *
 * @since 0.1
 *
 * @param array $files
 *
 * @return boolean
 */
$wgHooks['UnitTestsList'][] = function( array &$files ) {
	// @codeCoverageIgnoreStart
	$directoryIterator = new RecursiveDirectoryIterator( __DIR__ . '/tests/phpunit/' );

	/**
	 * @var SplFileInfo $fileInfo
	 */
	foreach ( new RecursiveIteratorIterator( $directoryIterator ) as $fileInfo ) {
		if ( substr( $fileInfo->getFilename(), -8 ) === 'Test.php' ) {
			$files[] = $fileInfo->getPathname();
		}
	}

	return true;
	// @codeCoverageIgnoreEnd
};

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
$wgHooks['ExtensionTypes'][] = function( array &$extensionTypes ) {
	// @codeCoverageIgnoreStart
	$extensionTypes['datavalues'] = wfMessage( 'version-datavalues' )->text();

	return true;
	// @codeCoverageIgnoreEnd
};

