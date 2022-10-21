<?php

declare( strict_types = 1 );

namespace DataValues\Tests;

use DataValues\BooleanValue;

/**
 * @covers \DataValues\BooleanValue
 * @covers \DataValues\DataValueObject
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

	/** @dataProvider instanceWithHashProvider */
	public function testGetHashStability( BooleanValue $string, string $hash ) {
		$this->assertSame( $hash, $string->getHash() );
	}

	public function instanceWithHashProvider(): iterable {
		// all hashes obtained from data-values/data-values==3.0.0 under PHP 7.2.34
		yield 'true' => [
			new BooleanValue( true ),
			'8e4870384e54b7ba67b8da5ee127b274',
		];
		yield 'false' => [
			new BooleanValue( false ),
			'a3129f65af06a7c987ef5077ad3e9950',
		];
	}

}
