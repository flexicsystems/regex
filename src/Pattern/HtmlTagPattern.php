<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2022 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 1.0.0
 */

namespace Flexic\Regex\Pattern;

use Flexic\Regex\AbstractPattern;
use Flexic\Regex\Modifier\MultiLine;
use Flexic\Regex\Modifier\SingleLine;
use Flexic\Regex\Modifier\Unicode;

final class HtmlTagPattern extends AbstractPattern
{
    public function __construct(string $htmlTag)
    {
        $this->setPattern(\sprintf('<([ ]+)?(%s)(.*?)>(.*)?<([ ]+)?\/(%s)(.*?)>', $htmlTag, $htmlTag));
        $this->setModifier([
            MultiLine::class,
            SingleLine::class,
            Unicode::class,
        ]);
    }
}
