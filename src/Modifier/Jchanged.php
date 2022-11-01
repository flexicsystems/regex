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

final class Jchanged implements ModifierInterface
{
    public string $modifier = 'J';

    public string $name = 'jchanged';

    public string $pcre_name = 'jchanged';
}
