<?php

namespace Flexic\Regex;

use Flexic\Regex\Modifier\ModifierInterface;

interface PatternInterface
{
    /**
     * @param string $pattern The pattern string to match
     * @param ModifierInterface|string ...$modifier All modifier to use
     */
    public function __construct(
        string $pattern,
        ModifierInterface|string ...$modifier,
    );

    /**
     * Convert the pattern to a valid regex pattern
     *
     * @return string
     */
    public function __toString(): string;

    /**
     * Return the pattern string.
     *
     * @return string
     */
    public function getPattern(): string;

    /**
     * The array of all modifier what are used.
     *
     * @return array
     */
    public function getModifier(): array;
}