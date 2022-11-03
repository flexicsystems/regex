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

use Flexic\Regex\Flag\SplitHandler\SplitHandlerFlagInterface;
use Flexic\Regex\Pattern;
use Flexic\Regex\PatternInterface;
use Flexic\Regex\RegexException;
use Flexic\Regex\Result\MatchCollection;

final class SplitHandler extends AbstractHandler
{
    /**
     * @param array<int|SplitHandlerFlagInterface>|int|SplitHandlerFlagInterface $flags
     */
    public function __invoke(
        PatternInterface|string $pattern,
        string $subject,
        int $limit,
        int|array|SplitHandlerFlagInterface $flags,
    ): MatchCollection {
        $matches = \preg_split(
            (string) $pattern,
            $subject,
            $limit,
            $this->reduceFlags($flags),
        );

        if (false === $matches) {
            throw new RegexException('preg_split', \sprintf('Error while splitting subject "%s" with pattern "%s"', $subject, $pattern));
        }

        return new MatchCollection($matches);
    }
}
