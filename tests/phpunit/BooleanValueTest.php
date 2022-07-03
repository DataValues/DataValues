<?php

declare( strict_types = 1 );

namespace DataValues\Tests;

use DataValues\BooleanValue;

/**
 * @covers \DataValues\BooleanValue
 */
class BooleanValueTest extends DataValueTest {

	/**
	 * @see DataValueTest::getClass
	 *
	 * @return string
	 */
	public function getClass() {
		return BooleanValue::class;
	}

	public function validConstructorArgumentsProvider() {
		$argLists = [];

		$argLists[] = [ false ];
		$argLists[] = [ true ];

		return $argLists;
	}

	public function invalidConstructorArgumentsProvider() {
		$argLists = [];

		$argLists[] = [ 42 ];
		$argLists[] = [ [] ];
		$argLists[] = [ '1' ];
		$argLists[] = [ '' ];
		$argLists[] = [ 0 ];
		$argLists[] = [ 1 ];
		$argLists[] = [ 'foo' ];
		$argLists[] = [ null ];

		return $argLists;
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testGetValue( BooleanValue $boolean, array $arguments ) {
		$this->assertEquals( $arguments[0], $boolean->getValue() );
	}

	public function testSerializationStability(): void {
		$this->assertSame(
			'C:23:"DataValues\BooleanValue":1:{1}', // Obtained with PHP 8.1.5, tested down to PHP 7.2
			serialize( new BooleanValue( true ) )
		);

		$this->assertSame(
			'C:23:"DataValues\BooleanValue":1:{0}', // Obtained with PHP 8.1.5, tested down to PHP 7.2
			serialize( new BooleanValue( false ) )
		);
	}

}
