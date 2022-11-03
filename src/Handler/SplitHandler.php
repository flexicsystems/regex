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

use Flexic\Regex\Flag\Split\SplitHandlerFlagInterface;
use Flexic\Regex\PatternInterface;
use Flexic\Regex\RegexException;
use Flexic\Regex\Result\MatchCollection;

final class SplitHandler extends AbstractHandler
{
    /**
     * @param array<int|SplitHandlerFlagInterface>|int|SplitHandlerFlagInterface $flags
     */
    public function __construct(
        readonly private PatternInterface|string $pattern,
        readonly private string $subject,
        readonly private int $limit,
        readonly private int|array|SplitHandlerFlagInterface $flags,
    ) {
    }

    public function __invoke(): MatchCollection
    {
        $matches = \preg_split(
            (string) $this->pattern,
            $this->subject,
            $this->limit,
            $this->reduceFlags($this->flags),
        );

        if (false === $matches) {
            throw new RegexException('preg_split', \sprintf('Error while splitting subject "%s" with pattern "%s"', $subject, $pattern));
        }

        return new MatchCollection($matches);
    }
}
