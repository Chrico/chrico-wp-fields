<?php declare( strict_types=1 ); # -*- coding: utf-8 -*-

namespace ChriCo\Fields;

interface ErrorAwareInterface {

	/**
	 * Returns a list of error messages.
	 *
	 * @return array
	 */
	public function get_errors(): array;

	/**
	 * Set a list of error messages when validation fails.
	 *
	 * @param array
	 */
	public function set_errors( array $errors = [] );

	/**
	 * @return bool
	 */
	public function has_errors(): bool;
}