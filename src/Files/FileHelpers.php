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

namespace Geeshoe\Helpers\Files;


/**
 * Class FileHelpers
 *
 * @package Geeshoe\Helpers\Files
 */
class FileHelpers
{
    /**
     * @param string $path
     * @return bool
     */
    public static function checkIsRW(string $path): bool
    {
        return is_readable($path) && is_writable($path);
    }

    /**
     * @param string $directory
     * @return bool
     */
    public static function checkDirIsRW(string $directory): bool
    {
        return is_dir($directory) && is_readable($directory) && is_writable($directory);
    }

    /**
     * @param string $file
     * @return bool
     */
    public static function checkFileIsRW(string $file): bool
    {
        return is_file($file) && self::checkIsRW($file);
    }
}