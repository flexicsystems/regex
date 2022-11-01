<?php

namespace Flexic\Regex\Test;

/**
 * @internal
 *
 * @covers \Flexic\Regex\Pattern
 */
class PatternTest extends AbstractTestCase
{
    public function testIfCanSetupAndStringify(): void
    {
        $pattern = new \Flexic\Regex\Pattern('[a-zA-Z0-9]',
            \Flexic\Regex\Modifier\SingleLine::class,
            new \Flexic\Regex\Modifier\MultiLine,
            ''
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