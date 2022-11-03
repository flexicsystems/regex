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

final class Pattern implements PatternInterface
{
    private readonly string $pattern;

    /**
     * @var array<ModifierInterface>
     */
    private readonly array $modifier;

    public function __construct(
        string $pattern,
        ModifierInterface|string ...$modifier,
    ) {
        $this->pattern = $pattern;
        $this->modifier = \array_filter(\array_map(static function (mixed $modifier) {
            if ($modifier instanceof ModifierInterface) {
                return $modifier;
            }

            if (\is_string($modifier) && \class_exists($modifier) && \is_subclass_of($modifier, ModifierInterface::class)) {
                return new $modifier();
            }

            return null;
        }, $modifier));
    }

    public function __toString(): string
    {
        return \sprintf(
            '/%s/%s',
            $this->pattern,
            \implode('', \array_map(static function (ModifierInterface $modifier) {
                return $modifier->modifier;
            }, $this->modifier)),
        );
    }

    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function getModifier(): array
    {
        return $this->modifier;
    }
}
