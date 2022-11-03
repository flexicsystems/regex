<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2022 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 1.0.0
 */

namespace Flexic\Regex;

use Flexic\Regex\Modifier\ModifierInterface;

final class Pattern extends AbstractPattern
{
    public function __construct(
        string $pattern,
        ModifierInterface|string ...$modifier,
    ) {
        $this->setPattern($pattern);
        $this->setModifier($modifier);
    }
}
