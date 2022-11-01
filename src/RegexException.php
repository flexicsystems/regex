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

final class RegexException extends \Exception
{
    protected string $action;

    public function __construct(
        string $action,
        string $message = '',
        int $code = 500,
    ) {
        $this->action = $action;
        parent::__construct(
            $message,
            $code,
            null,
        );
    }

    public function getAction(): string
    {
        return $this->action;
    }
}
