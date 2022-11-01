<?php

namespace Flexic\Regex\Test;

/**
 * @internal
 *
 * @covers \Flexic\Regex\RegexException
 */
class RegexExceptionTest extends AbstractTestCase
{
    public function testCanGetAction(): void
    {
        $exception = new \Flexic\Regex\RegexException('test', 'This is a test', 400);

        self::assertSame('test', $exception->getAction());
        self::assertSame('This is a test', $exception->getMessage());
        self::assertSame(400, $exception->getCode());
    }
}