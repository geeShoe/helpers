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
     * @param string $title     Title of the RSS Feed
     * @param string $subtitle  Subtitle of the RSS Feed
     * @param string $link      Link to the web resource the RSS Feed is based on
     * @param string $id        The permanent unique id of the RSS Feed
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
