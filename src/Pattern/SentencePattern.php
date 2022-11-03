<?php

namespace Flexic\Regex\Pattern;

use Flexic\Regex\AbstractPattern;
use Flexic\Regex\Modifier\MultiLine;
use Flexic\Regex\Modifier\SingleLine;

class SentencePattern extends AbstractPattern
{
    public function __construct()
    {
        $this->setPattern('^.*[.!?]$');
        $this->setModifier([
            SingleLine::class,
            MultiLine::class
        ]);
    }
}