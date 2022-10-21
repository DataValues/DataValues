<?php

declare( strict_types = 1 );

namespace DataValues\Tests;

use DataValues\DataValue;
use Exception;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Serializable;

abstract class DataValueTest extends TestCase {

	/**
	 * Returns the name of the concrete class tested by this test.
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	abstract public function getClass();

	abstract public function validConstructorArgumentsProvider();

	abstract public function invalidConstructorArgumentsProvider();

	/**
	 * Creates and returns a new instance of the concrete class.
	 *
	 * @since 0.1
	 *
	 * @return mixed
	 */
	public function newInstance() {
		$reflector = new ReflectionClass( $this->getClass() );
		$args = func_get_args();
		$instance = $reflector->newInstanceArgs( $args );
		return $instance;
	}

	/**
	 * @since 0.1
	 *
	 * @return array [instance, constructor args]
	 */
	public function instanceProvider() {
		return array_map(
			function ( array $args ) {
				return [
					$this->newInstance( ...$args ),
					$args
				];
			},
			$this->validConstructorArgumentsProvider()
		);
	}

	/**
	 * @dataProvider validConstructorArgumentsProvider
	 *
	 * @since 0.1
	 */
	public function testConstructorWithValidArguments() {
		$dataItem = $this->newInstance( ...func_get_args() );

		$this->assertInstanceOf( $this->getClass(), $dataItem );
	}

	/**
	 * @dataProvider invalidConstructorArgumentsProvider
	 *
	 * @since 0.1
	 */
	public function testConstructorWithInvalidArguments() {
		$this->expectException( Exception::class );

		$this->newInstance( ...func_get_args() );
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testImplements( DataValue $value, array $arguments ) {
		$this->assertInstanceOf( Serializable::class, $value );
		$this->assertInstanceOf( DataValue::class, $value );
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testGetType( DataValue $value, array $arguments ) {
		$valueType = $value->getType();
		$this->assertIsString( $valueType );
		$this->assertTrue( strlen( $valueType ) > 0 );

		// Check whether using getType statically returns the same as called from an instance:
		$staticValueType = call_user_func( [ $this->getClass(), 'getType' ] );
		$this->assertEquals( $staticValueType, $valueType );
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testSerialization( DataValue $value, array $arguments ) {
		$serialization = serialize( $value );
		$this->assertIsString( $serialization );

		$unserialized = unserialize( $serialization );
		$this->assertInstanceOf( DataValue::class, $unserialized );

		$this->assertTrue( $value->equals( $unserialized ) );
		$this->assertEquals( $value, $unserialized );
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testEquals( DataValue $value, array $arguments ) {
		$this->assertTrue( $value->equals( $value ) );

		foreach ( [ true, false, null, 'foo', 42, [], 4.2 ] as $otherValue ) {
			$this->assertFalse( $value->equals( $otherValue ) );
		}
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testGetHash( DataValue $value, array $arguments ) {
		$hash = $value->getHash();

		$this->assertIsString( $hash );
		$this->assertEquals( $hash, $value->getHash() );
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testGetSerializationForHash( DataValue $value, array $arguments ) {
		$serialization = $value->getSerializationForHash();

		$this->assertTrue( $value->equals( unserialize( $serialization ) ) );
		if ( version_compare( phpversion(), '7.4', '<' ) || !method_exists( $value, '__serialize' ) ) {
			// If we run PHP 7.3 (or older), or $value doesn't yet have the __serialize method,
			// the default PHP serialization should match our legacy format.
			$this->assertSame( serialize( $value ), $serialization );
		}
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testGetValueSimple( DataValue $value, array $arguments ) {
		$value->getValue();
		$this->assertTrue( true );
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testGetArrayValueSimple( DataValue $value, array $arguments ) {
		$value->getArrayValue();
		$this->assertTrue( true );
	}

	/**
	 * @dataProvider instanceProvider
	 */
	public function testToArray( DataValue $value, array $arguments ) {
		$array = $value->toArray();

		$this->assertIsArray( $array );

		$this->assertTrue( array_key_exists( 'type', $array ) );
		$this->assertTrue( array_key_exists( 'value', $array ) );

		$this->assertEquals( $value->getType(), $array['type'] );
		$this->assertEquals( $value->getArrayValue(), $array['value'] );
	}

}
