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

use Flexic\Regex\Flag\Grep\GrepHandlerFlagInterface;
use Flexic\Regex\Flag\Match\MatchHandlerFlagInterface;
use Flexic\Regex\Flag\MatchAll\MatchAllHandlerFlagInterface;
use Flexic\Regex\Flag\Split\SplitHandlerFlagInterface;
use Flexic\Regex\Handler\FilterHandler;
use Flexic\Regex\Handler\GrepHandler;
use Flexic\Regex\Handler\MatchAllHandler;
use Flexic\Regex\Handler\MatchHandler;
use Flexic\Regex\Handler\ReplaceHandler;
use Flexic\Regex\Handler\SplitHandler;
use Flexic\Regex\Result\MatchCollection;
use Flexic\RegexBuilder\Pattern as BuilderPattern;

final class Regex implements RegexInterface
{
    /**
     * @throws RegexException
     */
    public function match(
        BuilderPattern|PatternInterface|string $pattern,
        string $subject,
        int $offset = 0,
        array|MatchHandlerFlagInterface|int ...$flags,
    ): MatchCollection {
        return (new MatchHandler(
            pattern: $pattern,
            subject: $subject,
            offset: $offset,
            flags: $flags,
        ))();
    }

    /**
     * @throws RegexException
     */
    public function matchAll(
        BuilderPattern|PatternInterface|string $pattern,
        string $subject,
        int $offset = 0,
        array|MatchAllHandlerFlagInterface|int ...$flags,
    ): MatchCollection {
        return (new MatchAllHandler(
            pattern: $pattern,
            subject: $subject,
            offset: $offset,
            flags: $flags,
        ))();
    }

    /**
     * @throws RegexException
     */
    public function split(
        BuilderPattern|PatternInterface|string $pattern,
        string $subject,
        int $limit = -1,
        array|SplitHandlerFlagInterface|int ...$flags,
    ): MatchCollection {
        return (new SplitHandler(
            pattern: $pattern,
            subject: $subject,
            limit: $limit,
            flags: $flags,
        ))();
    }

    /**
     * @throws RegexException
     */
    public function grep(
        BuilderPattern|PatternInterface|string $pattern,
        array $input,
        array|GrepHandlerFlagInterface|int ...$flags,
    ): MatchCollection {
        return (new GrepHandler(
            pattern: $pattern,
            input: $input,
            flags: $flags,
        ))();
    }

    public function filter(
        BuilderPattern|PatternInterface|string|array $pattern,
        string|array $replacement,
        array|string $subject,
        int $limit = -1,
        ?int &$count = null,
    ): string|array|null {
        return (new FilterHandler(
            pattern: $pattern,
            replacement: $replacement,
            subject: $subject,
            limit: $limit,
        ))(count: $count);
    }

    public function replace(
        BuilderPattern|PatternInterface|string|array $pattern,
        string|array $replacement,
        string|array $subject,
        int $limit = -1,
        ?int &$count = null,
    ): string|array|null {
        return (new ReplaceHandler(
            pattern: $pattern,
            replacement: $replacement,
            subject: $subject,
            limit: $limit,
        ))(count: $count);
    }
}
