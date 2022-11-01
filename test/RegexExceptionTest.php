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
 * @covers \Flexic\Regex\RegexException
 */
final class RegexExceptionTest extends AbstractTestCase
{
    public function testCanGetAction(): void
    {
        $exception = new \Flexic\Regex\RegexException('test', 'This is a test', 400);

        self::assertSame('test', $exception->getAction());
        self::assertSame('This is a test', $exception->getMessage());
        self::assertSame(400, $exception->getCode());
    }
}
