<?php

declare(strict_types=1);

namespace Geeshoe\Helpers\RSS;

/**
 * Class Atom
 *
 * @package Geeshoe\Helpers\RSS
 * @author  Jesse Rushlow <jr@geeshoe.com>
 */
class Atom
{
    /**
     * Get Atom header without closing </feed> tag for us in rss posts
     *
     * @param string $title
     * @param string $subtitle
     * @param string $link
     * @param string $id
     * @return string
     */
    public static function getHeader(
        string $title,
        string $subtitle,
        string $link,
        string $id
    ): string {
        return <<<EOT
<?xml version="1.0" encoding="UTF-8" ?>
<feed xmlns="http://www.w3.org/2005/Atom">
                <title>$title</title>
                <subtitle>$subtitle</subtitle>
                <link href="$link" />
                <id>$id</id>
EOT;
    }
}
