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

interface PatternInterface
{
    /**
     * Convert the pattern to a valid regex pattern.
     */
    public function __toString(): string;

    /**
     * Set the pattern string.
     */
    public function setPattern(string $pattern): void;

    /**
     * Return the pattern string.
     */
    public function getPattern(): string;

    /**
     * Set the array of used modifier.
     */
    public function setModifier(array $modifier): void;

    /**
     * Return the array of all modifier what are used.
     */
    public function getModifier(): array;
}
