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

use Flexic\Regex\PatternInterface;
use Flexic\RegexBuilder\Pattern as BuilderPattern;

final class FilterHandler extends AbstractHandler
{
    public function __construct(
        readonly private BuilderPattern|PatternInterface|string|array $pattern,
        readonly private string|array $replacement,
        readonly private string|array $subject,
        readonly private int $limit,
    ) {
    }

    public function __invoke(?int &$count = null): string|array|null
    {
        return \preg_filter(
            $this->reducePattern($this->pattern),
            $this->replacement,
            $this->subject,
            $this->limit,
            $count,
        );
    }
}
