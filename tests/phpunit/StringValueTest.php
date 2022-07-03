<?php

declare( strict_types = 1 );

namespace DataValues\Tests;

use DataValues\StringValue;

/**
 * @covers \DataValues\StringValue
 */
class StringValueTest extends DataValueTest {

	/**
	 * @see DataValueTest::getClass
	 *
	 * @return string
	 */
	public function getClass() {
		return StringValue::class;
	}

	public function validConstructorArgumentsProvider() {
		$argLists = [];

		$argLists[] = [ 'foo' ];
		$argLists[] = [ '' ];
		$argLists[] = [ ' foo bar baz foo bar baz foo bar baz foo bar baz foo bar baz foo bar baz ' ];

		return $argLists;
	}

	public function invalidConstructorArgumentsProvider() {
		$argLists = [];

		$argLists[] = [ 42 ];
		$argLists[] = [ [] ];
		$argLists[] = [ false ];
		$argLists[] = [ true ];
		$argLists[] = [ null ];

		return $argLists;
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testGetValue( StringValue $string, array $arguments ) {
		$this->assertEquals( $arguments[0], $string->getValue() );
	}

	public function testSerializationStability(): void {
		$this->assertSame(
			'C:22:"DataValues\StringValue":0:{}', // Obtained with PHP 8.1.5, tested down to PHP 7.2
			serialize( new StringValue( '' ) )
		);

		$this->assertSame(
			'C:22:"DataValues\StringValue":7:{pew pew}', // Obtained with PHP 8.1.5, tested down to PHP 7.2
			serialize( new StringValue( 'pew pew' ) )
		);
	}

}
