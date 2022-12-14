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

use Flexic\Regex\Flag\MatchAll\MatchAllHandlerFlagInterface;
use Flexic\Regex\PatternInterface;
use Flexic\Regex\RegexException;
use Flexic\Regex\Result\MatchCollection;
use Flexic\RegexBuilder\Pattern as BuilderPattern;

final class MatchAllHandler extends AbstractHandler
{
    /**
     * @param array<int|MatchAllHandlerFlagInterface>|int|MatchAllHandlerFlagInterface $flags
     */
    public function __construct(
        readonly private BuilderPattern|PatternInterface|string $pattern,
        readonly private string $subject,
        readonly private int $offset,
        readonly private int|array|MatchAllHandlerFlagInterface $flags,
    ) {
    }

    /**
     * @throws RegexException
     */
    public function __invoke(): MatchCollection
    {
        $result = \preg_match_all(
            (string) $this->pattern,
            $this->subject,
            $matches,
            $this->reduceFlags($this->flags),
            $this->offset,
        );

        if (false === $result) {
            throw new RegexException('preg_match_all', \sprintf('Error while matching subject "%s" with pattern "%s"', $this->subject, $this->pattern));
        }

        if (0 === $result) {
            return new MatchCollection([]);
        }

        return new MatchCollection($matches);
    }
}
