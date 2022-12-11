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
use Flexic\RegexBuilder\Pattern as BuilderPattern;

final class SplitHandler extends AbstractHandler
{
    /**
     * @param array<int|SplitHandlerFlagInterface>|int|SplitHandlerFlagInterface $flags
     */
    public function __construct(
        readonly private BuilderPattern|PatternInterface|string $pattern,
        readonly private string $subject,
        readonly private int $limit,
        readonly private int|array|SplitHandlerFlagInterface $flags,
    ) {
    }

    /**
     * @throws RegexException
     */
    public function __invoke(): MatchCollection
    {
        $matches = \preg_split(
            (string) $this->pattern,
            $this->subject,
            $this->limit,
            $this->reduceFlags($this->flags),
        );

        if (false === $matches) {
            throw new RegexException('preg_split', \sprintf('Error while splitting subject "%s" with pattern "%s"', $this->subject, $this->pattern));
        }

        return new MatchCollection($matches);
    }
}
