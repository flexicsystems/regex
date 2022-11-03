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

interface PatternInterface
{
    /**
     * @param string                   $pattern     The pattern string to match
     * @param ModifierInterface|string ...$modifier All modifier to use
     */
    public function __construct(
        string $pattern,
        ModifierInterface|string ...$modifier,
    );

    /**
     * Convert the pattern to a valid regex pattern.
     */
    public function __toString(): string;

    /**
     * Return the pattern string.
     */
    public function getPattern(): string;

    /**
     * The array of all modifier what are used.
     */
    public function getModifier(): array;
}
