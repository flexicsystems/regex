<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2022 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 1.0.0
 */

namespace Flexic\Regex\Modifier;

final class Unicode implements ModifierInterface
{
    public string $modifier = 'u';

    public string $name = 'unicode';

    public string $pcre_name = 'utf8';
}
