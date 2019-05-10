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

namespace Geeshoe\Helpers\Uuid;

use Ramsey\Uuid\Uuid;

/**
 * Class UuidHelpers
 *
 * @package Geeshoe\Helpers\Uuid
 * @author  Jesse Rushlow <jr@geeshoe.com>
 * @link    https://geeshoe.com
 */
class UuidHelpers
{
    /**
     * @param string $uuid
     *
     * @return string
     */
    public static function bytesToString(string $uuid): string
    {
        return Uuid::fromBytes($uuid)->toString();
    }

    /**
     * @param string $uuid
     *
     * @return string
     */
    public static function stringToBytes(string $uuid): string
    {
        return Uuid::fromString($uuid)->getBytes();
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    public static function newUuid4AsString(): string
    {
        return Uuid::uuid4()->toString();
    }
}
