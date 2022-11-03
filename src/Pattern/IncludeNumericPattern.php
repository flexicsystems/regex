<?php

namespace Flexic\Regex\Pattern;

use Flexic\Regex\AbstractPattern;

class IncludeNumericPattern extends AbstractPattern
{
    public function __construct()
    {
        $this->setPattern('\d+');
        $this->setModifier([]);
    }
}