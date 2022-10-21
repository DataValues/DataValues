<?php

declare( strict_types = 1 );

namespace DataValues;

class StringValue extends DataValueObject {

	/**
	 * @var string
	 */
	private $value;

	/**
	 * @param string $value
	 *
	 * @throws IllegalValueException
	 */
	public function __construct( $value ) {
		if ( !is_string( $value ) ) {
			throw new IllegalValueException( 'Can only construct StringValue from strings' );
		}

		$this->value = $value;
	}

	/**
	 * @see Serializable::serialize
	 *
	 * @return string
	 */
	public function serialize() {
		return $this->value;
	}

	public function __serialize(): array {
		return [ $this->serialize() ];
	}

	/**
	 * @see Serializable::unserialize
	 *
	 * @param string $value
	 */
	public function unserialize( $value ) {
		$this->__construct( $value );
	}

	public function __unserialize( array $data ): void {
		$this->unserialize( $data[0] );
	}

	/**
	 * @see DataValue::getType
	 *
	 * @return string
	 */
	public static function getType() {
		return 'string';
	}

	/**
	 * Returns the string.
	 * @see DataValue::getValue
	 *
	 * @return string
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
	 *  this. This is not guaranteed to be a string!
	 *
	 * @throws IllegalValueException if $data is not in the expected format. Subclasses of
	 *  InvalidArgumentException are expected and properly handled by {@see DataValueDeserializer}.
	 * @return self
	 */
	public static function newFromArray( $data ) {
		return new static( $data );
	}

}
