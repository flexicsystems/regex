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

final class MatchItem
{
    private mixed $key;

    private mixed $value;

    public function __construct(
        mixed $key,
        mixed $value,
    ) {
        $this->key = $key;
        $this->value = $value;
    }

    public function key(): mixed
    {
        return $this->key;
    }

    public function value(): mixed
    {
        return $this->value;
    }
}
