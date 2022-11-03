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
use Flexic\Regex\Flag\Split\SplitHandlerFlagInterface;
use Flexic\Regex\Handler\FilterHandler;
use Flexic\Regex\Handler\GrepHandler;
use Flexic\Regex\Handler\MatchAllHandler;
use Flexic\Regex\Handler\MatchHandler;
use Flexic\Regex\Handler\ReplaceHandler;
use Flexic\Regex\Handler\SplitHandler;
use Flexic\Regex\Result\MatchCollection;

final class Regex
{
    private readonly MatchHandler $matchHandler;

    private readonly MatchAllHandler $matchAllHandler;

    private readonly SplitHandler $splitHandler;

    private readonly GrepHandler $grepHandler;

    private readonly FilterHandler $filterHandler;

    private readonly ReplaceHandler $replaceHandler;

    public function __construct()
    {
        $this->matchHandler = new MatchHandler();
        $this->matchAllHandler = new MatchAllHandler();
        $this->splitHandler = new SplitHandler();
        $this->grepHandler = new GrepHandler();
        $this->filterHandler = new FilterHandler();
        $this->replaceHandler = new ReplaceHandler();
    }

    public function match(
        PatternInterface|string $pattern,
        string $subject,
        int $offset = 0,
        array|MatchHandlerFlagInterface|int ...$flags,
    ): MatchCollection {
        return $this->matchHandler->__invoke(
            pattern: $pattern,
            subject: $subject,
            offset: $offset,
            flags: $flags,
        );
    }

    public function matchAll(
        PatternInterface|string $pattern,
        string $subject,
        int $offset = 0,
        array|MatchHandlerFlagInterface|int ...$flags,
    ): MatchCollection {
        return $this->matchAllHandler->__invoke(
            pattern: $pattern,
            subject: $subject,
            offset: $offset,
            flags: $flags,
        );
    }

    public function split(
        PatternInterface|string $pattern,
        string $subject,
        int $limit = -1,
        array|SplitHandlerFlagInterface|int ...$flags,
    ): MatchCollection {
        return $this->splitHandler->__invoke(
            pattern: $pattern,
            subject: $subject,
            limit: $limit,
            flags: $flags,
        );
    }

    public function grep(
        PatternInterface|string $pattern,
        array $input,
        array|GrepHandlerFlagInterface|int ...$flags,
    ): MatchCollection {
        return $this->grepHandler->__invoke(
            pattern: $pattern,
            input: $input,
            flags: $flags,
        );
    }

    public function filter(
        PatternInterface|string|array $pattern,
        string|array $replacement,
        array|string $subject,
        int $limit = -1,
        ?int &$count = null,
    ): string|array|null {
        return $this->filterHandler->__invoke(
            pattern: $pattern,
            replacement: $replacement,
            subject: $subject,
            limit: $limit,
            count: $count,
        );
    }

    public function replace(
        PatternInterface|string|array $pattern,
        string|array $replacement,
        string|array $subject,
        int $limit = -1,
        ?int &$count = null,
    ): string|array|null {
        return $this->replaceHandler->__invoke(
            pattern: $pattern,
            replacement: $replacement,
            subject: $subject,
            limit: $limit,
            count: $count,
        );
    }
}
