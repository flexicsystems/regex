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

use Flexic\Regex\Flag\Grep\GrepHandlerFlagInterface;
use Flexic\Regex\PatternInterface;
use Flexic\Regex\RegexException;
use Flexic\Regex\Result\MatchCollection;

final class GrepHandler extends AbstractHandler
{
    /**
     * @param array<GrepHandlerFlagInterface|int>|GrepHandlerFlagInterface|int $flags
     */
    public function __construct(
        readonly private PatternInterface|string $pattern,
        readonly private array $input,
        readonly private int|array|GrepHandlerFlagInterface $flags,
    ) {
    }

    public function __invoke(): MatchCollection
    {
        $result = \preg_grep(
            (string) $this->pattern,
            $this->input,
            $this->reduceFlags($this->flags),
        );

        if (false === $result) {
            throw new RegexException('preg_grep', \sprintf('Error while grep input with pattern "%s"', $pattern));
        }

        return new MatchCollection($result);
    }
}
