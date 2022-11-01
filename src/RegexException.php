<?php

namespace Flexic\Regex;

class RegexException extends \Exception
{
    protected string $action;

    public function __construct(
        string $action,
        string $message = "",
        int $code = 500
    ) {
        $this->action = $action;
        parent::__construct(
            $message,
            $code,
            null
        );
    }

    public function getAction(): string
    {
        return $this->action;
    }
}