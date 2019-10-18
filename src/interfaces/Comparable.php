<?php

interface Comparable {

	/**
	 * Returns if the provided value is equal to the object or not.
	 *
	 * @since 0.1
	 *
	 * @param mixed $target
	 *
	 * @return bool
	 */
	public function equals( $target );

}
