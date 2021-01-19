<?php

declare( strict_types = 1 );

namespace DataValues;

/**
 * Class representing a simple numeric value.
 *
 * More complex numeric values that have associated info such as
 * unit and accuracy can be represented with a {@see QuantityValue}.
 */
class NumberValue extends DataValueObject {

	/**
	 * @var int|float
	 */
	private $value;

	/**
	 * @param int|float $value
	 *
	 * @throws IllegalValueException
	 */
	public function __construct( $value ) {
		if ( !is_int( $value ) && !is_float( $value ) ) {
			throw new IllegalValueException( 'Can only construct NumberValue from floats or integers.' );
		}

		$this->value = $value;
	}

	/**
	 * @see Serializable::serialize
	 *
	 * @return string
	 */
	public function serialize() {
		return serialize( $this->value );
	}

	/**
	 * @see Serializable::unserialize
	 *
	 * @param string $value
	 */
	public function unserialize( $value ) {
		$this->__construct( unserialize( $value ) );
	}

	/**
	 * @see DataValue::getType
	 *
	 * @return string
	 */
	public static function getType() {
		return 'number';
	}

	/**
	 * Returns the number.
	 * @see DataValue::getValue
	 *
	 * @return int|float
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Constructs a new instance from the provided data. Required for {@see DataValueDeserializer}.
	 * This is expected to round-trip with {@see getArrayValue}.
	 *
	 * @deprecated since 1.1. Static DataValue::newFromArray constructors like this are
	 *  underspecified (not in the DataValue interface), and misleadingly named (should be named
	 *  newFromArrayValue). Instead, use DataValue builder callbacks in {@see DataValueDeserializer}.
	 *
	 * @param mixed $data Warning! Even if this is expected to be a value as returned by
	 *  {@see getArrayValue}, callers of this specific newFromArray implementation can not guarantee
	 *  this. This is not guaranteed to be a number!
	 *
	 * @throws IllegalValueException if $data is not in the expected format. Subclasses of
	 *  InvalidArgumentException are expected and properly handled by {@see DataValueDeserializer}.
	 * @return self
	 */
	public static function newFromArray( $data ) {
		return new static( $data );
	}

}
