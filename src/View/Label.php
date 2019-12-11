<?php declare(strict_types=1); # -*- coding: utf-8 -*-

namespace ChriCo\Fields\View;

use ChriCo\Fields\Element\ElementInterface;
use ChriCo\Fields\Exception\InvalidClassException;
use ChriCo\Fields\LabelAwareInterface;

/**
 * @package ChriCo\Fields\View
 */
class Label implements RenderableElementInterface
{

    use AttributeFormatterTrait;

    /**
     * @param LabelAwareInterface|ElementInterface $element
     *
     * @throws InvalidClassException
     *
     * @return string
     */
    public function render($element): string
    {
        if (! $element instanceof ElementInterface) {
            throw new InvalidClassException(
                sprintf(
                    'The given element does not implement "%s"',
                    ElementInterface::class
                )
            );
        }
        if (! $element instanceof LabelAwareInterface) {
            throw new InvalidClassException(
                sprintf(
                    'The given element "%s" does not implement "%s"',
                    $element->name(),
                    LabelAwareInterface::class
                )
            );
        }

        if ($element->label() === '') {
            return '';
        }

        $attributes = $element->labelAttributes();
        if (! isset($attributes['for'])) {
            $attributes['for'] = $element->id();
        }

        return sprintf(
            '<label %s>%s</label>',
            $this->attributesToString($attributes),
            $element->label()
        );
    }
}
