<?php
declare(strict_types=1);

namespace Geeshoe\HelpersTest;

use Geeshoe\Helpers\Files\FileHelpers;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamFile;
use PHPUnit\Framework\TestCase;

/**
 * Class FileHelpersTest
 *
 * @package Geeshoe\HelpersTest
 */
class FileHelpersTest extends TestCase
{
    /**
     * @var vfsStreamDirectory
     */
    public static $stream;

    /**
     * @var vfsStreamDirectory
     */
    public static $dir;

    /**
     * @var vfsStreamFile
     */
    public static $file;

    /**
     * @var string
     */
    public static $filePath = 'vfs://testing/text.file';

    /**
     * @var string
     */
    public static $dirPath = 'vfs://testing/directory';

    /**
     * @inheritDoc
     */
    public static function setUpBeforeClass(): void
    {
        self::$stream = vfsStream::setup('testing');
        self::$dir = vfsStream::newDirectory('directory')->at(self::$stream);
        self::$file = vfsStream::newFile('text.file')->at(self::$stream);
    }

    public function isRDataProvider(): array
    {
        return [
            [0400, true],
            [0000, false]
        ];
    }

    public function isRWDataProvider(): array
    {
        return [
            [0600, true],
            [0400, false],
            [0000, false]
        ];
    }

    public function isRAndOfTypeDataProvider(): array
    {
        return [
            [0400, true, true],
            [0000, true, false],
            [0400, false, false],
            [0000, false, false],
        ];
    }

    public function isRWAndOfTypeDataProvider(): array
    {
        return [
            [0600, true, true],
            [0600, false, false],
            [0400, true, false],
            [0400, false, false],
            [0000, true, false],
            [0000, false, false]
        ];
    }

    /**
     * @dataProvider isRDataProvider
     *
     * @param int  $chmod
     * @param bool $expected
     */
    public function testCheckIsR(int $chmod, bool $expected): void
    {
        self::$file->chmod($chmod);

        $this->assertSame($expected, FileHelpers::checkIsR(self::$filePath));
    }

    /**
     * @dataProvider isRAndOfTypeDataProvider
     *
     * @param int  $chmod
     * @param bool $isDir
     * @param bool $expected
     */
    public function testCheckDirIsR(int $chmod, bool $isDir, bool $expected): void
    {
        self::$dir->chmod($chmod);

        $path = self::$dirPath;

        if (!$isDir) {
            $path = self::$filePath;
        }

        $this->assertSame($expected, FileHelpers::checkDirIsR($path));
    }

    /**
     * @dataProvider isRAndOfTypeDataProvider
     *
     * @param int  $chmod
     * @param bool $isFile
     * @param bool $expected
     */
    public function testCheckFileIsR(int $chmod, bool $isFile, bool $expected): void
    {
        self::$file->chmod($chmod);

        $path = self::$filePath;

        if (!$isFile) {
            $path = self::$dirPath;
        }

        $this->assertSame($expected, FileHelpers::checkFileIsR($path));
    }

    /**
     * @dataProvider isRWDataProvider
     *
     * @param int  $chmod
     * @param bool $expected
     */
    public function testCheckIsRW(int $chmod, bool $expected): void
    {
        self::$dir->chmod($chmod);

        $this->assertSame($expected, FileHelpers::checkIsRW(self::$dirPath));
    }

    /**
     * @dataProvider isRWAndOfTypeDataProvider
     *
     * @param int  $chmod
     * @param bool $isDir
     * @param bool $expected
     */
    public function testCheckDirIsRW(int $chmod, bool $isDir, bool $expected): void
    {
        self::$dir->chmod($chmod);

        $path = self::$dirPath;

        if (!$isDir) {
            $path = self::$filePath;
        }

        $this->assertSame($expected, FileHelpers::checkDirIsRW($path));
    }

    /**
     * @dataProvider isRWAndOfTypeDataProvider
     *
     * @param int  $chmod
     * @param bool $isFile
     * @param bool $expected
     */
    public function testCheckFileIsRW(int $chmod, bool $isFile, bool $expected): void
    {
        self::$file->chmod($chmod);

        $path = self::$filePath;

        if (!$isFile) {
            $path = self::$dirPath;
        }

        $this->assertSame($expected, FileHelpers::checkFileIsRW($path));
    }
}
