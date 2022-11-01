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

use Flexic\Regex\Flag\MatchHandler\MatchHandlerFlagInterface;
use Flexic\Regex\Pattern;
use Flexic\Regex\RegexException;
use Flexic\Regex\Result\MatchCollection;

final class MatchAllHandler extends AbstractHandler
{
    /**
     * @param array<int|MatchHandlerFlagInterface>|int|MatchHandlerFlagInterface $flags
     */
    public function __invoke(
        Pattern|string $pattern,
        string $subject,
        int $offset,
        int|array|MatchHandlerFlagInterface $flags,
    ): MatchCollection {
        $result = \preg_match_all(
            (string) $pattern,
            $subject,
            $matches,
            $this->reduceFlags($flags),
            $offset,
        );

        if (false === $result) {
            throw new RegexException('preg_match_all', \sprintf('Error while matching subject "%s" with pattern "%s"', $subject, $pattern));
        }

        if (0 === $result) {
            return new MatchCollection([]);
        }

        return new MatchCollection($matches);
    }
}