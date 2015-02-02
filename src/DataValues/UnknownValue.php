<?php

namespace DataValues;

/**
 * Class representing a value of unknown type.
 * This is in essence a null-wrapper, useful for instance for null-parsers.
 *
 * @since 0.1
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
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
	 * @since 0.1
	 *
	 * @return string
	 */
	public function serialize() {
		return serialize( $this->value );
	}

	/**
	 * @see Serializable::unserialize
	 *
	 * @since 0.1
	 *
	 * @param string $value
	 *
	 * @return StringValue
	 */
	public function unserialize( $value ) {
		$this->__construct( unserialize( $value ) );
	}

	/**
	 * @see DataValue::getType
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public static function getType() {
		return 'unknown';
	}

	/**
	 * @see DataValue::getSortKey
	 *
	 * @since 0.1
	 *
	 * @return int Always 0 in this implementation.
	 */
	public function getSortKey() {
		return 0;
	}

	/**
	 * Returns the value.
	 * @see DataValue::getValue
	 *
	 * @since 0.1
	 *
	 * @return mixed
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * @see Comparable::equals
	 *
	 * @since 0.1
	 *
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
	 * Constructs a new instance of the DataValue from the provided data.
	 * This can round-trip with @see getArrayValue
	 *
	 * @since 0.1
	 *
	 * @param mixed $data
	 *
	 * @return UnknownValue
	 */
	public static function newFromArray( $data ) {
		return new static( $data );
	}

}
