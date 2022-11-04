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

use Flexic\Regex\Modifier\ModifierInterface;

abstract class AbstractPattern implements PatternInterface
{
    private string $pattern;

    /**
     * @var array<ModifierInterface|string>
     */
    private array $modifier;

    public function __toString(): string
    {
        return \sprintf(
            '/%s/%s',
            $this->pattern,
            \implode('', \array_map(static function (ModifierInterface|string $modifier) {
                if ($modifier instanceof ModifierInterface) {
                    return $modifier->modifier;
                }

                return $modifier;
            }, $this->modifier)),
        );
    }

    public function setPattern(string $pattern): void
    {
        $this->pattern = $pattern;
    }

    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function setModifier(array $modifier): void
    {
        $this->modifier = \array_filter(\array_map(static function (mixed $modifier) {
            if ($modifier instanceof ModifierInterface) {
                return $modifier;
            }

            if (\is_string($modifier) && \class_exists($modifier) && \is_subclass_of($modifier, ModifierInterface::class)) {
                return new $modifier();
            }

            if (\is_string($modifier) && \mb_strlen($modifier) === 1) {
                return $modifier;
            }

            return null;
        }, $modifier));
    }

    public function getModifier(): array
    {
        return $this->modifier;
    }
}
