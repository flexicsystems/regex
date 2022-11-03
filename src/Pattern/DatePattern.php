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

final class DatePattern extends AbstractPattern
{
    public function __construct()
    {
        $this->setPattern('([0-9]{4})-([0-9]{2})-([0-9]{2})');
        $this->setModifier([]);
    }
}
