<?php

namespace Flexic\Regex;

use Flexic\Regex\Modifier\ModifierInterface;

class Pattern extends AbstractPattern
{
    public function __construct(
        string $pattern,
        ModifierInterface|string ...$modifier,
    ) {
        $this->setPattern($pattern);
        $this->setModifier($modifier);
    }
}