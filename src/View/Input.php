<?php declare( strict_types=1 ); # -*- coding: utf-8 -*-

namespace ChriCo\Fields\View;

use ChriCo\Fields\Element\ElementInterface;

/**
 * Class Input
 *
 * @package ChriCo\Fields\View
 */
class Input implements RenderableElementInterface {

	use AttributeFormatterTrait;

	/**
	 * @param ElementInterface $element
	 *
	 * @return string
	 */
	public function render( ElementInterface $element ): string {

		$attributes = $element->get_attributes();

		return sprintf(
			'<input %s />',
			$this->get_attributes_as_string( $attributes )
		);
	}
}
