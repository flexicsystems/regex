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
 * @covers \Flexic\Regex\Flag\Grep\Invert
 * @covers \Flexic\Regex\Flag\Match\OffsetCapture
 * @covers \Flexic\Regex\Flag\Match\UnmatchedAsNull
 * @covers \Flexic\Regex\Flag\MatchAll\OffsetCapture
 * @covers \Flexic\Regex\Flag\MatchAll\PatternOrder
 * @covers \Flexic\Regex\Flag\MatchAll\SetOrder
 * @covers \Flexic\Regex\Flag\MatchAll\UnmatchedAsNull
 * @covers \Flexic\Regex\Flag\Split\DelimCapture
 * @covers \Flexic\Regex\Flag\Split\NoEmpty
 * @covers \Flexic\Regex\Flag\Split\OffsetCapture
 */
final class FlagTest extends AbstractTestCase
{
    /**
     * @dataProvider provideFlag
     */
    public function testFlags(
        object $flag,
        string $interfaceClass,
        int $pregModifier,
    ): void {
        self::assertInstanceOf($interfaceClass, $flag);
        self::assertInstanceOf(\Flexic\Regex\Flag\FlagInterface::class, $flag);
        self::assertSame($pregModifier, $flag->getPregFlag());
    }

    public function provideFlag(): array
    {
        return [
            [new \Flexic\Regex\Flag\Grep\Invert(), \Flexic\Regex\Flag\Grep\GrepHandlerFlagInterface::class, \PREG_GREP_INVERT],
            [new \Flexic\Regex\Flag\Match\OffsetCapture(), \Flexic\Regex\Flag\Match\MatchHandlerFlagInterface::class, \PREG_OFFSET_CAPTURE],
            [new \Flexic\Regex\Flag\Match\UnmatchedAsNull(), \Flexic\Regex\Flag\Match\MatchHandlerFlagInterface::class, \PREG_UNMATCHED_AS_NULL],
            [new \Flexic\Regex\Flag\MatchAll\OffsetCapture(), \Flexic\Regex\Flag\MatchAll\MatchAllHandlerFlagInterface::class, \PREG_OFFSET_CAPTURE],
            [new \Flexic\Regex\Flag\MatchAll\PatternOrder(), \Flexic\Regex\Flag\MatchAll\MatchAllHandlerFlagInterface::class, \PREG_PATTERN_ORDER],
            [new \Flexic\Regex\Flag\MatchAll\SetOrder(), \Flexic\Regex\Flag\MatchAll\MatchAllHandlerFlagInterface::class, \PREG_SET_ORDER],
            [new \Flexic\Regex\Flag\MatchAll\UnmatchedAsNull(), \Flexic\Regex\Flag\MatchAll\MatchAllHandlerFlagInterface::class, \PREG_UNMATCHED_AS_NULL],
            [new \Flexic\Regex\Flag\Split\DelimCapture(), \Flexic\Regex\Flag\Split\SplitHandlerFlagInterface::class, \PREG_SPLIT_DELIM_CAPTURE],
            [new \Flexic\Regex\Flag\Split\NoEmpty(), \Flexic\Regex\Flag\Split\SplitHandlerFlagInterface::class, \PREG_SPLIT_NO_EMPTY],
            [new \Flexic\Regex\Flag\Split\OffsetCapture(), \Flexic\Regex\Flag\Split\SplitHandlerFlagInterface::class, \PREG_SPLIT_OFFSET_CAPTURE],
        ];
    }
}
