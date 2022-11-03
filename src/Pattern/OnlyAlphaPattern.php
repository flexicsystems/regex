<?php

namespace Flexic\Regex\Pattern;

use Flexic\Regex\AbstractPattern;
use Flexic\Regex\Modifier\MultiLine;
use Flexic\Regex\Modifier\SingleLine;

class OnlyAlphaPattern extends AbstractPattern
{
    public function __construct()
    {
        $this->setPattern('^[a-zA-Z]+$');
        $this->setModifier([
            SingleLine::class,
            MultiLine::class
        ]);
    }
}