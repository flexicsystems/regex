<?php

namespace Flexic\Regex;

use Flexic\Regex\Flag\Grep\GrepHandlerFlagInterface;
use Flexic\Regex\Flag\Match\MatchHandlerFlagInterface;
use Flexic\Regex\Flag\Split\SplitHandlerFlagInterface;
use Flexic\Regex\Result\MatchCollection;

interface RegexInterface
{
    public static function match(
        PatternInterface|string $pattern,
        string $subject,
        int $offset = 0,
        array|MatchHandlerFlagInterface|int ...$flags,
    ): MatchCollection;

    public static function matchAll(
        PatternInterface|string $pattern,
        string $subject,
        int $offset = 0,
        array|MatchHandlerFlagInterface|int ...$flags,
    ): MatchCollection;

    public static function split(
        PatternInterface|string $pattern,
        string $subject,
        int $limit = -1,
        array|SplitHandlerFlagInterface|int ...$flags,
    ): MatchCollection;

    public static function grep(
        PatternInterface|string $pattern,
        array $input,
        array|GrepHandlerFlagInterface|int ...$flags,
    ): MatchCollection;

    public static function filter(
        PatternInterface|string|array $pattern,
        string|array $replacement,
        array|string $subject,
        int $limit = -1,
        ?int &$count = null,
    ): string|array|null;

    public static function replace(
        PatternInterface|string|array $pattern,
        string|array $replacement,
        string|array $subject,
        int $limit = -1,
        ?int &$count = null,
    ): string|array|null;
}