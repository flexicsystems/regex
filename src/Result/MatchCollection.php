<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2022 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 1.0.0
 */

namespace Flexic\Regex\Result;

final class MatchCollection
{
    /**
     * @var array<MatchCollection|MatchItem>
     */
    private readonly array $matches;

    public function __construct(array $matches)
    {
        $this->matches = \array_map(static function (mixed $key, mixed $match): MatchItem|MatchCollection {
            if (\is_array($match)) {
                return new self($match);
            }

            return new MatchItem($key, $match);
        }, \array_keys($matches), $matches);
    }

    public function hasMatches(): bool
    {
        return \count($this->matches) > 0;
    }

    public function count(): int
    {
        return \count($this->matches);
    }

    public function all(): array
    {
        return $this->matches;
    }

    public function first(): MatchItem|MatchCollection|null
    {
        return $this->matches[0] ?? null;
    }

    public function last(): MatchItem|MatchCollection|null
    {
        return $this->matches[\count($this->matches) - 1] ?? null;
    }

    public function position(int $index): MatchItem|MatchCollection|null
    {
        return $this->get($index);
    }

    public function get(int $index): MatchItem|MatchCollection|null
    {
        return $this->matches[$index] ?? null;
    }

    public function iterate(callable $callback): void
    {
        foreach ($this->matches as $match) {
            $callback($match);
        }
    }

    public function map(callable $callback): array
    {
        return \array_map($callback, $this->matches);
    }

    public function filter(callable $callback): array
    {
        return \array_filter($this->matches, $callback);
    }

    public function reduce(callable $callback, mixed $initial = null): mixed
    {
        return \array_reduce($this->matches, $callback, $initial);
    }

    public function walk(callable $callback): void
    {
        $instance = $this->matches;
        \array_walk($instance, $callback);
    }

    public function between(int $start, int $end): array
    {
        return \array_slice($this->matches, $start, $end);
    }

    public function asArray(): array
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        return \array_map(static function (MatchItem|MatchCollection $match): mixed {
            if ($match instanceof self) {
                return $match->asArray();
            }

            return $match->value();
        }, $this->matches);
    }
}
