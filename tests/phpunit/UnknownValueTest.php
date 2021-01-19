<?php

declare( strict_types = 1 );

namespace DataValues\Tests;

use DataValues\UnknownValue;

/**
 * @covers \DataValues\UnknownValue
 */
class UnknownValueTest extends DataValueTest {

	/**
	 * @see DataValueTest::getClass
	 *
	 * @return string
	 */
	public function getClass() {
		return UnknownValue::class;
	}

	public function validConstructorArgumentsProvider() {
		$argLists = [];

		$argLists[] = [ 42 ];
		$argLists[] = [ [] ];
		$argLists[] = [ false ];
		$argLists[] = [ true ];
		$argLists[] = [ null ];
		$argLists[] = [ 'foo' ];
		$argLists[] = [ '' ];
		$argLists[] = [ ' foo bar baz foo bar baz foo bar baz foo bar baz foo bar baz foo bar baz ' ];

		return $argLists;
	}

	public function invalidConstructorArgumentsProvider() {
		return [
			[],
		];
	}

	public function testConstructorWithInvalidArguments( ...$params ) {
		// UnknownValue has no invalid arguments
		$this->assertTrue( true );
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testGetValue( UnknownValue $value, array $arguments ) {
		$this->assertEquals( $arguments[0], $value->getValue() );
	}

}
