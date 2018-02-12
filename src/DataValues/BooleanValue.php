<?php

namespace DataValues;

/**
 * Class representing a boolean value.
 *
 * @since 0.1
 *
 * @license GPL-2.0+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class BooleanValue extends DataValueObject {

	private $value;

	/**
	 * @param bool $value
	 *
	 * @throws IllegalValueException
	 */
	public function __construct( $value ) {
		if ( !is_bool( $value ) ) {
			throw new IllegalValueException( 'Can only construct BooleanValue from booleans' );
		}

		$this->value = $value;
	}

	/**
	 * @see Serializable::serialize
	 *
	 * @return string '0' for false, '1' for true.
	 */
	public function serialize() {
		return $this->value ? '1' : '0';
	}

	/**
	 * @see Serializable::unserialize
	 *
	 * @param string $value '0' for false, '1' for true.
	 */
	public function unserialize( $value ) {
		$this->value = $value === '1';
	}

	/**
	 * @see DataValue::getType
	 *
	 * @return string
	 */
	public static function getType() {
		return 'boolean';
	}

	/**
	 * @see DataValue::getSortKey
	 *
	 * @return int 0 for false, 1 for true.
	 */
	public function getSortKey() {
		return $this->value ? 1 : 0;
	}

	/**
	 * Returns the boolean.
	 * @see DataValue::getValue
	 *
	 * @return bool
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
	 *  this. This is not guaranteed to be a boolean!
	 *
	 * @throws IllegalValueException if $data is not in the expected format. Subclasses of
	 *  InvalidArgumentException are expected and properly handled by {@see DataValueDeserializer}.
	 * @return self
	 */
	public static function newFromArray( $data ) {
		return new static( $data );
	}

}
