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
use Flexic\Regex\Result\MatchCollection;

final class StaticRegex implements RegexInterface
{
    public static function match(
        PatternInterface|string $pattern,
        string $subject,
        int $offset = 0,
        array|MatchHandlerFlagInterface|int ...$flags,
    ): MatchCollection {
        return (new Handler\MatchHandler(
            pattern: $pattern,
            subject: $subject,
            offset: $offset,
            flags: $flags,
        ))();
    }

    public static function matchAll(
        PatternInterface|string $pattern,
        string $subject,
        int $offset = 0,
        array|MatchAllHandlerFlagInterface|int ...$flags,
    ): MatchCollection {
        return (new Handler\MatchAllHandler(
            pattern: $pattern,
            subject: $subject,
            offset: $offset,
            flags: $flags,
        ))();
    }

    public static function split(
        PatternInterface|string $pattern,
        string $subject,
        int $limit = -1,
        array|SplitHandlerFlagInterface|int ...$flags,
    ): MatchCollection {
        return (new Handler\SplitHandler(
            pattern: $pattern,
            subject: $subject,
            limit: $limit,
            flags: $flags,
        ))();
    }

    public static function grep(
        PatternInterface|string $pattern,
        array $input,
        array|GrepHandlerFlagInterface|int ...$flags,
    ): MatchCollection {
        return (new Handler\GrepHandler(
            pattern: $pattern,
            input: $input,
            flags: $flags,
        ))();
    }

    public static function filter(
        PatternInterface|string|array $pattern,
        string|array $replacement,
        array|string $subject,
        int $limit = -1,
        ?int &$count = null,
    ): string|array|null {
        return (new Handler\FilterHandler(
            pattern: $pattern,
            replacement: $replacement,
            subject: $subject,
            limit: $limit,
        ))(count: $count);
    }

    public static function replace(
        PatternInterface|string|array $pattern,
        string|array $replacement,
        string|array $subject,
        int $limit = -1,
        ?int &$count = null,
    ): string|array|null {
        return (new Handler\ReplaceHandler(
            pattern: $pattern,
            replacement: $replacement,
            subject: $subject,
            limit: $limit,
        ))(count: $count);
    }
}
