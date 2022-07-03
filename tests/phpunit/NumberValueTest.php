<?php

declare( strict_types = 1 );

namespace DataValues\Tests;

use DataValues\NumberValue;

/**
 * @covers \DataValues\NumberValue
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

	public function testSerializationStability(): void {
		$this->assertSame(
			'C:22:"DataValues\NumberValue":5:{i:42;}', // Obtained with PHP 8.1.5, tested down to PHP 7.2
			serialize( new NumberValue( 42 ) )
		);

		$this->assertSame(
			'C:22:"DataValues\NumberValue":7:{d:-4.2;}', // Obtained with PHP 8.1.5, tested down to PHP 7.2
			serialize( new NumberValue( -4.2 ) )
		);
	}

}
