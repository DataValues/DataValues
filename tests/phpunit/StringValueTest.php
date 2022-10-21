<?php

declare( strict_types = 1 );

namespace DataValues\Tests;

use DataValues\StringValue;

/**
 * @covers \DataValues\StringValue
 * @covers \DataValues\DataValueObject
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

	/** @dataProvider instanceWithHashProvider */
	public function testGetHashStability( StringValue $string, string $hash ) {
		$this->assertSame( $hash, $string->getHash() );
	}

	public function instanceWithHashProvider(): iterable {
		// all hashes obtained from data-values/data-values==3.0.0 under PHP 7.2.34
		yield 'empty' => [
			new StringValue( '' ),
			'322af78b3f40f91da92c3d8dd9c015f2',
		];
		yield 'abc' => [
			new StringValue( 'abc' ),
			'9d118479352d30db2f37ec6a0e664821',
		];
	}

}
