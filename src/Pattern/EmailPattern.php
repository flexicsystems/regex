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

final class EmailPattern extends AbstractPattern
{
    public function __construct()
    {
        $this->setPattern('^([a-zA-Z0-9_.+-]+)@([a-zA-Z0-9-]+)(.([a-zA-Z0-9-]+)){1,}$');
        $this->setModifier([
            MultiLine::class,
        ]);
    }
}
