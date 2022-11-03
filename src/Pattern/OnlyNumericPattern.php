<?php

namespace Flexic\Regex\Pattern;

use Flexic\Regex\AbstractPattern;
use Flexic\Regex\Modifier\MultiLine;
use Flexic\Regex\Modifier\SingleLine;

class OnlyNumericPattern extends AbstractPattern
{
    public function __construct()
    {
        $this->setPattern('^[0-9]+$');
        $this->setModifier([
            SingleLine::class,
            MultiLine::class
        ]);
    }
}