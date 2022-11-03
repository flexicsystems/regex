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

use Flexic\Regex\Flag\GrepHandler\GrepHandlerFlagInterface;
use Flexic\Regex\PatternInterface;
use Flexic\Regex\RegexException;
use Flexic\Regex\Result\MatchCollection;

final class GrepHandler extends AbstractHandler
{
    /**
     * @param array<GrepHandlerFlagInterface|int>|GrepHandlerFlagInterface|int $flags
     */
    public function __invoke(
        PatternInterface|string $pattern,
        array $input,
        int|array|GrepHandlerFlagInterface $flags,
    ): MatchCollection {
        $result = \preg_grep(
            (string) $pattern,
            $input,
            $this->reduceFlags($flags),
        );

        if (false === $result) {
            throw new RegexException('preg_grep', \sprintf('Error while grep input with pattern "%s"', $pattern));
        }

        return new MatchCollection($result);
    }
}
