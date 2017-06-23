<?php

namespace DataValues;

/**
 * Base for objects that represent a single data value.
 *
 * @since 0.1
 *
 * @license GPL-2.0+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
abstract class DataValueObject implements DataValue {

	/**
	 * @see Hashable::getHash
	 *
	 * @return string
	 */
	public function getHash() {
		return md5( serialize( $this ) );
	}

	/**
	 * @see Comparable::equals
	 *
	 * @param mixed $target
	 *
	 * @return bool
	 */
	public function equals( $target ) {
		if ( $this === $target ) {
			return true;
		}

		return is_object( $target )
			&& get_called_class() === get_class( $target )
			&& serialize( $this ) === serialize( $target );
	}

	/**
	 * @see DataValue::getCopy
	 *
	 * @return DataValue
	 */
	public function getCopy() {
		return unserialize( serialize( $this ) );
	}

	/**
	 * @see DataValue::getArrayValue
	 *
	 * @return mixed
	 */
	public function getArrayValue() {
		return $this->getValue();
	}

	/**
	 * @see DataValue::toArray
	 *
	 * @return array
	 */
	public function toArray() {
		return [
			'value' => $this->getArrayValue(),
			'type' => $this->getType(),
		];
	}

	/**
	 * Checks that $data is an array and contains the given fields.
	 *
	 * @param mixed $data
	 * @param string[] $fields
	 *
	 * @todo: this should be removed once we got rid of all the static newFromArray() methods.
	 *
	 * @throws IllegalValueException
	 */
	protected static function requireArrayFields( $data, array $fields ) {
		if ( !is_array( $data ) ) {
			throw new IllegalValueException( "array expected" );
		}

		foreach ( $fields as $field ) {
			if ( !array_key_exists( $field, $data ) ) {
				throw new IllegalValueException( "$field field required" );
			}
		}
	}

}
