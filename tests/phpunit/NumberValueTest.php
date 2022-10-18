<?php

declare( strict_types = 1 );

namespace DataValues\Tests;

use DataValues\NumberValue;

/**
 * @covers \DataValues\NumberValue
 * @covers \DataValues\DataValueObject
 */
class NumberValueTest extends DataValueTest {

	/**
	 * @see DataValueTest::getClass
	 *
	 * @return string
	 */
	public function getClass() {
		return NumberValue::class;
	}

	public function validConstructorArgumentsProvider() {
		$argLists = [];

		$argLists[] = [ 42 ];
		$argLists[] = [ -42 ];
		$argLists[] = [ 4.2 ];
		$argLists[] = [ -4.2 ];
		$argLists[] = [ 0 ];

		return $argLists;
	}

	public function invalidConstructorArgumentsProvider() {
		$argLists = [];

		$argLists[] = [ 'foo' ];
		$argLists[] = [ '' ];
		$argLists[] = [ '0' ];
		$argLists[] = [ '42' ];
		$argLists[] = [ '-42' ];
		$argLists[] = [ '4.2' ];
		$argLists[] = [ '-4.2' ];
		$argLists[] = [ false ];
		$argLists[] = [ true ];
		$argLists[] = [ null ];
		$argLists[] = [ '0x20' ];

		return $argLists;
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testGetValue( NumberValue $number, array $arguments ) {
		$this->assertEquals( $arguments[0], $number->getValue() );
	}

	/** @dataProvider instanceWithHashProvider */
	public function testGetHashStability( NumberValue $string, string $hash ) {
		$this->assertSame( $hash, $string->getHash() );
	}

	public function instanceWithHashProvider(): iterable {
		// all hashes obtained from data-values/data-values==3.0.0 under PHP 7.2.34
		yield 'int 0' => [
			new NumberValue( 0 ),
			'81277795dbf8a1fd3d0251763ec31542',
		];
		yield 'int 1337' => [
			new NumberValue( 1337 ),
			'a458da273f208b6c0345061c84dc4edd',
		];
		yield 'float 0.0' => [
			new NumberValue( 0.0 ),
			'c750d1ddbacf64a45afaa2e71b24c381'
		];
		yield 'float 13.37' => [
			new NumberValue( 13.37 ),
			'f3f2807ccf5697277cf37176e3b9eb3d',
		];
	}

}
