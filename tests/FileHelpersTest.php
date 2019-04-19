<?php
declare(strict_types=1);

namespace Geeshoe\HelpersTest;

use Geeshoe\Helpers\Files\FileHelpers;
use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;

/**
 * Class FileHelpersTest
 *
 * @package Geeshoe\HelpersTest
 */
class FileHelpersTest extends TestCase
{
    /**
     * @var
     */
    public static $stream;

    /**
     * @inheritDoc
     */
    public static function setUpBeforeClass(): void
    {
        self::$stream = vfsStream::setup('testing');
    }

    /**
     * Data provider for testCheckIsRW
     *
     * @return array
     */
    public function isRW(): array
    {
        return [
            'Is RW' => [0777, true],
            'Is R' => [0400, false]
        ];
    }

    /**
     * @dataProvider isRW
     *
     * @param int  $chmod
     * @param bool $expected
     */
    public function testCheckIsRW(int $chmod, bool $expected): void
    {
        $dir = vfsStream::newDirectory('something')->at(self::$stream);

        $dir->chmod($chmod);

        $this->assertSame($expected, FileHelpers::checkIsRW('vfs://testing/something'));
    }

    /**
     * Data provider for testCheckDirIsRW
     *
     * @return array
     */
    public function isDirRW(): array
    {
        return [
            'Is Dir & RW' => [0777, true, true],
            'is Dir & R' => [0400, true, false],
            'Is Dir & 0' => [0000, true, false],
            'Is Not Dir' => [0777, false, false]
        ];
    }

    /**
     * @dataProvider isDirRW
     *
     * @param int  $chmod
     * @param bool $isDir
     * @param bool $expected
     */
    public function testCheckDirIsRW(int $chmod, bool $isDir, bool $expected): void
    {
        $dir = vfsStream::newDirectory('something')->at(self::$stream);
        vfsStream::newFile('someFile')->at(self::$stream);

        $dir->chmod($chmod);

        $path = 'vfs://testing/someFile';

        if ($isDir) {
            $path = 'vfs://testing/something';
        }

        $this->assertSame($expected, FileHelpers::checkDirIsRW($path));
    }

    /**
     * Data provider for testCheckFileIsRW
     *
     * @return array
     */
    public function isFileRW(): array
    {
        return [
            'Is File & RW' => [0777, true, true],
            'Is File & R' => [0400, true, false],
            'Is File & 0' => [0000, true, false],
            'Not File' => [0777, false, false]
        ];
    }

    /**
     * @dataProvider isFileRW
     *
     * @param int  $chmod
     * @param bool $isFile
     * @param bool $expected
     */
    public function testCheckFileIsRW(int $chmod, bool $isFile, bool $expected): void
    {
        $file = vfsStream::newFile('testFile.txt')->at(self::$stream);

        $file->chmod($chmod);

        $path = 'vfs://testing';

        if ($isFile) {
            $path = 'vfs://testing/testFile.txt';
        }

        $this->assertSame($expected, FileHelpers::checkFileIsRW($path));
    }
}
