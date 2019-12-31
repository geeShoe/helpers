<?php
declare(strict_types=1);
/**
 * Copyright 2019 Jesse Rushlow - Geeshoe Development
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

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

    public function testGetClosingReturnsClosingAtomXMLFeedTags(): void
    {
        $expected = '</feed>';

        $this->assertSame($expected, Atom::getClosing());
    }

    public function testGetEntryReturnsValidAtomEntryListing(): void
    {
        $expected = <<< 'EOT'
<entry>
    <title type="html"><![CDATA[Some Title]]</title>
    <link href="https://geeshoe.com" />
    <author><name>Jesse Rushlow</name></author>
    <updated>2019-12-31T12:00:01+00:00</updated>
    <content type="html"><![CDATA[<h1>Some content</h1>]]</content>
</entry>
EOT;
        $this->assertSame($expected, Atom::getEntry(
            'Some Title',
            'https://geeshoe.com',
            'Jesse Rushlow',
            '2019-12-31T12:00:01+00:00',
            '<h1>Some content</h1>'
        ));
    }
}
