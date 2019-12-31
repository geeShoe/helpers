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

    /**
     * Get closing tag for Atom XML feed
     *
     * @return string
     */
    public static function getClosing(): string
    {
        return '</feed>';
    }

    /**
     * Get a Atom Feed Entry
     *
     * @param string $title         Entry title
     * @param string $link          Link to entry page. I.e. href link to blog post
     * @param string $authorName    Name of the author
     * @param string $lastUpdated   \DATETIME::ATOM timestamp of when created/last updated
     * @param string $content       HTML content of the entry
     * @return string
     */
    public static function getEntry(
        string $title,
        string $link,
        string $authorName,
        string $lastUpdated,
        string $content
    ): string {
        return <<<EOT
<entry>
    <title type="html"><![CDATA[$title]]</title>
    <link href="$link" />
    <author><name>$authorName</name></author>
    <updated>$lastUpdated</updated>
    <content type="html"><![CDATA[$content]]</content>
</entry>
EOT;
    }
}
