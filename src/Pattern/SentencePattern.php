<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2022 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 1.0.0
 */

namespace Flexic\Regex\Pattern;

use Flexic\Regex\AbstractPattern;
use Flexic\Regex\Modifier\MultiLine;
use Flexic\Regex\Modifier\SingleLine;

final class SentencePattern extends AbstractPattern
{
    public function __construct()
    {
        $this->setPattern('^.*[.!?]$');
        $this->setModifier([
            SingleLine::class,
            MultiLine::class,
        ]);
    }
}
