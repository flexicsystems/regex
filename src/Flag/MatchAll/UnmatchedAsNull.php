<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2022 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 1.0.0
 */

namespace Flexic\Regex\Flag\MatchAll;

final class UnmatchedAsNull implements MatchAllHandlerFlagInterface
{
    public function getPregFlag(): int
    {
        return \PREG_UNMATCHED_AS_NULL;
    }
}
