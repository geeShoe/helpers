<?php
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

declare(strict_types=1);

namespace Geeshoe\HelpersTest;

use Geeshoe\Helpers\Uuid\UuidHelpers;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * Class UuidHelpersTest
 *
 * @package Geeshoe\HelpersTest
 * @author  Jesse Rushlow <jr@geeshoe.com>
 * @link    https://geeshoe.com
 */
class UuidHelpersTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testBytesToStringReturnsUUIDAsString(): void
    {
        $uuid = Uuid::uuid4();

        $result = UuidHelpers::bytesToString($uuid->getBytes());

        $this->assertSame($uuid->toString(), $result);
    }

    /**
     * @throws \Exception
     */
    public function testStringToBytesReturnsUUIDAsBinary(): void
    {
        $uuid = Uuid::uuid4();

        $result = UuidHelpers::stringToBytes($uuid->toString());

        $this->assertSame($uuid->getBytes(), $result);
    }

    /**
     * @throws \Exception
     */
    public function testNewUUIDAsStringReturnsUUID(): void
    {
        $result = UuidHelpers::newUuid4AsString();

        $this->assertTrue(Uuid::isValid($result));
    }
}
