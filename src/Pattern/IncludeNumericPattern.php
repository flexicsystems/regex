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

final class IncludeNumericPattern extends AbstractPattern
{
    public function __construct()
    {
        $this->setPattern('\d+');
        $this->setModifier([]);
    }
}
