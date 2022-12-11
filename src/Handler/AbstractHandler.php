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

use Flexic\Regex\Flag\FlagInterface;
use Flexic\Regex\PatternInterface;
use Flexic\RegexBuilder\Pattern as BuilderPattern;

abstract class AbstractHandler implements HandlerInterface
{
    protected function reduceFlags(
        int|array|FlagInterface $flags,
    ): int {
        if (\is_int($flags)) {
            return $flags;
        }

        if ($flags instanceof FlagInterface) {
            return $flags->getPregFlag();
        }

        return \array_sum(
            \array_map(
                static function (mixed $flag): int {
                    if (\is_int($flag)) {
                        return $flag;
                    }

                    if ($flag instanceof FlagInterface) {
                        return $flag->getPregFlag();
                    }

                    return 0;
                },
                $flags,
            ),
        );
    }

    /**
     * @return array<string>
     */
    protected function reducePattern(BuilderPattern|PatternInterface|string|array $pattern): array
    {
        if (\is_string($pattern)) {
            return [$pattern];
        }

        if ($pattern instanceof PatternInterface) {
            return [(string) $pattern];
        }

        if ($pattern instanceof BuilderPattern) {
            return [(string) $pattern];
        }

        return \array_filter(\array_map(static function (mixed $pattern) {
            if (\is_string($pattern)) {
                return $pattern;
            }

            if ($pattern instanceof PatternInterface) {
                return (string) $pattern;
            }

            if ($pattern instanceof BuilderPattern) {
                return (string) $pattern;
            }

            return null;
        }, $pattern));
    }
}
