<?php

declare( strict_types = 1 );

namespace DataValues\Tests;

use DataValues\DataValue;
use DataValues\UnDeserializableValue;

/**
 * @covers \DataValues\UnDeserializableValue
 * @covers \DataValues\DataValueObject
 * @author Daniel Kinzler
 */
class UnDeserializableValueTest extends DataValueTest {

	/**
	 * @see DataValueTest::getClass
	 *
	 * @return string
	 */
	public function getClass() {
		return UnDeserializableValue::class;
	}

	public function validConstructorArgumentsProvider() {
		$argLists = [];

		$argLists[] = [ null, null, 'No type and no data' ];
		$argLists[] = [ null, 'string', 'A type but no data' ];
		$argLists[] = [ [ 'stuff' ], 'string', 'A type and bad data' ];

		return $argLists;
	}

	public function invalidConstructorArgumentsProvider() {
		$argLists = [];

		$argLists[] = [ new \stdClass(), null, 'No type and no data' ];
		$argLists[] = [ null, 42, 'No type and no data' ];
		$argLists[] = [ null, false, 'No type and no data' ];
		$argLists[] = [ null, [], 'No type and no data' ];
		$argLists[] = [ null, null, null ];
		$argLists[] = [ null, null, true ];
		$argLists[] = [ null, null, [] ];

		return $argLists;
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testGetValue( UnDeserializableValue $value, array $arguments ) {
		$this->assertEquals( $arguments[0], $value->getValue() );
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testGetArrayValue( UnDeserializableValue $value, array $arguments ) {
		$this->assertEquals( $arguments[0], $value->getArrayValue() );
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testGetTargetType( UnDeserializableValue $value, array $arguments ) {
		$this->assertEquals( $arguments[1], $value->getTargetType() );
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testToArray( DataValue $value, array $arguments ) {
		$array = $value->toArray();

		$this->assertIsArray( $array );

		$this->assertTrue( array_key_exists( 'type', $array ) );
		$this->assertTrue( array_key_exists( 'value', $array ) );

		$this->assertEquals( $value->getTargetType(), $array['type'] );
		$this->assertEquals( $value->getValue(), $array['value'] );
	}

	public function testNewFromArray() {
		$this->assertFalse( method_exists( $this->getClass(), 'newFromArray' ) );
	}

}
