<?php
declare(strict_types=1);

namespace Geeshoe\HelpersTest;

use Geeshoe\Helpers\Data\StringHelpers;
use PHPUnit\Framework\TestCase;

/**
 * Class StringHelpersTest
 *
 * @package Geeshoe\HelpersTest
 */
class StringHelpersTest extends TestCase
{
    public function testFilterSpaceToDashReturnsStringWithDashesInPlaceOfSpaces(): void
    {
        $expected = 'this-is-my-string';

        $this->assertSame(
            $expected,
            StringHelpers::filterSpaceToDash('this is my string')
        );
    }

    public function testFilterAlphaNumDashReturnsStringWithoutAnyAlphaNumChars(): void
    {
        $expected = 'this-string-12';

        $this->assertSame(
            $expected,
            StringHelpers::filterAlphaNumDash(
                'this @string 12<?'
            )
        );
    }
}
