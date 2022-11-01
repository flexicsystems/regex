<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2022 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 1.0.0
 */

namespace Flexic\Regex\Test;

/**
 * @internal
 *
 * @covers \Flexic\Regex\Pattern
 */
final class PatternTest extends AbstractTestCase
{
    public function testIfCanSetupAndStringify(): void
    {
        $pattern = new \Flexic\Regex\Pattern(
            '[a-zA-Z0-9]',
            \Flexic\Regex\Modifier\SingleLine::class,
            new \Flexic\Regex\Modifier\MultiLine(),
            '',
        );

        self::assertInstanceOf(\Flexic\Regex\Pattern::class, $pattern);
        self::assertSame('[a-zA-Z0-9]', $pattern->getPattern());
        self::assertContains(\Flexic\Regex\Modifier\SingleLine::class, \array_map('get_class', $pattern->getModifier()));
        self::assertContains(\Flexic\Regex\Modifier\MultiLine::class, \array_map('get_class', $pattern->getModifier()));
        self::assertCount(2, $pattern->getModifier());

        self::assertSame('/[a-zA-Z0-9]/sm', (string) $pattern);
        self::assertSame('/[a-zA-Z0-9]/sm', $pattern->__toString());
    }
}