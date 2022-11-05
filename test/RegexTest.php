<?php

namespace Flexic\Regex\Test;

use Flexic\Regex\Modifier\Insensitive;
use Flexic\Regex\Pattern;

/**
 * @internal
 *
 * @covers \Flexic\Regex\Regex
 */
class RegexTest extends AbstractTestCase
{
    public function testMatch(): void
    {
        $regex = new \Flexic\Regex\Regex();
        $pattern = new Pattern('(.*)@(.*)\.(.*)', Insensitive::class);

        $result = $regex->match($pattern, 'info@themepoint.de');

        self::assertInstanceOf(\Flexic\Regex\Result\MatchCollection::class, $result);
        self::assertSame(4, $result->count());
        self::assertInstanceOf(\Flexic\Regex\Result\MatchItem::class, $result->position(0));
        self::assertSame('info@themepoint.de', $result->position(0)->value());
        self::assertInstanceOf(\Flexic\Regex\Result\MatchItem::class, $result->position(1));
        self::assertSame('info', $result->position(1)->value());
        self::assertInstanceOf(\Flexic\Regex\Result\MatchItem::class, $result->position(2));
        self::assertSame('themepoint', $result->position(2)->value());
        self::assertInstanceOf(\Flexic\Regex\Result\MatchItem::class, $result->position(3));
        self::assertSame('de', $result->position(3)->value());
    }

    public function testMatchAll(): void
    {
        $regex = new \Flexic\Regex\Regex();
        $pattern = new Pattern('(.*)@(.*)\.(.*)', Insensitive::class);

        $result = $regex->matchAll($pattern, 'info@themepoint.de');

        self::assertInstanceOf(\Flexic\Regex\Result\MatchCollection::class, $result);
        self::assertSame(4, $result->count());

        self::assertInstanceOf(\Flexic\Regex\Result\MatchCollection::class, $result->position(0));
        self::assertInstanceOf(\Flexic\Regex\Result\MatchItem::class, $result->position(0)->position(0));
        self::assertSame('info@themepoint.de', $result->position(0)->position(0)->value());

        self::assertInstanceOf(\Flexic\Regex\Result\MatchCollection::class, $result->position(1));
        self::assertInstanceOf(\Flexic\Regex\Result\MatchItem::class, $result->position(1)->position(0));
        self::assertSame('info', $result->position(1)->position(0)->value());

        self::assertInstanceOf(\Flexic\Regex\Result\MatchCollection::class, $result->position(2));
        self::assertInstanceOf(\Flexic\Regex\Result\MatchItem::class, $result->position(2)->position(0));
        self::assertSame('themepoint', $result->position(2)->position(0)->value());

        self::assertInstanceOf(\Flexic\Regex\Result\MatchCollection::class, $result->position(3));
        self::assertInstanceOf(\Flexic\Regex\Result\MatchItem::class, $result->position(3)->position(0));
        self::assertSame('de', $result->position(3)->position(0)->value());
    }
}