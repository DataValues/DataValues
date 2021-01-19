<?php

declare( strict_types = 1 );

namespace DataValues;

/**
 * Class representing a value of unknown type.
 * This is in essence a null-wrapper, useful for instance for null-parsers.
 */
class UnknownValue extends DataValueObject {

	/**
	 * @var mixed
	 */
	private $value;

	/**
	 * @param mixed $value
	 */
	public function __construct( $value ) {
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
		return 'unknown';
	}

	/**
	 * Returns the value.
	 * @see DataValue::getValue
	 *
	 * @return mixed
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * @param mixed $target
	 *
	 * @return bool
	 */
	public function equals( $target ) {
		if ( $this === $target ) {
			return true;
		}

		return $target instanceof self
			&& $this->value === $target->value;
	}

	/**
	 * Constructs a new instance from the provided data. Required for {@see DataValueDeserializer}.
	 * This is expected to round-trip with {@see getArrayValue}.
	 *
	 * @deprecated since 1.1. Static DataValue::newFromArray constructors like this are
	 *  underspecified (not in the DataValue interface), and misleadingly named (should be named
	 *  newFromArrayValue). Instead, use DataValue builder callbacks in {@see DataValueDeserializer}.
	 *
	 * @param mixed $data
	 *
	 * @return self
	 */
	public static function newFromArray( $data ) {
		return new static( $data );
	}

}
