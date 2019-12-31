<?php

declare(strict_types=1);

namespace Geeshoe\HelpersTest\RSS;

use Geeshoe\Helpers\RSS\Atom;
use PHPUnit\Framework\TestCase;

/**
 * Class AtomTest
 *
 * @package Geeshoe\HelpersTest\RSS
 * @author  Jesse Rushlow <jr@geeshoe.com>
 */
class AtomTest extends TestCase
{
    public function testGetHeaderReturnsValidAtomXMLHeaderWithoutClosingFeedTag(): void
    {
        $expected = <<< 'EOT'
<?xml version="1.0" encoding="UTF-8" ?>
<feed xmlns="http://www.w3.org/2005/Atom">
                <title>Test title</title>
                <subtitle>Sub title</subtitle>
                <link href="https://geeshoe.com" />
                <id>https://geeshoe.com/unittest</id>
EOT;

        $this->assertSame($expected, Atom::getHeader(
            'Test title',
            'Sub title',
            'https://geeshoe.com',
            'https://geeshoe.com/unittest'
        ));
    }
}
