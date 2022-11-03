<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2022 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 1.0.0
 */

namespace Flexic\Regex\Handler;

use Flexic\Regex\Pattern;
use Flexic\Regex\PatternInterface;

final class FilterHandler extends AbstractHandler
{
    public function __invoke(
        PatternInterface|string|array $pattern,
        string|array $replacement,
        string|array $subject,
        int $limit,
        ?int &$count = null,
    ): string|array|null {
        return \preg_filter(
            $this->reducePattern($pattern),
            $replacement,
            $subject,
            $limit,
            $count,
        );
    }
}
