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

use Flexic\Regex\Modifier\Insensitive;
use Flexic\Regex\Modifier\ModifierInterface;
use Flexic\Regex\Modifier\MultiLine;
use Flexic\Regex\Modifier\SingleLine;

/**
 * @internal
 *
 * @covers \Flexic\Regex\Pattern
 * @covers \Flexic\Regex\AbstractPattern
 */
final class PatternTest extends AbstractTestCase
{
    public function testIfCanSetupAndStringify(): void
    {
        $pattern = new \Flexic\Regex\Pattern(
            '[a-zA-Z0-9]',
        );

        self::assertInstanceOf(\Flexic\Regex\Pattern::class, $pattern);
        self::assertInstanceOf(\Flexic\Regex\AbstractPattern::class, $pattern);
        self::assertSame('[a-zA-Z0-9]', $pattern->getPattern());
        self::assertCount(0, $pattern->getModifier());
        self::assertSame('/[a-zA-Z0-9]/', (string) $pattern);
        self::assertSame('/[a-zA-Z0-9]/', $pattern->__toString());
    }

    /** @dataProvider modifierProvider */
    public function testCanSetupWithModifier(array|string|ModifierInterface $modifier): void
    {
        $pattern = new \Flexic\Regex\Pattern(
            '[a-zA-Z0-9]',
            $modifier,
        );

        self::assertInstanceOf(\Flexic\Regex\Pattern::class, $pattern);
        self::assertInstanceOf(\Flexic\Regex\AbstractPattern::class, $pattern);
        self::assertSame('[a-zA-Z0-9]', $pattern->getPattern());

        if (\is_array($modifier)) {
            self::assertCount(\count($modifier), $pattern->getModifier());
        } elseif ('' === $modifier) {
            self::assertCount(0, $pattern->getModifier());
        } else {
            self::assertCount(1, $pattern->getModifier());
        }
    }

    public function modifierProvider(): array
    {
        return [
            [['s', 'm', 'i']],
            ['s'],
            [''],
            [Insensitive::class],
            [[MultiLine::class, SingleLine::class]],
            [new Insensitive()],
            [[new MultiLine(), new SingleLine()]],
        ];
    }
}
